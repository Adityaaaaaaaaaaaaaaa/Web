<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="./CSS/home.css">
		<link rel="stylesheet" type="text/css" href="./assets/particles.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<style>
			.main {
				max-width: 80%;
				height: auto;
				opacity: 0;
				transition: opacity 1s cubic-bezier(0.95, 0.05, 0.795, 0.035); /* Transition for opacity */
				position: absolute;
				z-index: 1; /* set z-index: 0 it kind of fixed the hover issue for the nav bar - Nov 2023 */
				background: transparent;
				display : flex;
				align-items: center; 
				justify-content: center;
				padding: 10px; 
			}

			img[id="biglogo"]{
				height: auto;
				width: 400px;
				object-fit: cover;
			}

			.imagelogo, .intro {
				flex: 1; 
				padding: 0 20px; 
				text-align: center; 
				align-items:center;
			}

			.intro {
				max-width: 650px;
   				margin: 0 auto; 
			}
			
		</style>
		<script>
			window.onload = function() {
				var mainContent = document.querySelector(".main");
				mainContent.style.opacity = "1"; // Change opacity to 1 to trigger fade-in
			};
		</script>

	</head>
	<body>

		<div>
			<ul>
				<li><a href="home.php"><i class ="fa fa-fw-home">Home</a></li>
				<li class="dropdown"><a href = "javascript:void(0)" class="fa fa-fw-dropbtn">Gallery</a> 
				<div class = "dropdown-content">
					<a href="Webpages/NatureLandscape.php">Nature and Landscape</a>
					<a href="Webpages/Stilllife.php">Still life</a>
					<a href="Webpages/Portrait.php">Portraits</a>
					<a href="Webpages/WallArt.php">Wall Art</a>
				</div></li>
				<li class="dropdown"><a href = "javascript:void(0)" class="fa fa-fw-dropbtn">Contact</a> 
				<div class = "dropdown-content">
					<a href="Webpages/Inquiryform.php">Inquiry form</a>
					<?php
						session_start();
						if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
						echo '<a href="Webpages/Reservationform.php">Reservation form</a>';
						} else {
						echo '<a href="Webpages/Login.php">Reservation form</a>';
						}
					?>
					<a href="Webpages/Feedbackform.php">Feedback</a> 
				</div></li>    
				<li><a href="Webpages/Aboutus.php"><i class ="fa fa-fw-user">About us</a></li>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
					// If logged in, show "Profile" link
					echo '<li><a href="Webpages/profile.php"><i class="fa fa-fw fa-user"></i>Profile</a></li>';
					}
				?>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
						// If logged in, show "logout" link
					echo '<li><a href="Webpages/Logout.php"><i class="fa fa-fw fa-user"></i>Log out</a></li>';
					} else {
					// If not logged in, show "Login" link
					echo '<li><a href="Webpages/Login.php"><i class="fa fa-fw fa-sign-out"></i>login</a></li>';
					}
				?>
			</ul>
		</div>

		<!-- animation div -->
		<div id="particles-js">

			<div class="main fade-in">
				<div class="imagelogo">
					<img src ="Images/Website logo/TakeTwo.png" id="biglogo" >
				</div>
				<div class="intro">
					<p style =" font-size:20px; color: lightgrey;" class="main-paragraph">Welcome to the official website of TAKE TWO, where we offer an extensive range of products in both digital and physical forms. Our focus is dedicated to providing our customers with exceptional quality and value.
					<br><br>In addition to our gallery and photo services, we offer a variety of frames for your convenience. Whether you choose to hang your pictures on your wall or display them on shelves. We bring forward these services with the hope, you like it!<br><br>
					Thank you for considering TAKE TWO for your product needs. We are committed to providing you with a seamless and satisfying experience, from start to finish.
					</p>
				</div>
			</div><br><br><br><br><br>

		</div>
		<!-- end of the animation div -->

		<footer>
			<div class="footer-container">
				<div class="logo">
					<a href="home.php"><img src="Images/Website logo/TakeTwo.png" id="smalllogo" alt="TAKE TWO logo" /></a>
				</div>
				<div class="quicklinks">
					<ul>
						<li><a href="Webpages/Inquiryform.php">Contact</a></li>
						<li><a href="Webpages/Feedbackform.php">Feedback</a></li>
						<li><a href="Webpages/Aboutus.php">About Us</a></li>
						<?php
						if(isset($_SESSION['adminUname'])){
							// If logged in, show "logout" link
							echo '<li><a href="Webpages/Admin.php"><i class="fa fa-fw fa-user"></i>Admin</a></li>';
							echo '<li><a href="Webpages/Logout.php"><i class="fa fa-fw fa-user"></i>Admin Log out</a></li>';
							} else {
							// If not logged in, show "Login" link
							echo '<li><a href="Webpages/AdminLogin.php"><i class="fa fa-fw fa-sign-out"></i>Admin</a></li>';
							}
						?>
					</ul>
				</div>
				<div class="about">
					<p>Personalized service  -||-  Attention to detail  -||-  Moments  -||-  Customer satisfaction  -||-  Customized solutions  -||-  Memories <hr>&diams; Copyright &copy; 2023 , All photos used were properly sourced and used under proper licensing &diams;</p>
				</div>
			</div>
		</footer>
		<script>
			//jqury 
			$(document).ready(function() {
				function typeWriterLoop(element, text, speed) {
					var i = 0;
					var $element = $(element);
					$element.empty();

					function type() {
						if (i < text.length) {
							if (text.charAt(i) === '\n') {
								$element.append('<br>');
							} else {
								$element.append(text.charAt(i));
							}
							i++;
							setTimeout(type, speed);
						} else {
							setTimeout(function() {
								$element.empty();
								i = 0;
								typeWriterLoop(element, text, speed);
							}, 10000);
						}
					}

					type();
				}

				var mainTitleText = "Welcome to the official website of TAKE TWO, where we offer an extensive range of products in both digital and physical forms. Our focus is dedicated to providing our customers with exceptional quality and value.\n\nIn addition to our gallery and photo services, we offer a variety of frames for your convenience. Whether you choose to hang your pictures on your wall or display them on shelves. We bring forward these services with the hope, you like it!.\n\nThank you for considering TAKE TWO for your product needs. We are committed to providing you with a seamless and satisfying experience, from start to finish.";
				var mainTitleSpeed = 10;

				typeWriterLoop('.main-paragraph', mainTitleText, mainTitleSpeed);
			});
		</script>




		<!-- CDN Link for particles effect -->
		<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
		<script>
			/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
			particlesJS.load('particles-js', 'assets/particles.json', function() {
				console.log('callback - particles.js config loaded');
			});
		</script>
	</body>
</html>	