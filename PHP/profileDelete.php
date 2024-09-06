<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_login']) && isset($_POST['delPwd'])) {
        include ('Taketwoconnect.php');

        $passDelete = $_POST['delPwd'];

        $userName = $_SESSION['user_login'];

        $sql = "DELETE FROM client WHERE clnUn = '$userName' AND clnPwd ='$passDelete';";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // if Deletion successful
            mysqli_close($conn);
            
            header("location: ../Webpages/Logout.php");
            exit();
        } else {
            // else Deletion failed, close the database connection
            mysqli_close($conn);
            header("location: ../Webpages/profile.php");
            exit();
        }
    } else {
        header("location: ../Webpages/profile.php");
        exit();
    }
?>
