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
			window.onload = function() {
				var mainContent = document.querySelector(".main");
				mainContent.style.opacity = "1";
			};
		</script>
		<script>
			$(document).ready(function() {
				$.ajax({
					type: "GET",
					url: "../XML/Buy.xml",
					dataType: "xml",
					success: function(xml) {
						$(xml).find('content').each(function() {
							var contentDiv = $('<div>').addClass('content main');
							
							// big heading la
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

							// Button 1 pou buy
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

							// Button 2 pou reserve
							var button2 = $('<button>').addClass($(this).find('RbuyBtn').attr('class'));
							var buttonText2 = $('<span>').text($(this).find('RbuyBtn label').text());
							var link2 = $('<a>').attr('href', $(this).find('RbuyBtn link').attr('href')).text($(this).find('RbuyBtn link').text());
							button2.append(buttonText2, '<br>', link2);
							contentDiv.append(button2);

							// add on page
							$('#xmlContent').append(contentDiv);
						});
					},
					error: function(xhr, status, error) {
						console.error(error);
					}
				});
			});
		</script> 

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

		<div id="xmlContent">
			<!-- ajax will display it here , the xml-->
		</div>

		<?php include '../Webpages/Footer.php'; ?>

		<script src="../Js/mouse.js"></script>
		<script src="../Js/dark-mode.js"></script>
	</body>
</html>	