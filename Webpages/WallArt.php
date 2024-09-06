<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Wall Art</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Gallery style CSS.css"> 
		<script src="../Js/jquery-3.7.0.js"></script>
	</head>
	<body>
		<?php include "../Webpages/Header.php"; ?>

		<dic class="headings">
			<h1 class="main-title">Wall Art</h1>
		</div>

		<!-- <div class="bigbox">

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/20230219_212754.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php /*
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/20230219_212754.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/birmingham-museums-trust-9pOXS0ZGPDM-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/birmingham-museums-trust-9pOXS0ZGPDM-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023 (2).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023 (2).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023 (3).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023 (3).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-02.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-02.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-03.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-03.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-05.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-05.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-06.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-06.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-09.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}*/
				?><br><a href="../Images/Wall arts/copyR@AD_AdobeLr_19_02_2023-09.jpg" target="_self">View</a></div>
				</div>
			</div>
		</div> -->

		<?php 
			// Create an XMLReader instance
			$reader = new XMLReader();
			// Open the XML file
			$reader->open("../XML/WallArt.xml");

			// Initialize variables to store image data
			$images = array();

			while ($reader->read()) {
				if ($reader->nodeType === XMLReader::ELEMENT && $reader->name === "imgbox") {
					$src = '';
					$buyHref = '';
					$login = '';
			
					while ($reader->read() && ($reader->nodeType !== XMLReader::END_ELEMENT || $reader->name !== "imgbox")) {
						if ($reader->nodeType === XMLReader::ELEMENT) {
							switch ($reader->name) {
								case "img":
									$src = $reader->getAttribute("src");
									break;
								case "a":
									if ($reader->getAttribute("id") === "Buy") {
										$buyHref = $reader->getAttribute("href");
									} elseif ($reader->getAttribute("id") === "login") {
										$login = $reader->getAttribute("href");
									}
									break;
							}
						}
					}
			
					if (!empty($src)) {
						$images[] = array(
							"src" => $src,
							"buyHref" => $buyHref,
							"login" => $login
						);
					}
				}
			}
			
			// Close the XMLReader
			$reader->close();

			echo '<div class="bigbox">';
			foreach ($images as $image) {
				echo "<div id='imgbox'>";
				echo "<img class='img' src='{$image['src']}'>";
				echo "<div class='middle'>";
				echo "<div class='text'>";
				if (isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])) {
					echo "<a href='{$image['buyHref']}'>Buy !</a>";
				} else {
					echo "<a href='{$image['login']}'>login to buy!</a>";
				}
				echo "<br><a href='{$image['src']}' target='_self'>View</a></div>";
				echo "</div>";
				echo "</div>";
			}
			echo '</div>';
		?>

		<button onclick="topFunction()" id="myBtn" title="Click here to go to the top of this page">Back to top</button>

		<script>
			//Get the button
			var mybutton = document.getElementById("myBtn");

			// When the user scrolls down 450px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
				    mybutton.style.display = "block";
				} else {
				    mybutton.style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>					

		<?php include '../Webpages/Footer.php'; ?>

		<!-- heading jquery --> 
		<script>
			$(document).ready(function() {
				function typeWriterLoop(element, text, speed) {
					var i = 0;
					var $element = $(element);
					$element.empty();

					function type() {
						if (i < text.length) {
							$element.append(text.charAt(i));
							i++;
							setTimeout(type, speed);
						} else {
							setTimeout(function() {
								$element.empty();
								i = 0;
								type();
							}, 2000); 
						}
					}

					type();
				}

				var mainTitleText = "Wall Art Category";
				var mainTitleSpeed = 100;
				typeWriterLoop('.main-title', mainTitleText, mainTitleSpeed);
			});
		</script>

		<!-- mouse trail -->
		<script src="../Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="../Js/dark-mode.js"></script>

	</body>
</html>
