<?php

class CurrencyConverterService
{
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        // Fixer.io API key
        $this->apiKey = '573da3b52a27bab46bc67602a0ca67e2';
        $this->apiUrl = 'http://data.fixer.io/api/latest';
    }

    public function getExchangeRate($fromCurrency, $toCurrency)
    {
        // Build the API URL
        $url = $this->apiUrl . '?access_key=' . $this->apiKey . '&symbols=' . $fromCurrency . ',' . $toCurrency;

        // cURL to make the API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $curlError = curl_error($ch); // Capture any cURL errors
        curl_close($ch);

        // Check for cURL error
        if ($curlError) {
            return false;  // Log or return error
        }

        // Parse the JSON response
        $data = json_decode($response, true);

        // Check if the request was successful
        if (isset($data['success']) && $data['success'] === true) {
            // Fixer.io free plan uses EUR as base currency
            $rateMURtoEUR = 1 / $data['rates'][$fromCurrency];
            $rateEURtoTarget = $data['rates'][$toCurrency];
            $exchangeRate = $rateMURtoEUR * $rateEURtoTarget;

            return $exchangeRate;  // Return the calculated exchange rate
        } else {
            // If there's an issue with the API response
            return false;  // Log or handle error here
        }
    }
}
