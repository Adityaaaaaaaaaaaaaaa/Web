<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminUname']) && isset($_POST['adminPwd'])) {
    include ('Taketwoconnect.php');

    // Get the username and password from the form input
    $userName = $_POST['adminUname'];
    $passDelete = $_POST['adminPwd'];

    // Sanitize input to prevent SQL injection
    $userName = mysqli_real_escape_string($conn, $userName);
    $passDelete = mysqli_real_escape_string($conn, $passDelete);

    // SQL query to get login credential match
    $sql = "SELECT * FROM adminx WHERE adminUname = '$userName' AND adminPwd ='$passDelete';";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Password and username are correct, create a session variable
        session_start();
        $_SESSION['adminUname'] = $userName;
        
        // Redirect to admin.php
        header("location: ../Webpages/Admin.php");
        exit();
    } else {
        // Incorrect username or password        
        // Redirect to AdminLogin.php
        header("location: ../Webpages/AdminLogin.php?error=true");
        exit();
    }
} else {
    // If no username or password provided, redirect back to the login page
    //header("location: ../home.php");
    //exit();
    echo ' <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- XSAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
    <!-- XAlert core JS -->
    <script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
    <script>
        XSAlert({
            title: "Woopsie",
            message: "You are not meant to be here ...",
            icon: \'error\',
            autoCloseTimer: 600,
            hideProgressBar: false, // true to hide
            hideProgressIcon: false, // true to hide
            hideOkButton: true,
            hideCancelButton: true
            // You can also perform an action after cllosing the alert
        }).then((result) => {
            if(result == \'autoClosed\') {
                XSAlert({icon: \'warning\', message: \'Exit this page below\', hideCancelButton: true, hideOkButton: true, 
                    closeOnOutsideClick: false, footer: \'<a href="../home.php">Home</a>\'})
            }
        })
    </script>';
}
mysqli_close($conn);
?>
