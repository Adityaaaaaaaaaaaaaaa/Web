<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "Taketwoconnect.php";

        // Clean and sanitize the input data
        $iqFname = mysqli_real_escape_string($conn, $_POST['iqFname']);
        $iqLname = mysqli_real_escape_string($conn, $_POST['iqLname']);
        $iqEmail = mysqli_real_escape_string($conn, $_POST['iqEmail']);
        $iqMsg = mysqli_real_escape_string($conn, $_POST['iqMsg']);

        $insertQuery = "INSERT INTO inquiry (cName, cSurname, cEmail, cMessage) 
                        VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $insertQuery);

        mysqli_stmt_bind_param($stmt, "ssss", $iqFname, $iqLname, $iqEmail, $iqMsg);

        if (mysqli_stmt_execute($stmt)) {
            //header("Location: http://127.0.0.1:8888/2210294_2210332/home.php"); // Redirect to the home page
            header("Location: ../home.php");
            exit();
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);

        mysqli_close($conn);
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
