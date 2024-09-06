<?php
    include "Taketwoconnect.php";

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        filetype VARCHAR(50) NOT NULL,
        filesize INT(10) NOT NULL,
        filecontent LONGBLOB NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'uploaded_files' created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>
