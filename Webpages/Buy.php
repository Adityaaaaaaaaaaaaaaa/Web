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
    
    // When a package is selected, show the extra photos section
    $('#packageDropdown').on('change', function() {
        if ($(this).val() !== '') {
            $('#extraPhotosSection').slideDown();
        }
    });

    // After selecting extra photos, ask if the user wants add-ons
    $('#extraPhotos').on('input', function() {
        if ($(this).val() >= 0) {
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

   // Calculate the total estimate in Mauritian Rupees using the Calculator API
	$('#estimateBtn').on('click', function() {
    var packageCost = parseFloat($('#packageDropdown').val());
    var extraPhotos = parseInt($('#extraPhotos').val()) || 0;
    var addonCost = parseFloat($('#addonsDropdown').val()) || 0;

    console.log("Package cost:", packageCost, "Extra Photos:", extraPhotos, "Addon cost:", addonCost);

    $.ajax({
        type: "POST",
        url: "../Server/SOAP_Calculator.php",
        data: {
            packageCost: packageCost,
            extraPhotos: extraPhotos * 100, // 100 MUR per extra photo
            addonCost: addonCost
        },
        success: function(response) {
            console.log("Response from calculator:", response);
            var data = JSON.parse(response);
            if (data.totalCost) {
                $('#result').text('Your estimated cost: MUR ' + data.totalCost).data('total-cost', data.totalCost);
                $('#currencySection').slideDown(); // Show currency conversion dropdown
            } else {
                $('#result').text('Error: ' + data.error);
            }
        },
        error: function(xhr, status, error) {
            $('#result').text('Error: ' + error);
        }
    });
});


    // Trigger conversion when a currency is selected
    $('#currencyDropdown').on('change', function() {
        var totalCost = $('#result').data('total-cost');
        var selectedCurrency = $(this).val();
        if (totalCost) {
            convertCurrency(totalCost, selectedCurrency); // Trigger currency conversion
        } else {
            $('#currencyConversion').text('Please calculate the total cost in MUR first.');
        }
    });
});

// Function to convert the total into the selected currency
function convertCurrency(totalCost, currency) {
    $.ajax({
        type: "POST",
        url: "../Server/SOAP_Convertor.php",
        data: {
            amount: totalCost,
            currency: currency
        },
        success: function(response) {
            console.log("Currency conversion response:", response);
            var data = JSON.parse(response);

            if (data.convertedAmount) {
                // Display only the converted amount in the new currency
                $('#currencyConversion').html(
                    'Converted Amount: ' + data.convertedAmount.toFixed(2) + ' ' + currency
                );
            } else {
                $('#currencyConversion').text('Error: ' + (data.error || 'Unable to convert currency.'));
            }
        },
        error: function(xhr, status, error) {
            $('#currencyConversion').text('Error: ' + error);
        }
    });
}




    </script>


	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

		<div id="xmlContent">
			<!-- AJAX will display it here -->
		</div>

		<form id="costCalculator">
        <h3>Estimate Your Photography Service!</h3>
        
        <!-- Package Selection -->
        <p>Select your package:
            <select id="packageDropdown">
                <option value="" selected>Select Package</option>
                <option value="4000">Essential Package (MUR 4,000)</option>
                <option value="7500">Classic Package (MUR 7,500)</option>
                <option value="12000">Deluxe Package (MUR 12,000)</option>
            </select>
        </p>

        <!-- Extra Photos Section (Initially Hidden) -->
        <p id="extraPhotosSection">
            Extra Photos:
            <input type="number" id="extraPhotos" value="0" min="0"> (MUR 100 per extra photo)
        </p>

        <!-- Ask if the user wants add-ons -->
        <p id="addonsChoice" style="display:none;">
            Would you like to add additional services?
            <input type="radio" name="addonsChoice" value="Yes"> Yes
            <input type="radio" name="addonsChoice" value="No"> No
        </p>

        <!-- Add-ons Section (Initially Hidden) -->
        <p id="addonsSection" style="display:none;">
            Add-ons:
            <select id="addonsDropdown">
                <option value="0">None</option>
                <option value="1000">High-Res Editing (MUR 1,000)</option>
                <option value="2000">Location Shoot (MUR 2,000)</option>
            </select>
        </p>

        <!-- Button for Estimate (Initially Hidden) -->
        <button type="button" id="estimateBtn" class="buttonSection" style="display:none;">Get Your Estimate</button>
    </form>

    <!-- Display estimated cost -->
    <div id="result">Your estimated cost will appear here!</div>

    <!-- Currency conversion section (Initially Hidden) -->
    <p id="currencySection" style="display:none;">
        <select id="currencyDropdown">
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="AUD">AUD</option>
            <option value="CAD">CAD</option>
        </select>
    </p>

    <div id="currencyConversion">Converted cost will appear here!</div>
		
		<?php include '../Webpages/Footer.php'; ?>

	</body>
</html>
