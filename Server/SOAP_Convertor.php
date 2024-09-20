<?php

class CurrencyConverterService
{
    private $client;

    public function __construct()
    {
        try {
            // Initialize SOAP client for currency conversion
            $this->client = new SoapClient("https://www.webservicex.net/CurrencyConvertor.asmx?WSDL");
        } catch (Exception $e) {
            echo 'Error initializing SOAP client: ', $e->getMessage();
        }
    }

    public function convertCurrency($amount, $fromCurrency, $toCurrency)
    {
        try {
            // Parameters for the conversion request
            $params = array(
                'FromCurrency' => $fromCurrency,
                'ToCurrency' => $toCurrency
            );
            $conversionRate = $this->client->ConversionRate($params);
            return $amount * $conversionRate->ConversionRateResult;
        } catch (SoapFault $fault) {
            return 'SOAP Error: ' . $fault->getMessage();
        }
    }
}

// Instantiate the currency converter and perform conversion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];

    $converter = new CurrencyConverterService();
    $convertedAmount = $converter->convertCurrency($amount, 'USD', $currency);  // Assuming base currency is USD

    echo json_encode(array('convertedAmount' => $convertedAmount));
}
?>