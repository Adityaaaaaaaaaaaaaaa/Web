<?php
require "Taketwoconnect.php";

$chkUname = $_POST['mLogUname'];

$sql = "SELECT * FROM client WHERE clnUn = ?";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt === false) {
    die("Prepared statement preparation failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $chkUname);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Query execution failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo "Welcome $chkUname !";
} else {
    echo "Oops, looks like '$chkUname' is not registered yet!";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
