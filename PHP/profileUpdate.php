<?php
	session_start();

	if (isset($_SESSION['user_login'])) {
		include('Taketwoconnect.php');

		$userName = $_SESSION['user_login'];

		// Update fields only if provided
		$updateFields = array(
			'clnFn' => 'udpFname',
			'clnLn' => 'updLname',
			'clnPhone' => 'updPhone',
			'clnEmail' => 'updEmail',
			'clnUn' => 'updUname',
			'clnPwd' => 'updPwd'
		);

		foreach ($updateFields as $dbField => $formField) {
			if (!empty($_POST[$formField])) {
				$updatedValue = mysqli_real_escape_string($conn, $_POST[$formField]);
				$updateSql = "UPDATE client SET $dbField = '$updatedValue' WHERE clnUn = '$userName';";
				mysqli_query($conn, $updateSql);
			}
		}

		mysqli_close($conn);

		header("Location: ../Webpages/profile.php?success=1");
		exit();
	} else {
		header("location: ../Webpages/Login.php");
		exit();
	}
?>

