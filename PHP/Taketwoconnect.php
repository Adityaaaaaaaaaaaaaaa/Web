<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TakeTwo";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        ("Connection failed: " . mysqli_connect_error());
    }
?>