<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data from POST request
    $rsvFname = $_POST['rsvFname'];
    $rsvLname = $_POST['rsvLname'];
    $rsvPhone = $_POST['rsvPhone'];
    $rsvEmail = $_POST['rsvEmail'];
    $rsvDate = $_POST['rsvDate'];
    $rsvMsg = $_POST['rsvMsg'];

    // Create an array with the data
    $data = array(
        'rsvFname' => $rsvFname,
        'rsvLname' => $rsvLname,
        'rsvPhone' => $rsvPhone,
        'rsvEmail' => $rsvEmail,
        'rsvDate' => $rsvDate,
        'rsvMsg' => $rsvMsg
    );

    // Convert the data to JSON format
    $jsonData = json_encode($data);

    // Set up the HTTP request
    $url = 'http://127.0.0.1:8888/Web/Server/Reservation_REST.php';

    // Create the HTTP context for the POST request
    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => $jsonData
        )
    );
    $context  = stream_context_create($options);

    // Send the request and get the response
    $response = file_get_contents($url, false, $context);

    // Decode the response
    $result = json_decode($response, true);

    // Check the response and act accordingly
    if ($result && $result['status'] == 'success') {
        // Redirect to home page if successful
        header("Location: ../home.php");
        exit();
    } else {
        // Display the error message
        echo "Error: " . $result['message'];
    }
} else {
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
?>
