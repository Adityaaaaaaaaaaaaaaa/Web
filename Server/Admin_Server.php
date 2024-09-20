<?php
	require_once('../Nusoap/nusoap.php');
	require "../PHP/Taketwoconnect.php";

	// Create a new SOAP server
	$server = new nusoap_server();

	// Configure WSDL
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

	// Function to fetch data from the database and return it as an XML string
	function fetchData($tableName) {
		global $conn;

		if ($tableName === "client") {
			$query = "SELECT * FROM client";
		} elseif ($tableName === "reservation") {
			$query = "SELECT * FROM reservation";
		} elseif ($tableName === "inquiry") {
			$query = "SELECT * FROM inquiry";
		} elseif ($tableName === "feedback") {
			$query = "SELECT * FROM feedback";
		} elseif ($tableName === "uploaded_files") {
			$query = "SELECT * FROM uploaded_files";
		} else {
			return "Invalid table selection.";
		}

		// Execute the query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			return "Error fetching data from the database: " . mysqli_error($conn);
		}

		// Build the XML string
		$xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
		$xmlString .= "<{$tableName}s>";  // Opening tag for table entries

		while ($row = mysqli_fetch_assoc($result)) {
			$xmlString .= "<{$tableName}>";  // Opening tag for a single entry
			foreach ($row as $key => $value) {
				// Escape special characters
				$xmlString .= "<$key>" . htmlspecialchars($value) . "</$key>";
			}
			$xmlString .= "</{$tableName}>";  // Closing tag for a single entry
		}

		$xmlString .= "</{$tableName}s>";  // Closing tag for table entries

		return $xmlString;  // Return the constructed XML string
	}

	// Service the SOAP requests
	$server->service(file_get_contents("php://input"));
?>
