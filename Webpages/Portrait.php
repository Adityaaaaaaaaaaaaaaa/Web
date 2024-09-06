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

		<!-- Portrait Gallery -->
<!-- 		<div class="bigbox">

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/5b3c3b9a-5d2b-4acd-99bd-ee57334bd6c2.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php /*
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/5b3c3b9a-5d2b-4acd-99bd-ee57334bd6c2.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/7d47ed96-3438-422b-af65-a86deb8254d0.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/7d47ed96-3438-422b-af65-a86deb8254d0.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/30 Male Poses Take Elegant Male Portraits.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/30 Male Poses Take Elegant Male Portraits.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/44170c75-ef98-4b3a-a5d7-83d4fd866ff0.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/44170c75-ef98-4b3a-a5d7-83d4fd866ff0.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/abbat-693vTvWzeCk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/abbat-693vTvWzeCk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/abstral-official-cyOKLSgkgCE-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/abstral-official-cyOKLSgkgCE-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/aiony-haust-hRzGI5kLc5c-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/aiony-haust-hRzGI5kLc5c-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/alejandro-cartagena-eqzcs-hNvN0-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/alejandro-cartagena-eqzcs-hNvN0-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/anthony-tran-3Xkms-gMvZg-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/anthony-tran-3Xkms-gMvZg-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/ayo-ogunseinde-sibVwORYqs0-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/ayo-ogunseinde-sibVwORYqs0-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Bald Hair Care For Men.png" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Bald Hair Care For Men.png" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/blake-carpenter-ujEVPnfBDTY-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/blake-carpenter-ujEVPnfBDTY-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/bran-sodre-JBHfVpoK_oI-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/bran-sodre-JBHfVpoK_oI-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/brian-lawson-abiq3vnHjnk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/brian-lawson-abiq3vnHjnk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/brian-lawson-MRRgFUt3V0Q-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/brian-lawson-MRRgFUt3V0Q-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/brian-lawson-MYeFPr_Xtmc-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/brian-lawson-MYeFPr_Xtmc-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/brooke-cagle-oTweoxMKdkA-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/brooke-cagle-oTweoxMKdkA-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/celine-druguet-V2WjELpgOEQ-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/celine-druguet-V2WjELpgOEQ-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/chan-tw7btb8vfrk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/chan-tw7btb8vfrk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/chris-hardy-Y1DI5GivrKs-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/chris-hardy-Y1DI5GivrKs-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/christian-ferrer-y-tdaKCTOiI-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/christian-ferrer-y-tdaKCTOiI-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/daniel-monteiro-HwNCyLWw7hw-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/daniel-monteiro-HwNCyLWw7hw-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/fa9fbcc8-9191-4c41-aa71-b5fe37f7cda1.png" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/fa9fbcc8-9191-4c41-aa71-b5fe37f7cda1.png" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/falaq-lazuardi-zaVfDlV9CkU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/falaq-lazuardi-zaVfDlV9CkU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/finn-hackshaw-p9btBc7HdTE-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/finn-hackshaw-p9btBc7HdTE-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/hajigrapher-clsMpMDhzZU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/hajigrapher-clsMpMDhzZU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/hannah-olinger-eNZayb-kkvE-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/hannah-olinger-eNZayb-kkvE-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/huston-wilson-nJHvhXS4C0U-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/huston-wilson-nJHvhXS4C0U-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/isaac-castillejos-VOQkzFIkF0Y-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/isaac-castillejos-VOQkzFIkF0Y-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/jan-kopriva-S8IV-1rl7Uw-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/jan-kopriva-S8IV-1rl7Uw-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/jassir-jonis-dS6a-NAqbII-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/jassir-jonis-dS6a-NAqbII-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/jennie icons.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/jennie icons.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/joanna-nix-walkup-uszZcIXeOZc-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/joanna-nix-walkup-uszZcIXeOZc-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/joe-gardner-6p8ngTH1bUI-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/joe-gardner-6p8ngTH1bUI-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Jolanda in Kiel.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Jolanda in Kiel.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Josh Connor Actors Headshots.png" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Josh Connor Actors Headshots.png" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/joshua-rondeau-kaQfPZKYHYs-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/joshua-rondeau-kaQfPZKYHYs-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/karina-tess-l35dDPD3Gys-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/karina-tess-l35dDPD3Gys-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Kim Jisoo - Instagram Update.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Kim Jisoo - Instagram Update.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/kyle-smith-tlowJ-oYAjU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/kyle-smith-tlowJ-oYAjU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/le-minh-phuong-niH7Z81S44g-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/le-minh-phuong-niH7Z81S44g-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/ludovic-migneault-EZ4TYgXPNWk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/ludovic-migneault-EZ4TYgXPNWk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Maggie West Opens Up About Her Powerful Portrait Series For Planned Parenthood.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Maggie West Opens Up About Her Powerful Portrait Series For Planned Parenthood.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/majestic-lukas-mkZpjiAk4no-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/majestic-lukas-mkZpjiAk4no-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/matt-moloney-dGAePDM8IKU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/matt-moloney-dGAePDM8IKU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/max-andrey-6_9TzlWhpdM-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/max-andrey-6_9TzlWhpdM-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/michael-dam-mEZ3PoFGs_k-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/michael-dam-mEZ3PoFGs_k-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/nathan-dumlao-5tWJ49fhtBw-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/nathan-dumlao-5tWJ49fhtBw-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/ODD on Twitter.png" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/ODD on Twitter.png" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pavel-anoshin-d0peGya6R5Y-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pavel-anoshin-d0peGya6R5Y-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Peaky_Blinders.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Peaky_Blinders.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/20230221_213336.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/20230221_213336.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-cottonbro-studio-10176433.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-cottonbro-studio-10176433.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-jeferson-gomes-6895533.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-jeferson-gomes-6895533.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-jonathan-borba-2899707.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-jonathan-borba-2899707.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-maksim-goncharenok-4663107.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-maksim-goncharenok-4663107.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-marian-sicko-4243188.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-marian-sicko-4243188.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-rfstudio-3819573.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-rfstudio-3819573.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pexels-rikki-matsumoto-5804257.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pexels-rikki-matsumoto-5804257.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/pius-martin-TQSFD1cFgMk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/pius-martin-TQSFD1cFgMk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/Portrait _ Lifestyle-Shooting in Rapperswil - foundbyheart by Nora Brumm.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/Portrait _ Lifestyle-Shooting in Rapperswil - foundbyheart by Nora Brumm.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/samanta-barba-alcala-QwNUkiDxjbo-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/samanta-barba-alcala-QwNUkiDxjbo-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/shirish-suwal-YDDJlslq2Iw-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/shirish-suwal-YDDJlslq2Iw-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/StudioXJustin Bettman.jpeg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/StudioXJustin Bettman.jpeg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/tyler-nix-PQeoQdkU9jQ-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/tyler-nix-PQeoQdkU9jQ-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/velizar-ivanov-9bFLTsaP_xo-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/velizar-ivanov-9bFLTsaP_xo-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/vince-fleming-j3lf-Jn6deo-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/vince-fleming-j3lf-Jn6deo-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/vinicius-wiesehofer-UOavP_Z38lE-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/vinicius-wiesehofer-UOavP_Z38lE-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/wallpaperflare.com_wallpaper (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/wallpaperflare.com_wallpaper (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/wallpaperflare.com_wallpaper (16).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Portrait/wallpaperflare.com_wallpaper (16).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Portrait/wallpaperflare.com_wallpaper.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}*/
				?><br><a href="../Images/Portrait/wallpaperflare.com_wallpaper.jpg" target="_self">View</a></div>
				</div>
			</div>

		</div> -->

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

		<!-- mouse trail -->
		<script src="../Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="../Js/dark-mode.js"></script>

	</body>
</html>

