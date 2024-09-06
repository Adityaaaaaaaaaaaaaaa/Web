<?php
    require "Taketwoconnect.php";

    if (isset($_POST['submitLog'])) {
        $UsernameX = $_POST['mLogUname'];
        $Upassword = $_POST['mLogPwd'];

        $stmt = mysqli_prepare($conn, "SELECT * FROM client WHERE clnUn = ? AND clnPwd = ?");

        mysqli_stmt_bind_param($stmt, "ss", $UsernameX, $Upassword);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            session_start();
            $_SESSION['user_login'] = $UsernameX;

            //header("Location: http://127.0.0.1:8888/2210294_2210332/home.php"); // Redirect to the home page
            header("Location:../home.php");
            exit();
        } else {
            echo ' <!-- jQuery -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <!-- XSAlert CSS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
                    <!-- XAlert core JS -->
                    <script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
                    <script>
                    XSAlert({
                        title: "Error!",
                        message: "Login Failed",
                        icon: \'warning\',
                        hideCancelButton: true,
                        closeOnOutsideClick: false,
                        hideOkButton: true,
                        closeWithESC: false,
                        footer: \'<a href="../home.php">Home</a>\'
                    })
                </script>';
        }

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
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