<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TakeTwo"; //database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    ("Connection failed: " . mysqli_connect_error());
}
?>