<?php
require_once('../Library/nusoap.php');

function getAboutUsContent() {
    $xml = new DOMDocument();
    $xml->load("../XML/aboutus.xml");

    $xsl = new DOMDocument();
    $xsl->load("../XSLT/aboutus.xslt");

    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);

    $html = $proc->transformToXML($xml);

    return $html;
}

class AboutUsService {
    private $server;

    public function __construct() {
        $this->server = new nusoap_server();
        $this->configureWSDL();
        $this->registerMethods();
    }

    private function configureWSDL() {
        $this->server->configureWSDL('aboutusService', 'urn:aboutusService');
    }

    private function registerMethods() {
        $this->server->register(
            'getAboutUsContent',
            array(),  // No input parameters
            array('return' => 'xsd:string'),  // Output string (HTML content)
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

$aboutUsService = new AboutUsService();
$aboutUsService->service();
?>
