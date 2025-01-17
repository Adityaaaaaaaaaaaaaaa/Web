<?php
	session_start();

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

	class AdminDataClient {
		private $client;

		public function __construct($wsdl) {
			$this->client = new nusoap_client($wsdl, true);
			$err = $this->client->getError();
			if ($err) {
				echo "Constructor error: " . $err;
				exit();
			}
		}

		public function fetchData($tableName) {
			$result = $this->client->call('fetchData', array('tableName' => $tableName));

			if ($this->client->fault) {
				echo "Fault: ";
				print_r($result);
			} else {
				$err = $this->client->getError();
				if ($err) {
					echo "Error: " . $err;
				} else {
					return $result; 
				}
			}
		}
	}

	include '../Webpages/Header.php';

	if (isset($_POST['tablex'])) {
		$tableName = $_POST['tablex'];

		$client = new AdminDataClient('http://127.0.0.1:8888/2210294_2210332/Server/Admin_Server.php?wsdl');

		$result = $client->fetchData($tableName);

		if ($result) {
			$xml = new DOMDocument();
			$xml->loadXML($result);

			$xsl = new DOMDocument();
			$xsl->load('../XSLT/adminData.xslt');

			$proc = new XSLTProcessor();
			$proc->importStylesheet($xsl);
			$html = $proc->transformToXML($xml);

			echo $html;
		}
	} else {
		echo "No table selected!";
	}

	include '../Webpages/Footer.php';
?>
