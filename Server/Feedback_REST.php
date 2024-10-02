<?php
	header("Content-Type: application/json");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		include "../PHP/Taketwoconnect.php"; 

		$inputData = file_get_contents("php://input");

		$data = json_decode($inputData, true);

		if (isset($data['fdFname'], $data['fdLname'], $data['age'], $data['gender'], $data['qtser'], $data['prodq'], $data['recom'], $data['fbmsg'])) {
			$fdFname = mysqli_real_escape_string($conn, $data['fdFname']);
			$fdLname = mysqli_real_escape_string($conn, $data['fdLname']);
			$age = mysqli_real_escape_string($conn, $data['age']);
			$gender = mysqli_real_escape_string($conn, $data['gender']);
			$qualityService = mysqli_real_escape_string($conn, $data['qtser']);
			$prodQuality = mysqli_real_escape_string($conn, $data['prodq']);
			$recommend = mysqli_real_escape_string($conn, $data['recom']);
			$suggestion = mysqli_real_escape_string($conn, $data['fbmsg']);

			$insertQuery = "INSERT INTO feedback (cName, cSurname, cAge, cgender, cQuality_service, cProduct_quality, cRecommend, cSuggestion) 
							VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($conn, $insertQuery);
			mysqli_stmt_bind_param($stmt, "ssssssss", $fdFname, $fdLname, $age, $gender, $qualityService, $prodQuality, $recommend, $suggestion);

			if (mysqli_stmt_execute($stmt)) {
				echo json_encode(array("status" => "success", "message" => "Feedback added successfully"));
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
