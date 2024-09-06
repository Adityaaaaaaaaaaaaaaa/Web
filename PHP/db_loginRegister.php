<?php
include "./Taketwoconnect.php";

try {
    
    //table clients to store users details 
    $Create = "CREATE TABLE client(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        clnFn VARCHAR(50) NOT NULL,
        clnLn VARCHAR(50) NOT NULL,
        clnUn VARCHAR(50) NOT NULL,
        clnEmail VARCHAR(50) NOT NULL,
        clnPhone VARCHAR(10) NOT Null,
        clnPwd VARCHAR(50) NOT NULL
    )";
    
    if (mysqli_query($conn, $Create)) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    //sample pre filled data
    $sql2 = "INSERT INTO client (id, clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd)
        VALUES
        (1, 'user1', 'aaa', 'user111', 'user1@gmail.com', '5111 1111', 'u111'),
        (2, 'user2', 'bbb', 'user222', 'user2@gmail.com', '5222 2222', 'u222'),
        (3, 'user3', 'ccc', 'user333', 'user3@gmail.com', '5333 3333', 'u333'),
        (4, 'user4', 'ddd', 'user444', 'user4@gmail.com', '5444 4444', 'u444'),
        (5, 'user5', 'eee', 'user555', 'user5@gmail.com', '5555 5555', 'u555'),
        (6,	'Jennifer', 'Taii', 'jentaii', 'jentaii@gmail.com', '5673 7837', 'jenny');";

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