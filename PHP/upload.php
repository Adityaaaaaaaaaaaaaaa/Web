<?php 

include("Taketwoconnect.php");

$responses = array(); // Responses array

// Handle user data file uploads
if (isset($_FILES['userdatafile'])) {
    $uploadedUserDataFiles = array(); // Array to store uploaded user data files
    foreach($_FILES['userdatafile']['tmp_name'] as $key => $tmp_name) {
        $userDataFileName = $_FILES['userdatafile']['name'][$key];
        $userDataFileType = pathinfo($userDataFileName, PATHINFO_EXTENSION);
        $userDataFileTmp = $tmp_name;

        if ($userDataFileType === 'xml') {
            // Handle XML file processing and insert data into the client registration table
            $xmlData = simplexml_load_file($userDataFileTmp);
            foreach ($xmlData->user as $user) {
                // Insert data into client table
                $sql = "INSERT INTO client (clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $user->firstname, $user->lastname, $user->username, $user->email, $user->phone, $user->password);
                if ($stmt->execute()) {
                    $uploadedUserDataFiles[] = $userDataFileName;
                    $responses['userdatafile'] = "Status: <br>'" . implode("',<br>'", $uploadedUserDataFiles) . "' <br> have been successfully uploaded and integrated into our systems!";
                } else {
                    $responses['userdatafile'] = "Status: <br>We encountered a glitch while processing '" . $userDataFileName . "'.<br>Error code: " . $stmt->errno;
                }
            }
        } else {
            // Handle unsupported file format
            $responses['userdatafile'] = "Status: Unsupported file format detected for: <br>'" . $userDataFileName . "'<br>Please upload a valid XML file.";
        }
    }
} elseif (isset($_FILES['userdatafile']) && empty($_FILES['userdatafile']['name'][0])) {
    $responses['userdatafile'] = "No user data file uploaded.";
}

// Handle other file uploads
if (isset($_FILES['otherfile'])) {
    $uploadedOtherFiles = array(); // Array to store uploaded other files
    foreach($_FILES['otherfile']['tmp_name'] as $key => $tmp_name) {
        if ($_FILES['otherfile']['error'][$key] !== UPLOAD_ERR_OK || !is_uploaded_file($tmp_name) || filesize($tmp_name) == 0) {
            $uploadedOtherFiles[] = "No file uploaded or file is empty.";
            continue; // Skip to the next iteration
        }

        $otherFileName = $_FILES['otherfile']['name'][$key];
        $otherFileType = pathinfo($otherFileName, PATHINFO_EXTENSION);
        $otherFileSize = $_FILES['otherfile']['size'][$key];
        $otherFileTmp = $tmp_name; // Assign temporary file path
        $otherFileContent = file_get_contents($otherFileTmp); // Read file content

        // Insert other file details into the database table
        $sql = "INSERT INTO uploaded_files (filename, filetype, filesize, filecontent) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $otherFileName, $otherFileType, $otherFileSize, $otherFileContent);
        
        if ($stmt->execute()) {
            $uploadedOtherFiles[] = $otherFileName;
            $responses['otherfile'] = "Status: <br>'" . implode("',<br>'", $uploadedOtherFiles) . "' have been successfully uploaded!";
        } else {
            $responses['otherfile'] = "Status: <br>We encountered an issue while processing '" . implode("',<br>'", $uploadedOtherFiles) . "'.<br>Error code: " . $stmt->errno;
        }
    }
} elseif (isset($_FILES['otherfile']) && empty($_FILES['otherfile']['name'][0])) {
    $responses['otherfile'] = "No other file uploaded.";
}

mysqli_close($conn);

// URL parameters response to be sent back to be displayed
$queryParams = http_build_query($responses);

// Redirect to admin.php with the responses appended as URL parameters
header("Location: ../Webpages/admin.php?" . $queryParams);
exit();

?>
