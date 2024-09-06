<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="./CSS/home.css">
		<!--<link rel="stylesheet" type="text/css" href="./assets/particles.css"> currently not in use, leave commented-->
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

			/* css appplied throught xslt, bwlow is original css used, keep commented
			do not delete comment, class removed by me
			.main {
				max-width: 80%;
				height: auto;
				opacity: 0;
				transition: opacity 1s cubic-bezier(0.95, 0.05, 0.795, 0.035); /* Transition for opacity *
				position: absolute;
				z-index: 0; /* set z-index: 0 it kind of fixed the hover issue for the nav bar *
				background: transparent;
				display : flex;
				align-items: center; 
				justify-content: center;
				padding: 10px; 
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
				columns: 2;
				column-gap:20px;
			}*

			img[id="biglogo"]{
				height: auto;
				width: 400px;
				object-fit: cover;
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
			}

			.imagelogo, .intro {
				flex: 1; 
				padding: 0 20px; 
				text-align: center; 
				align-items:center;
			}

			.imagelogo:hover {
				filter: brightness(1) drop-shadow(0 0 5px rgba(255, 239, 15, 0.8));
			}

			.intro {
				max-width: auto;/*650px;*
				max-height: auto;/*450px;*
				padding: 5px;
				backdrop-filter: blur(1px);
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
				text-align: center; 
				align-items:center;
				flex: 1;
				font-family: 'Neon Tubes', cursive;
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
				columns: 1;
				column-gap:20px;
			}*

			.main-paragraph {
				font-size: 20px;
				color: var(--maintext-color);
				text-shadow: 0 0 20px var(--maintext-color); 
				line-height: 1.35; 
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
			}

			/* 3d logo * 3d logo css positioning, keep commented 
			#spline {
				max-width: 75%; /* 450px;*
				height: 100%; /* 450px;*
				border: dashed 1px var(--border-test); /* remove ---------------------------------*
				backdrop-filter: blur(1px);
				margin: auto;
			}*/
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

		<!-- animation div --
		<div id="particles-js">-->

		<!--	<div class="fade-in">removed class main 
				<div class="imagelogo">
					<img src ="Images/Website logo/TakeTwo.png" id="biglogo" >
				</div>
				<!- Do not remove - Spline 3D logo >>> keep commented --
				<div id="spline">
					<script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.523/build/spline-viewer.js"></script>
					<spline-viewer url="https://prod.spline.design/nrf8dZK5a3MFuMB7/scene.splinecode"></spline-viewer>
				</div>-->
				<!--<div class="intro">demo text 
					<p  class="main-paragraph">Welcome to the official website of TAKE TWO, where we offer an extensive range of products 
						in both digital and physical forms. Our focus is dedicated to providing our customers with exceptional 
						quality and value.<br><br>In addition to our gallery and photo services, we offer a variety of frames for your 
						convenience. Whether you choose to hang your pictures on your wall or display them on shelves. We bring forward 
						these services with the hope, you like it!.<br><br>Thank you for considering TAKE TWO for your product needs. We are 
						committed to providing you with a seamless and satisfying experience, from start to finish.
						<br><br> 
					</p>
				</div>
			</div><br><br><br><br><br>-->
		<!--</div>-->
		<!-- end of the animation div -->

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

		<!-- CDN Link for particles effect -- keep commented
		<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
		<script>
			/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
			particlesJS.load('particles-js', 'assets/particles.json', function() {
				console.log('callback - particles.js config loaded');
			});
		</script>-->

		<!-- dark mode js -->
		<script src="./Js/dark-mode.js"></script>
	</body>
</html>	