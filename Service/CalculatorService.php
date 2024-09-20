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

    // Function to calculate the total cost in MUR
    public function calculateTotal($packageCost, $extraPhotosCost, $addonCost)
    {
        try {
            $params = array('intA' => $packageCost, 'intB' => $extraPhotosCost + $addonCost);
            $response = $this->client->Add($params);
            return $response->AddResult;  // Total cost in MUR
        } catch (SoapFault $fault) {
            return 'SOAP Error: ' . $fault->getMessage();
        }
    }

    // New function to calculate the total in the new currency
    public function calculateConvertedTotal($totalInMUR, $exchangeRate)
    {
        $totalInNewCurrency = $totalInMUR * $exchangeRate;
        return round($totalInNewCurrency, 2);  // Return the total rounded to 2 decimal places
    }
}
