<?php
	session_start();

	if ( (!($_SERVER["REQUEST_METHOD"] == "POST")) && !isset($_SESSION['adminUname']) && !isset($_POST['tablex'])) {
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

	require_once('../Nusoap/nusoap.php');

	// Initialize the SOAP client
	$client = new nusoap_client('http://127.0.0.1:8888/2210294_2210332/Server/Admin_Server.php?wsdl', true);

	// Check for client initialization errors
	$err = $client->getError();
	if ($err) {
		echo "Constructor error: " . $err;
		exit();
	}

	// Check for selected table
	if (isset($_POST['tablex'])) {
		$tableName = $_POST['tablex'];

		// Call the SOAP function
		$result = $client->call('fetchData', array('tableName' => $tableName));

		// Check if there's a fault
		if ($client->fault) {
			echo "Fault: ";
			print_r($result);
		} else {
			// Check for errors in the SOAP response
			$err = $client->getError();
			if ($err) {
				echo "Error: " . $err;
			} else {
				// No errors, now process the XML response and apply XSLT

				// Load the XML response
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
		}
	} else {
		echo "No table selected!";
	}
?>
