<?php session_start(); ?>
<!-- nav bar issue with php on forms, put session start up here -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>About Us</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<style>
			:root {
				/* dark colour mode*/
				--paragraph-color: lightgrey;
				--h1-title: grey;
				--icon-color: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #FD1D1D, #F56040, #FFC13B, #4CAF50);
				--icon-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
				--link-color: orange;
				--border-test: yellow; /* border test */
				--h1-glow-Effect: 0 0 10px rgba(233, 54, 158, 0.8), 0 0 20px rgba(57, 16, 29, 0.8);
				--h1-gradient-color: linear-gradient(45deg, rgb(226, 159, 159), rgb(55, 55, 196), rgb(255, 0, 238));
				--userImg-boxShadow: 0 0 4em 0.1em #ff0010;
			}

			:root.light-mode {
				/* light colour mode*/
				--paragraph-color: #303030;
				--h1-title: #303030;
				--icon-color: linear-gradient(45deg, #6A92C2, #7E76B1, #9F6AA7, #C06B97, #E86A77, #E4775E, #E89E57, #86B556);
				--icon-shadow: 0 0 1px rgba(0, 0, 0, 0.25);
				--link-color: White;
				--border-test: black; /*border test */
				--h1-glow-Effect: 0 0 10px rgba(121, 124, 68, 0.8), 0 0 20px rgba(173, 21, 70, 0.8);
				--h1-gradient-color: linear-gradient(45deg, rgb(104, 43, 128), rgb(140, 184, 69), rgb(179, 137, 47));
				--userImg-boxShadow: 0 0 4em 0.1em #0040ff;
			}

			a {
				color: var(--link-color);
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*/
			}

			.fa-instagram {
				text-decoration: none;
				/*border: dashed 1px var(--border-test);*/ /* remove ---------------------------------*/
				color: transparent;
				background-image: var(--icon-color);
				-webkit-background-clip: text;
				background-clip: text;
				/*text-fill-color: transparent;*/
				text-shadow: var(--icon-shadow);
				padding: 5px;
				display: inline-block;
				font-size: 1.10em;
			}

			img#aqsaa, img#adi {
				width: 300px;
				height: 400px;
				border-radius: 10%;
				margin-left: 50%;
				box-shadow: var(--userImg-boxShadow);
			}

			/*p {
				line-height: 22px;
				color: var(--paragraph-color); 
				font-size: 18px; 
				font-family: Cambria;
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------*
			}

			/*.profile-container {
				display: flex;
				justify-content: center;
			}

			.author {
				display: flex;
				flex-direction: row;/*column;
				align-items: center;
				max-width: 85%;
				margin: 0 auto; /* Center the author section 
				padding: 20px;
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------
			}*

			.authorimg {
				flex-shrink: 0; /* Prevent the image from shrinking *
				width: 300px;
				height: 400px;
				margin-right: 20px; /* Adjust margin for spacing between image and text *
			}*

			.img:not(#smalllogo) {
				max-width: 100%; /* Make the image responsive *
				height: auto;
				border-radius: 20%;
				border: dashed 1px var(--border-test); /* remove ---------------------------------*
			}

			/*.authorintro {
				flex-grow: 1; /* Allow the text to grow and take remaining space 
				padding: 0 20px;
				text-align: justify;
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------
			}

			H1 {
				/*border: dashed 1px var(--border-test); /* remove ---------------------------------
				color: transparent;
				background-image: var(--h1-gradient-color);
				-webkit-background-clip: text;
				background-clip: text;
				text-align: center;
				display: block;
				font-size: 5em;
				margin-bottom: 20px;
				margin-top: 5px;
				text-shadow: var(--h1-glow-Effect);
			} */
		</style>

	</head>
	<body>
		
		<?php include "../Webpages/Header.php"; ?>

		<!--<h1>Meet us !</h1>

		<div class="profile-container">
			<div class="profile">
				<div class="author">
					<div class="authorimg">image path, add new image 
						<img src ="../Images/About Us/AdeetyaAboutus.jpg" id="adi">
					</div><br><br>

					<div class="authorintro"> to change 
						<p>Hello, my name is Doollah Adeetya, and I am a 21-year-old photographer with a passion for capturing life's most beautiful 
						moments. Together with my partner and friend, Aqsaa, we offer professional photography services that are sure to amaze 
						your eyes.<br><br>

						We understand that every moment is unique, and we strive to capture those special memories with skill and artistry. We'll make 
						sure to keep a keen eye for detail ensuring that we deliver outstanding results that exceed your expectations.<br><br>

						If you would like to view some of my personal works, I invite you to visit my Unsplash portfolio at 
						<a href="https://unsplash.com/@aditya_doula_" style="color:white;" id="unsplashadi" >unsplash.com/@aditya_doula_</a><br><br>

						Also check-out more of my personal works on my Instagram &rarr; 
						<a href="https://www.instagram.com/aditya_doula_" target="_blanks" class="fa fa-instagram" id="instaadi"></a></p>
					</div>
				</div><br>

				<div class="author">
					<div class="authorimg" > image path, add new image 
						<img src ="../Images/About Us/userX.jpg" id="aqsaa">
					</div><br><br>

					<div class="authorintro"> to change 
						<p>Hello, my name is Soobedar Aqsaa, and I am a 22-year-old professional photographer. With over five years of experience, I 
						have honed my skills to capture the beauty of the world around us.<br><br>

						I have experienced firsthand the profound impact of photography.
						What began as a passing interest quickly evolved into a deep passion. 
						As I immersed myself in capturing special moments, I realized the incredible power of a photograph to evoke emotions and change perspectives.<BR><BR>
						Join us on our journey as we continue to explore the captivating world of visual storytelling. &rarr; 
						<a href="https:#" target="_blanks" class="fa fa-instagram" id="instaaqsaa"></a></p>
					</div>
				</div>
			</div>
		</div><br> -->

		<?php
			// Load the XML content
			$xml = new DOMDocument();
			$xml->load("../XML/aboutus.xml");

			// Load the XSLT stylesheet
			$xsl = new DOMDocument();
			$xsl->load("../XSLT/aboutus.xslt");

			// Create an XSLT processor and import the XSLT stylesheet
			$proc = new XSLTProcessor();
			$proc->importStylesheet($xsl);

			// Transform the XML with the XSLT stylesheet
			$html = $proc->transformToXML($xml);

			// Output the HTML
			echo $html;
		?>

		<?php include '../Webpages/Footer.php'; ?>

		<!-- mouse trail -->
		<script src="../Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="../Js/dark-mode.js"></script>

	</body>
</html>	
