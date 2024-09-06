<?php
require "Taketwoconnect.php";

if (isset($_POST['submitLog'])) {
    $UsernameX = $_POST['mLogUname'];
    $Upassword = $_POST['mLogPwd'];

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM client WHERE clnUn = ? AND clnPwd = ?");

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $UsernameX, $Upassword);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Login successful
        session_start();
        $_SESSION['user_login'] = $UsernameX;

        header("Location: http://127.0.0.1:8888/2210294_2112852/home.php"); // Redirect to the home page
        exit();
    } else {
        // login failed
        echo "<script>alert('Login failed. Please try again.');</script>";
        header("Location: http://127.0.0.1:8888/2210294_2112852/Webpages/login.php");
        exit();
    }

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
}

mysqli_close($conn);
?>