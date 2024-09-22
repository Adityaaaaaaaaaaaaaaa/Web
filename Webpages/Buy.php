<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Buy</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" href="../CSS/Buy.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<script>
			$(document).ready(function() {
				$.ajax({
					type: "GET",
					url: "../XML/Buy.xml",
					dataType: "xml",
					success: function(xml) {
						$(xml).find('content').each(function() {
							var contentDiv = $('<div>').addClass('content main');
							
							// big heading
							var heading2 = $('<h2>').addClass('heading').text($(this).find('Bheading2').text());
							contentDiv.append(heading2);

							var welcomePara = $('<p>').addClass('Welcome').text($(this).find('para').text());
							contentDiv.append(welcomePara);

							// Section 1: How to Purchase a Photo
							var section1 = $('<div>');
							var h3_1 = $('<h3>').addClass('sub-heading').text($(this).find('Bheading3').text());
							section1.append(h3_1);

							var div1 = $('<div>').addClass($(this).find('BhowTo').attr('class'));
							$(this).find('BhowTo step').each(function() {
								var step = $('<p>').text($(this).text());
								div1.append(step);
							});
							section1.append(div1);
							contentDiv.append(section1);

							// Buy button
							var button1 = $('<button>').addClass($(this).find('BbuyBtn').attr('class'));
							var buttonText1 = $('<span>').text($(this).find('BbuyBtn label').text());
							var link1 = $('<a>').attr('href', $(this).find('BbuyBtn link').attr('href')).text($(this).find('BbuyBtn link').text());
							button1.append(buttonText1, '<br>', link1);
							contentDiv.append(button1);

							// Section 2: Reserve a Custom Session
							var section2 = $('<div>');
							var h3_2 = $('<h3>').addClass('sub-heading').text($(this).find('Rheading3').text());
							section2.append(h3_2);

							var div2 = $('<div>').addClass($(this).find('RhowTo').attr('class'));
							$(this).find('RhowTo step').each(function() {
								var step = $('<p>').text($(this).text());
								div2.append(step);
							});
							section2.append(div2);
							contentDiv.append(section2);

							// Section 3: Pricing Packages for Custom Shots
							var section3 = $('<div>').addClass('tableHeading').text($(this).find('THeading4').text());
							var table = $('<table>').html($(this).find('table').html());
							section3.append(table);
							contentDiv.append(section3);

							// Reserve button
							var button2 = $('<button>').addClass($(this).find('RbuyBtn').attr('class'));
							var buttonText2 = $('<span>').text($(this).find('RbuyBtn label').text());
							var link2 = $('<a>').attr('href', $(this).find('RbuyBtn link').attr('href')).text($(this).find('RbuyBtn link').text());
							button2.append(buttonText2, '<br>', link2);
							contentDiv.append(button2);

							$('#xmlContent').append(contentDiv);
						});
					},
					error: function(xhr, status, error) {
						console.error(error);
					}
				});
			});
		</script> 

	<script>
		$(document).ready(function() {
			// Hide sections by default
			$('#extraPhotosSection').hide();
			$('#addonsSection').hide();
			$('#addonsChoice').hide();
			$('#estimateBtn').hide();
			$('#currencySection').hide();
			$('#currencyConversion').hide();
			
			// When a package is selected, show the extra photos section
			$('#packageDropdown').on('change', function() {
				if ($(this).val() !== '') {
					$('#extraPhotosSection').slideDown();
					$('#addonsChoice').fadeIn();
				}
			});

			// Handle add-ons choice (Yes/No)
			$('input[name="addonsChoice"]').on('change', function() {
				if ($('input[name="addonsChoice"]:checked').val() === 'Yes') {
					$('#addonsSection').slideDown();
				} else {
					$('#addonsSection').slideUp();
				}
				$('#estimateBtn').fadeIn();
			});

			// Calculate the total estimate in Mauritian Rupees using the CombinedService API
			$('#estimateBtn').on('click', function() {
				var packageCost = parseFloat($('#packageDropdown').val());
				var extraPhotos = parseInt($('#extraPhotos').val()) || 0;
				var addonCost = parseFloat($('#addonsDropdown').val()) || 0;

				$.ajax({
					type: "POST",
					url: "../Server/ServiceHandler.php",  // Pointing to the single service handler
					data: {
						action: 'calculate',
						packageCost: packageCost,
						extraPhotos: extraPhotos * 100, // 100 MUR per extra photo
						addonCost: addonCost
					},
					success: function(response) {
						var data = JSON.parse(response);
						if (data.totalCost) {
							$('#result').text('Your estimated cost: Rs ' + data.totalCost).data('total-cost', data.totalCost);
							$('#currencySection').slideDown(); // Show currency conversion dropdown
							$('#currencyConversion').slideDown();
						} else {
							$('#result').text('Error: ' + data.error);
						}
					},
					error: function(xhr, status, error) {
						$('#result').text('Error: ' + error);
					}
				});
			});

			// Trigger currency conversion when a currency is selected or clicked
			$('#currencyDropdown').on('change click', function() {
				var totalCost = $('#result').data('total-cost');
				var selectedCurrency = $(this).val();

				if (totalCost) {
					$.ajax({
						type: "POST",
						url: "../Server/ServiceHandler.php",
						data: {
							action: 'convert',
							totalCost: totalCost,
							currency: selectedCurrency
						},
						success: function(response) {
							var data = JSON.parse(response);
							if (data.convertedAmount) {
								$('#currencyConversion').html('Converted Amount: ' + data.convertedAmount + ' ' + selectedCurrency);
							} else {
								$('#currencyConversion').text('Error: ' + (data.error || 'Unable to convert currency.'));
							}
						},
						error: function(xhr, status, error) {
							$('#currencyConversion').text('Error: ' + error);
						}
					});
				} else {
					$('#currencyConversion').text('Please calculate the total cost in MUR first.');
				}
			});
		});
	</script>

	<style><style>
  #costCalculatorSection {
    background-color: #f2f8f2;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 20px auto;
    font-family: 'Arial', sans-serif;
  }

  #costCalculator h3 {
    font-size: 20px;
    color: #2d572c;
    margin-bottom: 12px;
    text-align: center;
  }

  #costCalculator p {
    margin-bottom: 10px;
    font-size: 14px;
    color: #444;
  }

  #packageDropdown, #extraPhotos, #addonsDropdown, #currencyDropdown {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #9dc79d;
    border-radius: 4px;
    background-color: #fff;
    margin-top: 8px;
  }

  #packageDropdown:focus, #extraPhotos:focus, #addonsDropdown:focus, #currencyDropdown:focus {
    border-color: #2d572c;
    box-shadow: 0 0 3px rgba(45, 87, 44, 0.5);
    outline: none;
  }

  #estimateBtn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin: 15px auto;
    transition: background-color 0.2s ease;
  }

  #estimateBtn:hover {
    background-color: #45a049;
  }

  #result, #currencyConversion {
    font-size: 16px;
    color: white;
    text-align: center;
    margin-top: 15px;
  }

  #currencySection {
    margin-top: 15px;
    text-align: center;
  }
