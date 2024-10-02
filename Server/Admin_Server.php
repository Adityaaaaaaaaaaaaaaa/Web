<?php
	require_once('../Library/nusoap.php');
	require "../PHP/Taketwoconnect.php";

	class AdminService {
		private $conn;

		public function __construct($conn) {
			$this->conn = $conn;
		}

		public function fetchData($tableName) {
			$query = $this->buildQuery($tableName);

			if (!$query) {
				return "Invalid table selection.";
			}

			$result = mysqli_query($this->conn, $query);
			if (!$result) {
				return "Error fetching data from the database: " . mysqli_error($this->conn);
			}

			$xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
			$xmlString .= "<{$tableName}s>";  

			while ($row = mysqli_fetch_assoc($result)) {
				$xmlString .= "<{$tableName}>";  
				foreach ($row as $key => $value) {
					$xmlString .= "<$key>" . htmlspecialchars($value) . "</$key>";
				}
				$xmlString .= "</{$tableName}>";  
			}

			$xmlString .= "</{$tableName}s>";  

			return $xmlString;
		}

		private function buildQuery($tableName) {
			switch ($tableName) {
				case "client":
					return "SELECT * FROM client";
				case "reservation":
					return "SELECT * FROM reservation";
				case "inquiry":
					return "SELECT * FROM inquiry";
				case "feedback":
					return "SELECT * FROM feedback";
				case "uploaded_files":
					return "SELECT id, filename, filetype, filesize, upload_date FROM uploaded_files";
				default:
					return false;
			}
		}
	}

	$server = new nusoap_server();
	$server->configureWSDL('fetchService', 'urn:fetchService');

	$server->register('fetchData',
		array('tableName' => 'xsd:string'),  // Input: table name as a string
		array('return' => 'xsd:string'),     // Output: XML string
		'urn:fetchService',
		'urn:fetchService#fetchData',
		'rpc',
		'encoded',
		'Fetches data from the specified table and returns as XML string'
	);

	$service = new AdminService($conn);

	function fetchData($tableName) {
		global $service;
		return $service->fetchData($tableName);
	}

	$server->service(file_get_contents("php://input"));
?>
