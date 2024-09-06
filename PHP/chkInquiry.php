<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Taketwoconnect.php";

    // Clean and sanitize the input data
    $iqFname = mysqli_real_escape_string($conn, $_POST['iqFname']);
    $iqLname = mysqli_real_escape_string($conn, $_POST['iqLname']);
    $iqEmail = mysqli_real_escape_string($conn, $_POST['iqEmail']);
    $iqMsg = mysqli_real_escape_string($conn, $_POST['iqMsg']);

    // SQL statement using a parameterized query
    $insertQuery = "INSERT INTO inquiry (cName, cSurname, cEmail, cMessage) 
                    VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $insertQuery);

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssss", $iqFname, $iqLname, $iqEmail, $iqMsg);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // if Insert successful
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
