<?php
include "Taketwoconnect.php";

try {

    //create table admin
    $admin_table = "CREATE TABLE adminx (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        adminUname varchar(50) NOT NULL,
        adminPwd varchar(50) NOT NULL
    );";

    if (mysqli_query($conn, $admin_table)) {
        echo "<br>Table admin created successfully.";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

    //admin credentials 
    $sql2 = "INSERT INTO adminx (id, adminUname, adminPwd)
        VALUES
        (1, 'Aditya', 'aditya1234'),
        (2, 'Aqsaa', 'aqsaa1234');";

    if (mysqli_query($conn, $sql2)) {
        echo "Insert successfully.";
    } else {
        echo "Error inserting table: " . mysqli_error($conn);
    }


} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

mysqli_close($conn);
?>