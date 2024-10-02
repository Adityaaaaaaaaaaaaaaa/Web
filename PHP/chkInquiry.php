<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$iqFname = $_POST['iqFname'];
		$iqLname = $_POST['iqLname'];
		$iqEmail = $_POST['iqEmail'];
		$iqMsg = $_POST['iqMsg'];

		$data = array(
			'iqFname' => $iqFname,
			'iqLname' => $iqLname,
			'iqEmail' => $iqEmail,
			'iqMsg' => $iqMsg
		);

		$jsonData = json_encode($data);

		$url = 'http://127.0.0.1:8888/2210294_2210332/Server/Inquiry_REST.php';

		$options = array(
			'http' => array(
				'header'  => "Content-Type: application/json\r\n",
				'method'  => 'POST',
				'content' => $jsonData
			)
		);
		$context  = stream_context_create($options);

		$response = file_get_contents($url, false, $context);

		$result = json_decode($response, true);

		// if ($result && $result['status'] == 'success') {
		//     // Redirect to home page if successful
		//     header("Location: ../home.php");
		//     exit();
		// } else {
		//     // Display the error message
		//     echo "Error: " . $result['message'];
		// }
		if ($result && isset($result['status']) && $result['status'] === 'success') {
			header("Location: ../home.php");
			exit();
		} else {
			echo "Error: " . (isset($result['message']) ? $result['message'] : 'Unknown error');
		}
		
	} else {
		echo ' <!-- jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- XSAlert CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
		<!-- XAlert core JS -->
		<script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
		<script>
		XSAlert({
			title: "Ouch!",
			message: "Invalid Request",
			icon: \'warning\',
			hideCancelButton: true,
			closeOnOutsideClick: false,
			hideOkButton: true,
			closeWithESC: false,
			footer: \'<a href="../home.php">Home</a>\'
		})
		</script>';
	}
?>