</style>


	</style>

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

		<div id="xmlContent">
			<!-- AJAX will display it here -->
		</div>

		<section id="costCalculatorSection">
			<form id="costCalculator">
				<h3>Want to plan your budget? Try out our cost calculator for an estimate!</h3>
				
				<p>Select your package:
					<select id="packageDropdown">
						<option value="" selected>Select Package</option>
						<option value="4000">Essential Package (MUR 4,000)</option>
						<option value="7500">Classic Package (MUR 7,500)</option>
						<option value="12000">Deluxe Package (MUR 12,000)</option>
					</select>
				</p>

				<p id="extraPhotosSection">
					Extra Photos:
					<input type="number" id="extraPhotos" value="0" min="0"> (Rs 100 per extra photo)
				</p>

				<p id="addonsChoice" style="display:none;">
					Would you like to add additional services?
					<input type="radio" name="addonsChoice" value="Yes"> Yes
					<input type="radio" name="addonsChoice" value="No"> No
				</p>

				<p id="addonsSection" style="display:none;">
					Add-ons:
					<select id="addonsDropdown">
						<option value="0">None</option>
						<option value="500">Express Delivery (MUR 500)</option>
						<option value="1000">High-Res Editing (MUR 1,000)</option>
						<option value="1500">Custom Frames (MUR 1,500)</option>
						<option value="2000">Location Shoot (MUR 2,000)</option>
						<option value="3000">Photo Album (MUR 3,000)</option>
					</select>
				</p>

				<!-- Button for Estimate (Initially Hidden) -->
				<button type="button" id="estimateBtn" class="buttonSection" style="display:none;">Get Your Estimate</button>
			</form>

			<div id="result">Your estimated cost will appear here!</div>

			<!-- Currency conversion section (Initially Hidden) -->
			<p id="currencySection" style="display:none;">
				<select id="currencyDropdown">
				`	<option value="MUR" selected>Select Currency</option>
					<option value="USD">USD - United States Dollar</option>
					<option value="EUR">EUR - Euro</option>
					<option value="GBP">GBP - British Pound</option>
					<option value="AUD">AUD - Australian Dollar</option>
					<option value="CAD">CAD - Canadian Dollar</option>
					<option value="ZAR">ZAR - South African Rand</option>
					<option value="INR">INR - Indian Rupee</option>
					<option value="JPY">JPY - Japanese Yen</option>
					<option value="CNY">CNY - Chinese Yuan</option>
				</select>
			</p>

			<div id="currencyConversion">Choose a currency and convert your total cost!</div>
		</section>

		<?php include '../Webpages/Footer.php'; ?>

	</body>
</html>
