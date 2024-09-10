<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../PHP/Taketwoconnect.php"; // Your database connection file

    // Get the raw POST data (JSON)
    $inputData = file_get_contents("php://input");

    // Decode the JSON data
    $data = json_decode($inputData, true);

    // Validate if all fields are present
    if (isset($data['rsvFname'], $data['rsvLname'], $data['rsvPhone'], $data['rsvEmail'], $data['rsvDate'], $data['rsvMsg'])) {
        // Clean and sanitize input data
        $rsvFname = mysqli_real_escape_string($conn, $data['rsvFname']);
        $rsvLname = mysqli_real_escape_string($conn, $data['rsvLname']);
        $rsvPhone = mysqli_real_escape_string($conn, $data['rsvPhone']);
        $rsvEmail = mysqli_real_escape_string($conn, $data['rsvEmail']);
        $rsvDate = mysqli_real_escape_string($conn, $data['rsvDate']);
        $rsvMsg = mysqli_real_escape_string($conn, $data['rsvMsg']);

        // Prepare the insert query
        $insertQuery = "INSERT INTO reservation (cName, cSurname, cPhone, cEmail, cMeeting_date, cMessage) 
                        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssssss", $rsvFname, $rsvLname, $rsvPhone, $rsvEmail, $rsvDate, $rsvMsg);

        // Execute the query and respond with JSON
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "Reservation added successfully"));
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