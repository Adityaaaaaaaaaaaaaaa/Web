<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../PHP/Taketwoconnect.php"; // Your database connection file

    // Get the raw POST data (JSON)
    $inputData = file_get_contents("php://input");

    // Decode the JSON data
    $data = json_decode($inputData, true);

    if (isset($data['iqFname'], $data['iqLname'], $data['iqEmail'], $data['iqMsg'])) {
        // Clean and sanitize input data
        $iqFname = mysqli_real_escape_string($conn, $data['iqFname']);
        $iqLname = mysqli_real_escape_string($conn, $data['iqLname']);
        $iqEmail = mysqli_real_escape_string($conn, $data['iqEmail']);
        $iqMsg = mysqli_real_escape_string($conn, $data['iqMsg']);

        // Prepare and execute the insert query
        $insertQuery = "INSERT INTO inquiry (cName, cSurname, cEmail, cMessage) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssss", $iqFname, $iqLname, $iqEmail, $iqMsg);

        if (mysqli_stmt_execute($stmt)) {
            // Return success message
            echo json_encode(array("status" => "success", "message" => "Inquiry added successfully"));
        } else {
            // Return error message
            echo json_encode(array("status" => "error", "message" => "Error inserting data: " . mysqli_error($conn)));
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        // Missing data
        echo json_encode(array("status" => "error", "message" => "Invalid input data"));
    }
} else {
    // Invalid request method
    echo json_encode(array("status" => "error", "message" => "Only POST method is allowed"));
}
?>
