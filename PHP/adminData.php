<?php
	session_start();

	// Ensure NuSOAP library is included
	require_once('../Library/nusoap.php');

	if ((!($_SERVER["REQUEST_METHOD"] == "POST")) && !isset($_SESSION['adminUname']) && !isset($_POST['tablex'])) {
		echo ' <!-- jQuery -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<!-- XSAlert CSS -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
			<!-- XAlert core JS -->
			<script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
			<script>
			XSAlert({
				title: "Sneaking in?",
				message: "You know what to do",
				icon: \'error\',
				hideCancelButton: true,
				closeOnOutsideClick: false,
				hideOkButton: true,
				closeWithESC: false,
				footer: \'<a href="../home.php">Home</a>\'
			})
			</script>';
	}

	// SOAP Client class
	class AdminDataClient {
		private $client;

		public function __construct($wsdl) {
			// Initialize the SOAP client
			$this->client = new nusoap_client($wsdl, true);
			$err = $this->client->getError();
			if ($err) {
				echo "Constructor error: " . $err;
				exit();
			}
		}

		// Method to fetch data from the server
		public function fetchData($tableName) {
			// Call the SOAP function
			$result = $this->client->call('fetchData', array('tableName' => $tableName));

			// Check for fault or error in SOAP response
			if ($this->client->fault) {
				echo "Fault: ";
				print_r($result);
			} else {
				$err = $this->client->getError();
				if ($err) {
					echo "Error: " . $err;
				} else {
					return $result; // Return the XML result
				}
			}
		}
	}

	include '../Webpages/Header.php';

	if (isset($_POST['tablex'])) {
		$tableName = $_POST['tablex'];

		// Create an instance of the client class
		$client = new AdminDataClient('http://127.0.0.1:8888/2210294_2210332/Server/Admin_Server.php?wsdl');

		// Fetch the data
		$result = $client->fetchData($tableName);

		if ($result) {
			// Process the XML response and apply XSLT
			$xml = new DOMDocument();
			$xml->loadXML($result);

			// Load the XSLT file
			$xsl = new DOMDocument();
			$xsl->load('../XSLT/adminData.xslt');

			// Apply the XSLT transformation
			$proc = new XSLTProcessor();
			$proc->importStylesheet($xsl);
			$html = $proc->transformToXML($xml);

			// Output the transformed HTML
			echo $html;
		}
	} else {
		echo "No table selected!";
	}

	include '../Webpages/Footer.php';
?>
