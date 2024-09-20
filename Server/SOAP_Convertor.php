<?php

class CurrencyConverterService
{
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        // Your Fixer.io API key (replace with your own API key from the Fixer.io dashboard)
        $this->apiKey = '573da3b52a27bab46bc67602a0ca67e2';  // Replace with your valid API key
        $this->apiUrl = 'http://data.fixer.io/api/latest';  // Base URL for latest exchange rates
    }

    public function convertCurrency($amount, $fromCurrency, $toCurrency)
    {
        // Fixer.io free tier only supports EUR as the base currency
        // So we first convert MUR to EUR, and then EUR to the target currency
        
        // Step 1: Build the URL for the Fixer.io API request to fetch MUR to EUR and EUR to target currency rates
        $url = $this->apiUrl . '?access_key=' . $this->apiKey . '&symbols=' . $fromCurrency . ',' . $toCurrency;

        // Make the API request using cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        // Parse the API response
        $data = json_decode($response, true);

        // Check if the request was successful
        if (isset($data['success']) && $data['success'] === true) {
            // Fixer.io free plan uses EUR as the base currency
            $rateMURtoEUR = 1 / $data['rates']['MUR'];  // MUR to EUR
            $rateEURtoTarget = $data['rates'][$toCurrency];  // EUR to target currency
            $exchangeRate = $rateMURtoEUR * $rateEURtoTarget;  // Final conversion rate from MUR to target currency
            
            // Calculate the converted amount
            $convertedAmount = round($amount * $exchangeRate, 2);

            return array(
                'convertedAmount' => $convertedAmount,
                'exchangeRate' => $exchangeRate  // For debugging purposes
            );
        } else {
            return array(
                'error' => 'Unable to retrieve exchange rate.'
            );
        }
    }
}

// Handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];  // Amount in MUR
    $currency = $_POST['currency'];  // Target currency

    // Convert from MUR (Mauritian Rupees) to the selected currency
    $converter = new CurrencyConverterService();
    $result = $converter->convertCurrency($amount, 'MUR', $currency);

    // Return the result as a JSON object
    echo json_encode($result);
}
