<?php
	header("Content-Type: application/json");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include "../PHP/Taketwoconnect.php"; 

		$inputData = file_get_contents("php://input");

		$data = json_decode($inputData, true);

		if (isset($data['iqFname'], $data['iqLname'], $data['iqEmail'], $data['iqMsg'])) {
			$iqFname = mysqli_real_escape_string($conn, $data['iqFname']);
			$iqLname = mysqli_real_escape_string($conn, $data['iqLname']);
			$iqEmail = mysqli_real_escape_string($conn, $data['iqEmail']);
			$iqMsg = mysqli_real_escape_string($conn, $data['iqMsg']);

			$insertQuery = "INSERT INTO inquiry (cName, cSurname, cEmail, cMessage) VALUES (?, ?, ?, ?)";
			$stmt = mysqli_prepare($conn, $insertQuery);
			mysqli_stmt_bind_param($stmt, "ssss", $iqFname, $iqLname, $iqEmail, $iqMsg);

			if (mysqli_stmt_execute($stmt)) {
				echo json_encode(array("status" => "success", "message" => "Inquiry added successfully"));
			} else {
				echo json_encode(array("status" => "error", "message" => "Error inserting data: " . mysqli_error($conn)));
			}

			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		} else {
			echo json_encode(array("status" => "error", "message" => "Invalid input data"));
		}
	} else {
		echo json_encode(array("status" => "error", "message" => "Only POST method is allowed"));
	}
?>
