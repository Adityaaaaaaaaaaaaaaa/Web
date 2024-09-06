<?php

session_start();

// Check if the user is authenticated
if ( (!($_SERVER["REQUEST_METHOD"] == "POST")) && !isset($_SESSION['adminUname']) && !isset($_POST['tablex'])) {
    //echo "Unauthorized access";
    //exit;
    echo ' <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- XSAlert CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
            <!-- XAlert core JS -->
            <script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
            <script>
            XSAlert({
                title: "Sneaking in?",
                message: "You know what to do",
                icon: \'error\',
                hideCancelButton: true,
                closeOnOutsideClick: false,
                hideOkButton: true,
                closeWithESC: false,
                footer: \'<a href="../home.php">Home</a>\'
            })
        </script>';
}

require "Taketwoconnect.php";

$selectedTable = $_POST['tablex'];

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
    $columns = "id, cName, cSurname, cAge, cgender, cQuality_service, cProduct_quality, cRecommend, cSuggestion";
    $query = "SELECT $columns FROM feedback";
} elseif ($selectedTable === "uploaded_files") {
    $columns = "id, filename, filetype, filesize, upload_date";
    $query = "SELECT $columns FROM uploaded_files";
} else {
    echo "Invalid table selection."; // if error
    exit;
}

$result = mysqli_query($conn, $query);

// Create XML string
$xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
$xmlString .= "<{$selectedTable}s>";

// Add data rows to XML
while ($row = mysqli_fetch_assoc($result)) {
    $xmlString .= "<{$selectedTable}>";
    foreach ($row as $key => $value) {
        // Escape special characters in XML
        $value = htmlspecialchars($value);
        $xmlString .= "<$key>$value</$key>";
    }
    $xmlString .= "</{$selectedTable}>";
}
$xmlString .= "</{$selectedTable}s>";

// Load XSL stylesheet
$xsl = new DOMDocument();
$xsl->load('../XSLT/adminData.xslt');

$xml = new DOMDocument();
$xml->loadXML($xmlString);

$xsltProcessor = new XSLTProcessor();
$xsltProcessor->importStylesheet($xsl);

$html = $xsltProcessor->transformToXML($xml);

header('Content-Type: text/html');

echo $html;
exit;
?>
