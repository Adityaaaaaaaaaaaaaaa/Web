<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Portrait</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Gallery style CSS.css">
		<script src="../Js/jquery-3.7.0.js"></script>

		<style>
			/*specific CSS for gallery portrait page*/
			.bigbox {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
			}

			#imgbox {
				box-sizing: content-box;
				width: 10%;
				height: auto;
				margin: 10px;
			}

			/* CSS to negate footer logo style interference*/
			img:not(#smalllogo) {
				max-width: 100%;
				max-height: 100%;
				aspect-ratio: 9/16;
			}

			.text {
				font-size: 15px;
				padding: 5px 10px;
				line-height: 25px;
				margin-top: 150px;
				border: 1px solid var(--button-border); 
				background-color: var(--textBg-color);
				box-shadow: var(--text-boxShadow);
				border-radius: 5px;
			}
		</style>

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>
		
		<dic class="headings">
			<h1 class="main-title">Portrait Photography</h1>
		</div>

		<?php
			/* Load the XML content -----------------------------------------------------------*
			// DOM Tree based parser 
			$xml = new DOMDocument();
			$xml->load("../XML/Portrait.xml");

			// Load the XSLT stylesheet
			$xsl = new DOMDocument();
			$xsl->load("../XSLT/Gallery_Portrait.xslt");

			// Create an XSLT processor and import the XSLT stylesheet
			$proc = new XSLTProcessor();
			$proc->importStylesheet($xsl);

			// Transform the XML with the XSLT stylesheet
			$html = $proc->transformToXML($xml);

			// Output the HTML
			echo $html;*/
			/* ---------------------------------------------------------------------------- */

			// Create an XMLReader instance
			$reader = new XMLReader();
			// Open the XML file
			$reader->open("../XML/Portrait.xml");

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
					echo "<a href='{$image['login']}'>login</a>";
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

				var mainTitleText = "Portrait Category";
				var mainTitleSpeed = 100;
				typeWriterLoop('.main-title', mainTitleText, mainTitleSpeed);
			});
		</script>
	</body>
</html>

