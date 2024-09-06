<?php
    require "Taketwoconnect.php";

    if (!(isset($_POST['mRegUname']))){
        echo ' <!-- jQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- XSAlert CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
            <!-- XAlert core JS -->
            <script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
            <script>
            XSAlert({
                title: "Ouch!",
                message: "Invalid Request",
                icon: \'warning\',
                hideCancelButton: true,
                closeOnOutsideClick: false,
                hideOkButton: true,
                closeWithESC: false,
                footer: \'<a href="../home.php">Home</a>\'
            })
            </script>';
    }

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
