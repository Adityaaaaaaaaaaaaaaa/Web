<?php
	include "../PHP/Taketwoconnect.php";

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {

		// Handle file download if 'file' parameter is set
		if (isset($_GET['file'])) {
			$fileName = $_GET['file'];

			// Fetch file from the database
			$sql = "SELECT filecontent, filetype FROM uploaded_files WHERE filename = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $fileName);
			$stmt->execute();
			$stmt->bind_result($fileContent, $fileType);
			$stmt->fetch();

			// Check if file exists in the database
			if ($fileContent) {
				// Set headers for file download
				header('Content-Type: ' . $fileType);
				header('Content-Disposition: attachment; filename="' . $fileName . '"');
				header('Content-Length: ' . strlen($fileContent));

				// Output the file content
				echo $fileContent;
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'File not found.'));
			}
			$stmt->close();

		// Handle table data download (XML, JSON, CSV)
		} elseif (isset($_GET['table']) && isset($_GET['format'])) {
			$table = $_GET['table'];
			$format = $_GET['format'];

			// Fetch data based on format
			switch ($format) {
				case 'csv':
					outputCsv($table);
					break;
				case 'xml':
					outputXml($table);
					break;
				case 'json':
					outputJson($table);
					break;
				default:
					echo json_encode(array('status' => 'error', 'message' => 'Invalid format selected.'));
					break;
			}
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Missing required parameters.'));
		}
	}

	// Function to fetch data from the database
	function fetchData($table) {
		global $conn;
		$query = "SELECT * FROM $table";
		$result = mysqli_query($conn, $query);

		if ($result) {
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			return false;
		}
	}

	// Function to output CSV
	function outputCsv($table) {
		$data = fetchData($table);
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

	// Function to output XML with proper formatting
	function outputXml($table) {
		$data = fetchData($table);
		if ($data) {
			$xml = new SimpleXMLElement('<' . $table . 's></' . $table . 's>');
			foreach ($data as $row) {
				$parent = $xml->addChild($table);
				foreach ($row as $key => $value) {
					$parent->addChild($key, htmlspecialchars($value));
				}
			}

			// Use DOMDocument to pretty-print XML
			$dom = new DOMDocument('1.0');
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($xml->asXML());

			// Set headers for download
			header('Content-Type: application/xml');
			header('Content-Disposition: attachment; filename="' . $table . '.xml"');

			// Output formatted XML
			echo $dom->saveXML();
			exit();
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to fetch data.'));
		}
	}

	// Function to output JSON with pretty-printing (PHP 5.3 custom version)
	function outputJson($table) {
		$data = fetchData($table);
		if ($data) {
			$jsonData = array();
			foreach ($data as $row) {
				$parentElement = array();
				foreach ($row as $key => $value) {
					$parentElement[$key] = htmlspecialchars($value);
				}
				$jsonData[] = $parentElement;
			}

			// Convert JSON data to string
			$jsonString = json_encode($jsonData);

			// Pretty-print JSON for PHP 5.3
			$prettyJson = jsonPrettyPrint($jsonString);

			// Set headers for download
			header('Content-Type: application/json');
			header('Content-Disposition: attachment; filename="' . $table . '.json"');

			// Output formatted JSON
			echo $prettyJson;
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Failed to fetch data.'));
		}
	}

	// Function for custom JSON pretty-printing (PHP 5.3)
	function jsonPrettyPrint($json) {
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
				$result .= "\n".str_repeat("\t", $new_line_level);
			}
			$result .= $char.$post;
		}

		return $result;
	}
?>
