<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="../CSS/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        :root {
            /* dark colour mode*/
            --paragraph-color: lightgrey;
            --h1-title: grey;
            --icon-color: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #FD1D1D, #F56040, #FFC13B, #4CAF50);
            --icon-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            --link-color: orange;
            --border-test: yellow;
            --h1-glow-Effect: 0 0 10px rgba(233, 54, 158, 0.8), 0 0 20px rgba(57, 16, 29, 0.8);
            --h1-gradient-color: linear-gradient(45deg, rgb(226, 159, 159), rgb(55, 55, 196), rgb(255, 0, 238));
            --userImg-boxShadow: 0 0 4em 0.1em #ff0010;
        }

        :root.light-mode {
            /* light colour mode*/
            --paragraph-color: #303030;
            --h1-title: #303030;
            --icon-color: linear-gradient(45deg, #6A92C2, #7E76B1, #9F6AA7, #C06B97, #E86A77, #E4775E, #E89E57, #86B556);
            --icon-shadow: 0 0 1px rgba(0, 0, 0, 0.25);
            --link-color: White;
            --border-test: black;
            --h1-glow-Effect: 0 0 10px rgba(121, 124, 68, 0.8), 0 0 20px rgba(173, 21, 70, 0.8);
            --h1-gradient-color: linear-gradient(45deg, rgb(104, 43, 128), rgb(140, 184, 69), rgb(179, 137, 47));
            --userImg-boxShadow: 0 0 4em 0.1em #0040ff;
        }

        a {
            color: var(--link-color);
        }

        .fa-instagram {
            text-decoration: none;
            color: transparent;
            background-image: var(--icon-color);
            -webkit-background-clip: text;
            background-clip: text;
            text-shadow: var(--icon-shadow);
            padding: 5px;
            display: inline-block;
            font-size: 1.10em;
        }

        img#aqsaa, img#adi {
            width: 300px;
            height: 400px;
            border-radius: 10%;
            margin-left: 50%;
            box-shadow: var(--userImg-boxShadow);
        }
    </style>

</head>
<body>

    <?php include "../Webpages/Header.php"; ?>

    <?php
    // Include the NuSOAP library
    require_once('../Library/nusoap.php');

    // Create a new SOAP client
    $client = new nusoap_client('http://127.0.0.1:8888/2210294_2210332/Server/Aboutus_server.php?wsdl', true);

    // Check for any client construction errors
    $err = $client->getError();
    if ($err) {
        echo 'Client creation error: ' . $err;
        exit();
    }

    // Call the SOAP method
    $response = $client->call('getAboutUsContent');

    // Check for faults or errors in the response
    if ($client->fault) {
        echo 'Fault: ';
        print_r($response);
    } else {
        $err = $client->getError();
        if ($err) {
            echo 'Error: ' . $err;
        } else {
            // Output the HTML returned by the SOAP service
            echo $response;
        }
    }
    ?>

    <?php include '../Webpages/Footer.php'; ?>
</body>
</html>
