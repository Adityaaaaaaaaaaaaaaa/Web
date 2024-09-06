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

        header("Location: http://127.0.0.1:8888/2210294_2112852/home.php"); // Redirect to the home
        exit();
    } else {
        // else Registration failed
        echo "<script>alert('Registration failed. Please try again.');</script>";
        header("Location: http://127.0.0.1:8888/2210294_2112852/Webpages/login.php#f-regis");
        exit();
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>