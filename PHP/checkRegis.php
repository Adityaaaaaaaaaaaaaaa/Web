<?php
require "Taketwoconnect.php";

if (isset($_POST['submitReg'])) {
    $clnFnameRg = $_POST['mRegFname'];
    $clnLnameRg = $_POST['mRegLname'];
    $clnUnameRg = $_POST['mRegUname'];
    $clnEmailRg = $_POST['mRegEmail'];
    $clnPhoneRg = $_POST['mRegPhone'];
    $clnPwdRg = $_POST['mRegPwd'];

    // Prepare SQL statement
    $stmt = mysqli_prepare($conn, "INSERT INTO client (clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ssssss", $clnFnameRg, $clnLnameRg, $clnUnameRg, $clnEmailRg, $clnPhoneRg, $clnPwdRg);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result && mysqli_affected_rows($conn) > 0) {
        // if Login successful
        session_start();
        $_SESSION['user_login'] = $clnUnameRg;

        //header("Location: http://127.0.0.1:8888/2210294_2210332/home.php"); // Redirect to the home
        header("Location:../home.php");
        exit();
    } else {
        // else Registration failed
        //echo "<script>alert('Registration failed. Please try again.');</script>";
        //header("Location: http://127.0.0.1:8888/2210294_2210332/Webpages/login.php#f-regis");
        //header("Location:../home.php");
        //exit();
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

    mysqli_stmt_close($stmt);
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

mysqli_close($conn);
?>