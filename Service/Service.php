<?php

require_once 'CalculatorService.php';
require_once 'CurrencyConverterService.php';

class CombinedService
{
    private $calculatorService;
    private $currencyConverterService;

    public function __construct()
    {
        $this->calculatorService = new CalculatorService();
        $this->currencyConverterService = new CurrencyConverterService();
    }

    // Function to calculate the total in MUR
    public function calculateTotalMUR($packageCost, $extraPhotosCost, $addonCost)
    {
        return $this->calculatorService->calculateTotal($packageCost, $extraPhotosCost, $addonCost);
    }

    // Function to convert MUR to the target currency
    public function convertToCurrency($totalCostMUR, $currency)
    {
        $exchangeRate = $this->currencyConverterService->getExchangeRate('MUR', $currency);

        if ($exchangeRate) {
            return $this->calculatorService->calculateConvertedTotal($totalCostMUR, $exchangeRate);
        } else {
            return false;  // If exchange rate could not be fetched
        }
    }
}
