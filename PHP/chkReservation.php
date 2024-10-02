<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$rsvFname = $_POST['rsvFname'];
		$rsvLname = $_POST['rsvLname'];
		$rsvPhone = $_POST['rsvPhone'];
		$rsvEmail = $_POST['rsvEmail'];
		$rsvDate = $_POST['rsvDate'];
		$rsvMsg = $_POST['rsvMsg'];

		$data = array(
			'rsvFname' => $rsvFname,
			'rsvLname' => $rsvLname,
			'rsvPhone' => $rsvPhone,
			'rsvEmail' => $rsvEmail,
			'rsvDate' => $rsvDate,
			'rsvMsg' => $rsvMsg
		);

		$jsonData = json_encode($data);

		$url = 'http://127.0.0.1:8888/2210294_2210332/Server/Reservation_REST.php';

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

		if ($result && $result['status'] == 'success') {
			header("Location: ../home.php");
			exit();
		} else {
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
