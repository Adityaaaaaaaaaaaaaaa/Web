<?php
include "./Taketwoconnect.php";

try {

    //create table inquiry
    $tb_Inquiry = "CREATE TABLE inquiry (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        cName varchar(50) NOT NULL,
        cSurname varchar(50) NOT NULL,
        cEmail varchar(100) NOT NULL,
        cMessage varchar(500) 
    );";

    if (mysqli_query($conn, $tb_Inquiry)) {
        echo "<br>Table inquiry created successfully.";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

    //create table reservation
    $tb_Reserve = "CREATE TABLE reservation (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        cName varchar(50) NOT NULL,
        cSurname varchar(50) NOT NULL,
        cPhone varchar(10) NOT NULL,
        cEmail varchar(100) NOT NULL,
        cMeeting_date date NOT NULL,
        cMessage text 
    );";

    if (mysqli_query($conn, $tb_Reserve)) {
        echo "<br>Table reservation created successfully.";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

    //create table feedback
    $tb_Feedback = "CREATE TABLE feedback (
        id INT(11) AUTO_INCREMENT PRIMARY KEY, 
        cName varchar(50) NOT NULL,
        cSurname varchar(50) NOT NULL,
        cAge varchar(6) NOT NULL,
        cgender varchar(5) NOT NULL,
        cQuality_service varchar(10) NOT NULL,
        cPhoto_quality varchar(10) NOT NULL,
        cRecommend varchar(10) NOT NULL,
        cSuggestion varchar(500) 
    );";

    if (mysqli_query($conn, $tb_Feedback)) {
        echo "<br>Table feedback created successfully.";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

mysqli_close($conn);
?>