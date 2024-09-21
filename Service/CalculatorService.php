<?php
	class CalculatorService {
		private $client;

		public function __construct() {
			try {
				$this->client = new SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");
			} catch (Exception $e) {
				echo json_encode(array('error' => 'Error initializing SOAP client: ' . $e->getMessage()));
				exit;
			}
		}

		// Calculate total cost in MUR
		public function calculateTotal($packageCost, $extraPhotosCost, $addonCost) {
			try {
				$params = array('intA' => $packageCost, 'intB' => $extraPhotosCost + $addonCost);
				$response = $this->client->Add($params);
				return $response->AddResult;  // Total cost in MUR
			} catch (SoapFault $fault) {
				return 'SOAP Error: ' . $fault->getMessage();
			}
		}

		// Calculate total in new currency
		public function calculateConvertedTotal($totalInMUR, $exchangeRate) {
			return round($totalInMUR * $exchangeRate, 2);  // Return the total rounded to 2 decimal places
		}
	}
?>
