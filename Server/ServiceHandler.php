<?php

require_once '../Service/Service.php';  // Load the combined service

try {
    $service = new CombinedService();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];

        if ($action == 'calculate') {
            if (isset($_POST['packageCost'], $_POST['extraPhotos'], $_POST['addonCost'])) {
                $packageCost = $_POST['packageCost'];
                $extraPhotos = $_POST['extraPhotos'];
                $addonCost = $_POST['addonCost'];

                // Calculate the total cost in MUR
                $totalCostMUR = $service->calculateTotalMUR($packageCost, $extraPhotos, $addonCost);
                echo json_encode(array('totalCost' => $totalCostMUR));
            } else {
                echo json_encode(array('error' => 'Missing required parameters.'));
            }
        } elseif ($action == 'convert') {
            if (isset($_POST['totalCost'], $_POST['currency'])) {
                $totalCostMUR = $_POST['totalCost'];
                $currency = $_POST['currency'];

                // Convert the total cost to the selected currency
                $convertedTotal = $service->convertToCurrency($totalCostMUR, $currency);
                if ($convertedTotal !== false) {
                    echo json_encode(array('convertedAmount' => $convertedTotal));
                } else {
                    echo json_encode(array('error' => 'Unable to convert currency.'));
                }
            } else {
                echo json_encode(array('error' => 'Missing required parameters for conversion.'));
            }
        }
    }
} catch (Exception $e) {
    echo json_encode(array('error' => 'An unexpected error occurred: ' . $e->getMessage()));
}
