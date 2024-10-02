<?php
require_once('../Library/nusoap.php');

// Define the standalone function outside the class
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

class AboutUsService {
    private $server;

    public function __construct() {
        // Initialize the SOAP server
        $this->server = new nusoap_server();
        $this->configureWSDL();
        $this->registerMethods();
    }

    // Configure the WSDL
    private function configureWSDL() {
        $this->server->configureWSDL('aboutusService', 'urn:aboutusService');
    }

    // Register the function to the SOAP server
    private function registerMethods() {
        $this->server->register(
            'getAboutUsContent',
            array(),  // No input parameters
            array('return' => 'xsd:string'),  // Output is a string (HTML content)
            'urn:aboutusService',
            'urn:aboutusService#getAboutUsContent',
            'rpc',
            'encoded',
            'Fetches the aboutus.xml file, applies XSLT, and returns HTML content'
        );
    }

    // The public function to handle the SOAP requests
    public function service() {
        $this->server->service(file_get_contents("php://input"));
    }
}

// Instantiate the service and handle requests
$aboutUsService = new AboutUsService();
$aboutUsService->service();
?>
