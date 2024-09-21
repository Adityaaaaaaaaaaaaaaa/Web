<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="./CSS/home.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<style>
			:root {
				/* dark colour mode*/
				--maintext-color: rgba(173, 216, 230, 1);
				--border-test: solid 1px yellow; 
			}

			:root.light-mode {
				/* light colour mode*/
				--maintext-color: black;
				--border-test: black;
			}

			.imagelogo:hover {
				transform: scale(1.1);
			}
		</style>
		<script>
			window.onload = function() {
				var mainContent = document.querySelector(".fade-in");
				mainContent.style.opacity = "1"; // Change opacity to 1 to trigger fade-in
			};
		</script>
	</head>
	<body>

	<?php include './Webpages/Header_Home.php'; ?>

		<!-- Php to call the xml  -->
		<?php
			// Load the XML content
			$xml = new DOMDocument();
			$xml->load("XML/home.xml");

			// Load the XSLT stylesheet
			$xsl = new DOMDocument();
			$xsl->load("XSLT/home.xslt");

			// Create an XSLT processor and import the XSLT stylesheet
			$proc = new XSLTProcessor();
			$proc->importStylesheet($xsl);

			// Transform the XML with the XSLT stylesheet
			$html = $proc->transformToXML($xml);

			// Output the HTML
			echo $html;
		?>

		<script>
			$(document).ready(function() {
				function fadeInHoldAndBlink() {
					$(".intro p")
					.animate({ opacity: 0 }, 0) // Set initial opacity to 0
					.delay(500) // Hold for 0.5 seconds
					.animate({ opacity: 1 }, 500) // Fade in over 1 second
					.delay(8000) // Hold for 8 seconds
					.animate({ opacity: 0 }, 200) // fade out over 0.2 seconds
					.animate({ opacity: 1 }, 100) // fade in over 0.1 seconds
					.animate({ opacity: 0 }, 200) // fade out over 0.2 seconds
					.animate({ opacity: 1 }, 100) // fade in over 0.1 seconds
					.animate({ opacity: 0 }, 200) // fade out over 0.2 seconds
					.animate({ opacity: 1 }, 100) // fade in over 0.1 seconds
					.animate({ opacity: 0 }, 100) // fade out over 0.1 seconds
					.delay(500) // Pause before restarting
					.animate({ opacity: 1 }, 500, function() {
						// Restart
						fadeInHoldAndBlink();
					});
				}

				fadeInHoldAndBlink(); // Start the process
			});
		</script>
		<?php include './Webpages/Footer_Home.php'; ?>
	</body>
</html>	