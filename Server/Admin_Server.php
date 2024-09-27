<?php
	require_once('../Library/nusoap.php');
	require "../PHP/Taketwoconnect.php";

	// Create a class to handle the SOAP methods
	class AdminService {
		private $conn;

		// Constructor to initialize the database connection
		public function __construct($conn) {
			$this->conn = $conn;
		}

		// Method to fetch data from a specific table
		public function fetchData($tableName) {
			$query = $this->buildQuery($tableName);

			if (!$query) {
				return "Invalid table selection.";
			}

			// Execute the query
			$result = mysqli_query($this->conn, $query);
			if (!$result) {
				return "Error fetching data from the database: " . mysqli_error($this->conn);
			}

			// Build the XML string
			$xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
			$xmlString .= "<{$tableName}s>";  // Opening tag for table entries

			while ($row = mysqli_fetch_assoc($result)) {
				$xmlString .= "<{$tableName}>";  // Opening tag for a single entry
				foreach ($row as $key => $value) {
					$xmlString .= "<$key>" . htmlspecialchars($value) . "</$key>";
				}
				$xmlString .= "</{$tableName}>";  // Closing tag for a single entry
			}

			$xmlString .= "</{$tableName}s>";  // Closing tag for table entries

			return $xmlString;
		}

		// Private method to build the query based on the table name
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

	// Create a new SOAP server
	$server = new nusoap_server();
	$server->configureWSDL('fetchService', 'urn:fetchService');

	// Register the fetchData method with SOAP
	$server->register('fetchData',
		array('tableName' => 'xsd:string'),  // Input: table name as a string
		array('return' => 'xsd:string'),     // Output: XML string
		'urn:fetchService',
		'urn:fetchService#fetchData',
		'rpc',
		'encoded',
		'Fetches data from the specified table and returns as XML string'
	);

	// Create an instance of the AdminService class
	$service = new AdminService($conn);

	// Map the SOAP call to the class method
	function fetchData($tableName) {
		global $service;
		return $service->fetchData($tableName);
	}

	// Service the SOAP requests
	$server->service(file_get_contents("php://input"));
?>
