<?php
	include "../PHP/Taketwoconnect.php";

	class DownloadService {
		private $conn;

		public function __construct($conn) {
			$this->conn = $conn;
		}

		// Method to handle file download
		public function downloadFile($fileName) {
			$sql = "SELECT filecontent, filetype FROM uploaded_files WHERE filename = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("s", $fileName);
			$stmt->execute();
			$stmt->bind_result($fileContent, $fileType);
			$stmt->fetch();

			if ($fileContent) {
				header('Content-Type: ' . $fileType);
				header('Content-Disposition: attachment; filename="' . $fileName . '"');
				header('Content-Length: ' . strlen($fileContent));
				echo $fileContent;
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'File not found.'));
			}

			$stmt->close();
		}

		// Method to handle table data download based on format
		public function downloadTableData($table, $format) {
			switch ($format) {
				case 'csv':
					$this->outputCsv($table);
					break;
				case 'xml':
					$this->outputXml($table);
					break;
				case 'json':
					$this->outputJson($table);
					break;
				default:
					echo json_encode(array('status' => 'error', 'message' => 'Invalid format selected.'));
					break;
			}
		}

		// Method to fetch data from the database
		private function fetchData($table) {
			$query = "SELECT * FROM $table";
			$result = mysqli_query($this->conn, $query);

			if ($result) {
				return mysqli_fetch_all($result, MYSQLI_ASSOC);
			} else {
				return false;
			}
		}

		// Method to output CSV
		private function outputCsv($table) {
			$data = $this->fetchData($table);
			if ($data) {
				header('Content-Type: text/csv');
				header('Content-Disposition: attachment; filename="' . $table . '.csv"');
				$output = fopen('php://output', 'w');
				fputcsv($output, array_keys($data[0])); // Add column headers
				foreach ($data as $row) {
					fputcsv($output, $row);
				}
				fclose($output);
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Failed to fetch data.'));
			}
		}

		// Method to output XML
		private function outputXml($table) {
			$data = $this->fetchData($table);
			if ($data) {
				$xml = new SimpleXMLElement('<' . $table . 's></' . $table . 's>');
				foreach ($data as $row) {
					$parent = $xml->addChild($table);
					foreach ($row as $key => $value) {
						$parent->addChild($key, htmlspecialchars($value));
					}
				}

				$dom = new DOMDocument('1.0');
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());

				header('Content-Type: application/xml');
				header('Content-Disposition: attachment; filename="' . $table . '.xml"');
				echo $dom->saveXML();
				exit();
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Failed to fetch data.'));
			}
		}

		// Method to output JSON with pretty-printing (PHP 5.3 custom version)
		private function outputJson($table) {
			$data = $this->fetchData($table);
			if ($data) {
				$jsonData = array();
				foreach ($data as $row) {
					$parentElement = array();
					foreach ($row as $key => $value) {
						$parentElement[$key] = htmlspecialchars($value);
					}
					$jsonData[] = $parentElement;
				}

				$jsonString = json_encode($jsonData);
				$prettyJson = $this->jsonPrettyPrint($jsonString);

				header('Content-Type: application/json');
				header('Content-Disposition: attachment; filename="' . $table . '.json"');
				echo $prettyJson;
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'Failed to fetch data.'));
			}
		}

		// Custom JSON pretty-print for PHP 5.3
		private function jsonPrettyPrint($json) {
			$result = '';
			$level = 0;
			$in_quotes = false;
			$in_escape = false;
			$ends_line_level = NULL;
			$json_length = strlen($json);

			for ($i = 0; $i < $json_length; $i++) {
				$char = $json[$i];
				$new_line_level = NULL;
				$post = "";
				if ($ends_line_level !== NULL) {
					$new_line_level = $ends_line_level;
					$ends_line_level = NULL;
				}
				if ($in_escape) {
					$in_escape = false;
				} else if ($char === '"') {
					$in_quotes = !$in_quotes;
				} else if (!$in_quotes) {
					switch ($char) {
						case '}': case ']':
							$level--;
							$ends_line_level = NULL;
							$new_line_level = $level;
							break;
						case '{': case '[':
							$level++;
						case ',':
							$ends_line_level = $level;
							break;
						case ':':
							$post = " ";
							break;
					}
				} else if ($char === '\\') {
					$in_escape = true;
				}

				if ($new_line_level !== NULL) {
					$result .= "\n" . str_repeat("\t", $new_line_level);
				}
				$result .= $char . $post;
			}

			return $result;
		}
	}

	$service = new DownloadService($conn);

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		if (isset($_GET['file'])) {
			$service->downloadFile($_GET['file']);
		} elseif (isset($_GET['table']) && isset($_GET['format'])) {
			$service->downloadTableData($_GET['table'], $_GET['format']);
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Missing required parameters.'));
		}
	}
?>
