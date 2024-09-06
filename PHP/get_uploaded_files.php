<?php
    include("Taketwoconnect.php");

    $query = "SELECT filename FROM uploaded_files";
    $result = mysqli_query($conn, $query);

    $files = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $files[] = $row['filename'];
    }

    echo json_encode($files);

    mysqli_close($conn);
?>
