<?php
require "Taketwoconnect.php";

$chkRUname = $_POST['mRegUname'];

$sql = "SELECT * FROM client WHERE clnUn = ?";

$stmt = mysqli_prepare($conn, $sql);
if ($stmt === false) {
    die("Prepared statement preparation failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "s", $chkRUname);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Query execution failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo "Username: '$chkRUname' is already taken !";
} else if (strlen($chkRUname) < 5) {
    echo "Username must be at least 5 characters long!";
} else {
    echo "Looks good!...";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
