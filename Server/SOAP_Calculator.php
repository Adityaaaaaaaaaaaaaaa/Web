calculator


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
            echo 'Error initializing SOAP client: ', $e->getMessage();
        }
    }

    public function calculateTotal($packageCost, $extraPhotosCost, $addonCost)
    {
        try {
            // Add package cost and additional costs using the Add operation from the calculator SOAP service
            $params = array('intA' => $packageCost, 'intB' => $extraPhotosCost + $addonCost);
            $response = $this->client->Add($params);
            return $response->AddResult;  // Total cost
        } catch (SoapFault $fault) {
            return 'SOAP Error: ' . $fault->getMessage();
        }
    }
}

// Instantiate the calculator and calculate total
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageCost = $_POST['packageCost'];
    $extraPhotosCost = $_POST['extraPhotos'] * 10;  // $10 per extra photo
    $addonCost = $_POST['addonCost'];

    $calculator = new CalculatorService();
    $totalCost = $calculator->calculateTotal($packageCost, $extraPhotosCost, $addonCost);

    echo json_encode(array('totalCost' => $totalCost));
}
?>