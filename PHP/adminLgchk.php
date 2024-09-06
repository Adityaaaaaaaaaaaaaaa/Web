<?php
if (isset($_POST['adminUname'])) {
    require "Taketwoconnect.php";

    $adminUname = $_POST['adminUname'];

    $sql = "SELECT * FROM adminx WHERE adminUname = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Prepared statement preparation failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $adminUname);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query execution failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Access Credentials Verified!";
    } else {
        echo "Incorrect Access Credential!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
