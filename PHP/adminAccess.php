<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adminUname']) && isset($_POST['adminPwd'])) {
        include ('Taketwoconnect.php');

        $userName = $_POST['adminUname'];
        $passDelete = $_POST['adminPwd'];

        $userName = mysqli_real_escape_string($conn, $userName);
        $passDelete = mysqli_real_escape_string($conn, $passDelete);

        $sql = "SELECT * FROM adminx WHERE adminUname = '$userName' AND adminPwd ='$passDelete';";
        
        // Execute the query
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['adminUname'] = $userName;
            
            header("location: ../Webpages/Admin.php");
            exit();
        } else {
            header("location: ../Webpages/AdminLogin.php?error=true");
            exit();
        }
    } else {
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
