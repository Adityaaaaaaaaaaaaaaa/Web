<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Nature & Landscape</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Gallery style CSS.css">
		<script src="../Js/jquery-3.7.0.js"></script>

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

		<div class="headings">
			<h1 class="main-title">Nature & Landscape Photography</h1>
		</div>

		<!-- <div class="bigbox">

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/silas-baisch-Wn4ulyzVoD4-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				/*if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/silas-baisch-Wn4ulyzVoD4-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/tim-marshall-jqj2SqvxMVY-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/tim-marshall-jqj2SqvxMVY-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/pexels-francesco-ungaro-2325446 (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/pexels-francesco-ungaro-2325446 (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/ryan-schroeder-Gg7uKdHFb_c-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/ryan-schroeder-Gg7uKdHFb_c-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/john-mark-arnold-XNIjmb6Ax04-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/john-mark-arnold-XNIjmb6Ax04-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/marita-kavelashvili-ugnrXk1129g-unsplash (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/marita-kavelashvili-ugnrXk1129g-unsplash (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/michael-DXQB5D1njMY-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/michael-DXQB5D1njMY-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/PSX_20210222_201738-01.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/PSX_20210222_201738-01.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/johann-juraver-2CEkiJSEAFA-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}*/
				?><br><a href="../Images/Nature & landscape/johann-juraver-2CEkiJSEAFA-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

		</div> -->

		<?php 
			// Create an XMLReader instance
			$reader = new XMLReader();
			// Open the XML file
			$reader->open("../XML/NatureLandscape.xml");

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

				var mainTitleText = "Nature & Landscape Category";
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

