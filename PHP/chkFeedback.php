<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Form data from POST request
		$fdFname = $_POST['fdFname'];
		$fdLname = $_POST['fdLname'];
		$age = isset($_POST['age']) ? $_POST['age'] : "";
		$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
		$qualityService = isset($_POST['qtser']) ? $_POST['qtser'] : "";
		$prodQuality = isset($_POST['prodq']) ? $_POST['prodq'] : "";
		$recommend = isset($_POST['recom']) ? $_POST['recom'] : "";
		$suggestion = isset($_POST['fbmsg']) ? $_POST['fbmsg'] : "";

		// Create an array with the data
		$data = array(
			'fdFname' => $fdFname,
			'fdLname' => $fdLname,
			'age' => $age,
			'gender' => $gender,
			'qtser' => $qualityService,
			'prodq' => $prodQuality,
			'recom' => $recommend,
			'fbmsg' => $suggestion
		);

		// Convert the data to JSON format
		$jsonData = json_encode($data);

		// Set up the HTTP request
		$url = 'http://127.0.0.1:8888/2210294_2210332/Server/Feedback_REST.php';

		// Create the HTTP context for the POST request
		$options = array(
			'http' => array(
				'header'  => "Content-Type: application/json\r\n",
				'method'  => 'POST',
				'content' => $jsonData
			)
		);
		$context  = stream_context_create($options);

		// Send the request and get the response
		$response = file_get_contents($url, false, $context);

		// Decode the response
		$result = json_decode($response, true);

		// Check the response and act accordingly
		if ($result && $result['status'] == 'success') {
			// Redirect to home page if successful
			header("Location: ../home.php");
			exit();
		} else {
			// Display the error message
			echo "Error: " . $result['message'];
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
