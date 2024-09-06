<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "Taketwoconnect.php"; 

    // Clean and sanitize the input data
    $fdFname = mysqli_real_escape_string($conn, $_POST['fdFname']);
    $fdLname = mysqli_real_escape_string($conn, $_POST['fdLname']);
    
    // Capture the selected age option
    $age = "";
    if (isset($_POST['age'])) {
        $age = mysqli_real_escape_string($conn, $_POST['age']);
    }

    // Capture the selected gender option
    $gender = "";
    if (isset($_POST['gender'])) {
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    }

    // Capture the selected quality service option
    $qualityService = "";
    if (isset($_POST['qtser'])) {
        $qualityService = mysqli_real_escape_string($conn, $_POST['qtser']);
    }

    // Capture the selected photo quality option
    $prodQuality = "";
    if (isset($_POST['prodq'])) {
        $photoQuality = mysqli_real_escape_string($conn, $_POST['prodq']);
    }

    // Capture the selected recommend option
    $recommend = "";
    if (isset($_POST['recom'])) {
        $recommend = mysqli_real_escape_string($conn, $_POST['recom']);
    }

    $suggestion = mysqli_real_escape_string($conn, $_POST['fbmsg']);

    // prepared statement to insert into the feedback table
    $insertQuery = "INSERT INTO feedback (cName, cSurname, cAge, cgender, cQuality_service, cProduct_quality, cRecommend, cSuggestion) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssssssss", $fdFname, $fdLname, $age, $gender, $qualityService, $prodQuality, $recommend, $suggestion);

    if (mysqli_stmt_execute($stmt)) {
        // if Insert successful
        //header("Location: http://127.0.0.1:8888/2210294_2210332/home.php");
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    //echo "Invalid request!";
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