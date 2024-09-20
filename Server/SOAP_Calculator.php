<?php

class CalculatorService
{
    private $client;

    public function __construct()
    {
        try {
            // Initialize SOAP client for calculator service
            $this->client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");
        } catch (Exception $e) {
            echo json_encode(array('error' => 'Error initializing SOAP client: ' . $e->getMessage()));
            exit;
        }
    }

    public function calculateTotal($packageCost, $extraPhotosCost, $addonCost)
    {
        try {
            // Add package cost and additional costs using the Add operation from the SOAP service
            $params = array('intA' => $packageCost, 'intB' => $extraPhotosCost + $addonCost);
            $response = $this->client->Add($params);
            return $response->AddResult;  // Total cost
        } catch (SoapFault $fault) {
            return 'SOAP Error: ' . $fault->getMessage();
        }
    }
}

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageCost = isset($_POST['packageCost']) ? $_POST['packageCost'] : 0;
    $extraPhotosCost = isset($_POST['extraPhotos']) ? $_POST['extraPhotos'] : 0;
    $addonCost = isset($_POST['addonCost']) ? $_POST['addonCost'] : 0;

    if ($packageCost === 0) {
        echo json_encode(array('error' => 'Package cost is missing'));
        exit;
    }

    // Calculate the total using the CalculatorService
    $calculator = new CalculatorService();
    $totalCost = $calculator->calculateTotal($packageCost, $extraPhotosCost, $addonCost);

    if (is_numeric($totalCost)) {
        echo json_encode(array('totalCost' => $totalCost));
    } else {
        echo json_encode(array('error' => $totalCost));
    }
}
