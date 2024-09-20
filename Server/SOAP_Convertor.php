<?php

require_once '../Service/CalculatorService.php';
require_once '../Service/CurrencyConverterService.php';

// Handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $totalCostMUR = $_POST['totalCost'];
    $currency = $_POST['currency'];

    // Initialize the currency converter
    $converter = new CurrencyConverterService();
    $exchangeRate = $converter->getExchangeRate('MUR', $currency);

    // Check if the exchange rate was successfully retrieved
    if ($exchangeRate !== false) {
        // Initialize the calculator service to calculate the converted total
        $calculator = new CalculatorService();
        $convertedTotal = $calculator->calculateConvertedTotal($totalCostMUR, $exchangeRate);

        echo json_encode(array('convertedAmount' => $convertedTotal));
    } else {
        echo json_encode(array('error' => 'Unable to convert currency.'));
    }
}
