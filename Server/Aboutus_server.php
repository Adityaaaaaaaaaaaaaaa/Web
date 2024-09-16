<?php
require_once('../Nusoap/nusoap.php');

// Create a new SOAP server instance
$server = new nusoap_server();
$server->configureWSDL('aboutusService', 'urn:aboutusService');

// Register the function that will be exposed to the SOAP client
$server->register('getAboutUsContent',
    array(),  // No input parameters
    array('return' => 'xsd:string'),  // Output will be a string (HTML content)
    'urn:aboutusService',
    'urn:aboutusService#getAboutUsContent',
    'rpc',
    'encoded',
    'Fetches the aboutus.xml file, applies XSLT, and returns HTML content'
);

// Define the function that fetches the XML, applies XSLT, and returns the HTML content
function getAboutUsContent() {
    // Load the XML file
    $xml = new DOMDocument();
    $xml->load("../XML/aboutus.xml");

    // Load the XSLT file
    $xsl = new DOMDocument();
    $xsl->load("../XSLT/aboutus.xslt");

    // Create an XSLT processor
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);

    // Apply the transformation
    $html = $proc->transformToXML($xml);

    // Return the transformed HTML
    return $html;
}

// Process the SOAP requests
$server->service(file_get_contents("php://input"));
?>
