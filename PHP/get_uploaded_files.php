<?php
include("Taketwoconnect.php");

// Fetch the list of uploaded files from the database
$query = "SELECT filename FROM uploaded_files";
$result = mysqli_query($conn, $query);

// Store the filenames in an array
$files = array();
while ($row = mysqli_fetch_assoc($result)) {
    $files[] = $row['filename'];
}

// Output the filenames as JSON
echo json_encode($files);

mysqli_close($conn);
?>
