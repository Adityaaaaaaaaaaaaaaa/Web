<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Taketwoconnect.php";

    // Clean and sanitize input data
    $rsvFname = mysqli_real_escape_string($conn, $_POST['rsvFname']);
    $rsvLname = mysqli_real_escape_string($conn, $_POST['rsvLname']);
    $rsvPhone = mysqli_real_escape_string($conn, $_POST['rsvPhone']);
    $rsvEmail = mysqli_real_escape_string($conn, $_POST['rsvEmail']);
    $rsvDate = mysqli_real_escape_string($conn, $_POST['rsvDate']);
    $rsvMsg = mysqli_real_escape_string($conn, $_POST['rsvMsg']);

    // Prepare SQL statement using a parameterized query
    $insertQuery = "INSERT INTO reservation (cName, cSurname, cPhone, cEmail, cMeeting_date, cMessage) 
                    VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $insertQuery);

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssssss", $rsvFname, $rsvLname, $rsvPhone, $rsvEmail, $rsvDate, $rsvMsg);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Insert successful
        header("Location: http://127.0.0.1:8888/2210294_2112852/home.php"); // Redirect to the home page
        exit();
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    mysqli_close($conn);
} else {
    echo "Invalid request!";
}
?>
