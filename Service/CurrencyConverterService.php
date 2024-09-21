<?php
    class CurrencyConverterService {
        private $apiKey;
        private $apiUrl;

        public function __construct() {
            // Fixer.io API key
            $this->apiKey = '80f4a4907ca2682769d4569618edae01';
            $this->apiUrl = 'http://data.fixer.io/api/latest';
        }

        public function getExchangeRate($fromCurrency, $toCurrency) {
            $url = $this->apiUrl . '?access_key=' . $this->apiKey . '&symbols=' . $fromCurrency . ',' . $toCurrency;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            $curlError = curl_error($ch); // Capture any cURL errors
            curl_close($ch);

            if ($curlError) {
                return false;  
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
                return false;  // Log or handle error here
            }
        }
    }
?>
