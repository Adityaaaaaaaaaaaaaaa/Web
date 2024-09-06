<?php

session_start();
if (isset($_SESSION['adminUname']) && isset($_POST['tablex'])) {
    require "Taketwoconnect.php";

    // Get the selected table from the form POST request
    $selectedTable = $_POST['tablex'];

    // Define the columns based on the selected table
    $columns = "";
    $query = "";

    // Check which table has been selected and set columns and query accordingly
    if ($selectedTable === "client") {
        $columns = "id, clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd";
        $query = "SELECT $columns FROM client";
    } elseif ($selectedTable === "reservation") {
        $columns = "id, cName, cSurname, cPhone, cEmail, cMeeting_date, cMessage";
        $query = "SELECT $columns FROM reservation";
    } elseif ($selectedTable === "inquiry") {
        $columns = "id, cName, cSurname, cEmail, cMessage";
        $query = "SELECT $columns FROM inquiry";
    } elseif ($selectedTable === "feedback") {
        $columns = "id, cName, cSurname, cAge, cgender, cQuality_service, cPhoto_quality, cRecommend, cSuggestion";
        $query = "SELECT $columns FROM feedback";
    } else {
        echo "Invalid table selection."; // if error
        exit; // Exit if table selection is invalid
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/admin style.css">
    <title>Table Display</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1f1f1f;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    if (isset($result)) {
        echo '<table class="data-table">';
        echo '<thead>';
        echo '<tr>';
        $columnArray = explode(", ", $columns);
        foreach ($columnArray as $column) {
            echo '<th>' . $column . '</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            foreach ($columnArray as $column) {
                echo '<td>' . $row[$column] . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
    ?>
        <br>
        <div class="button-container">
            <button onclick="goBack()">Go Back</button>
        </div>


		<script>
		    function goBack() {
			    window.history.back();
		    }
		</script>
</body>
</html>
