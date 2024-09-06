<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="./CSS/home.css">
		<link href="https://fonts.googleapis.com/css2?family=Neon+Tubes&display=swap" rel="stylesheet"><!-- neon font-->
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

		<div id="nav">
			<ul class="nav">
				<li><a href="home.php">Home</a></li>
				<li class="dropdown"><a href = "#">Gallery</a> 
				<div class = "dropdown-content">
					<a href="Webpages/NatureLandscape.php">Nature and Landscape</a>
					<a href="Webpages/Stilllife.php">Still life</a>
					<a href="Webpages/Portrait.php">Portraits</a>
					<a href="Webpages/WallArt.php">Wall Art</a>
				</div></li>
				<li class="dropdown"><a href = "#">Contact</a> 
				<div class = "dropdown-content">
					<a href="Webpages/Buy.php">Buy</a>
					<?php 
						if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
							echo '<a href="Webpages/Inquiryform.php">Inquiry form</a>';
						} else {
							echo '<a href="Webpages/Login.php">Inquiry form</a>';
						}
					?>
					<?php
						if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
							echo '<a href="Webpages/Reservationform.php">Reservation form</a>';
						} else {
							echo '<a href="Webpages/Login.php">Reservation form</a>';
						}
					?>
					<a href="Webpages/Feedbackform.php">Feedback</a> 
				</div></li>    
				<li><a href="Webpages/Aboutus.php">About us</a></li>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
					// If logged in, show "Profile" link
					echo '<li><a href="Webpages/profile.php">Profile</a></li>';
					}
				?>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
						// If logged in, show "logout" link
					echo '<li><a href="Webpages/Logout.php">Log out</a></li>';
					} else {
					// If not logged in, show "Login" link
					echo '<li><a href="Webpages/Login.php">login</a></li>';
					}
				?>
				<li><a href="#"><button class="darkModeToggle" role="button">Theme</button></a></li>
			</ul>
		</div> 


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

		<footer>
			<div class="footer-container">
				<div class="logo">
					<a href="home.php"><img src="Images/Website logo/TakeTwo.png" id="smalllogo" alt="TAKE TWO logo" /></a>
				</div>
				<div class="quicklinks" id="nav">
					<ul class="nav">
						<li><?php
								if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
								echo '<a href="Webpages/Inquiryform.php">Contact</a>';
								} else {
								echo '<a href="Webpages/Login.php">Contact</a>';
								}
							?>
						</li>
						<li><a href="Webpages/Feedbackform.php">Feedback</a></li>
						<li><a href="Webpages/Aboutus.php">About Us</a></li>
						<?php
						if(isset($_SESSION['adminUname'])){
							// If logged in, show "logout" link
							echo '<li><a href="Webpages/Admin.php">Admin</a></li>';
							echo '<li><a href="Webpages/Logout.php">Admin Log out</a></li>';
							} else {
							// If not logged in, show "Login" link
							echo '<li><a href="Webpages/AdminLogin.php">Admin</a></li>';
							}
						?>
					</ul>
				</div>
				<div class="about">
					<p>Personalized service  -||-  Attention to detail  -||-  Moments  -||-  Customer satisfaction  -||-  Customized solutions  -||-  Memories &#9996;<hr><span id="icon">&#10022;</span> <span id="footerTake2">TakeTwo</span> &copy; <span id="year"></span> - All photos used were properly sourced and used under proper licensing <span id="icon">&#10022;</span></p>
				</div>
			</div>
		</footer>

		<script src="./Js/year.js"></script>

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

		<!-- mouse trail -->
		<script src="./Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="./Js/dark-mode.js"></script>
	</body>
</html>	