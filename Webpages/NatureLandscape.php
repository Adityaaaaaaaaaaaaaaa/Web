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

		<div>
			<ul>
				<li><a href="../home.php"><i class ="fa fa-fw-home">Home</a></li>
				<li class="dropdown"><a href = "javascript:void(0)" class="fa fa-fw-dropbtn">Gallery</a> 
				<div class = "dropdown-content">
					<a href="../Webpages/NatureLandscape.php">Nature and Landscape</a>
					<a href="../Webpages/Stilllife.php">Still life</a>
					<a href="../Webpages/Portrait.php">Portraits</a>
					<a href="../Webpages/WallArt.php">Wall Art</a>
				</div></li>
				<li class="dropdown"><a href = "javascript:void(0)" class="fa fa-fw-dropbtn">Contact</a> 
				<div class = "dropdown-content">
					<a href="../Webpages/Inquiryform.php">Inquiry form</a>
					<?php
						session_start();
						if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
						echo '<a href="../Webpages/Reservationform.php">Reservation form</a>';
						} else {
						echo '<a href="../Webpages/Login.php">Reservation form</a>';
						}
					?>
					<a href="../Webpages/Feedbackform.php">Feedback</a> 
				</div></li>    
				<li><a href="../Webpages/Aboutus.php"><i class ="fa fa-fw-user">About us</a></li>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
					// If logged in, show "Profile" link
					echo '<li><a href="../Webpages/profile.php"><i class="fa fa-fw fa-user"></i>Profile</a></li>';
					}
				?>
				<?php
					if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
					// If logged in, show "logout" link
					echo '<li><a href="../Webpages/Logout.php"><i class="fa fa-fw fa-user"></i>Log out</a></li>';
					} else {
					 // If not logged in, show "Login" link
					echo '<li><a href="../Webpages/Login.php"><i class="fa fa-fw fa-sign-out"></i>login</a></li>';
					}
				?>
			</ul>
		</div><br>
		
		<dic class="headings">
			<h1 class="main-title">Nature & Landscape Photography</h1>
		</div>

		<div class="bigbox">

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/silas-baisch-Wn4ulyzVoD4-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
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
				<img class="img" src="../Images/Nature & landscape/jeremy-cai-ucYWe5mzTMU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/jeremy-cai-ucYWe5mzTMU-unsplash.jpg" target="_self">View</a></div>
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
				}
				?><br><a href="../Images/Nature & landscape/johann-juraver-2CEkiJSEAFA-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/jeremy-bishop-QHZn3-0bbEM-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/jeremy-bishop-QHZn3-0bbEM-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/IMG_20191128_232409_193.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/IMG_20191128_232409_193.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/damian-patkowski-T-LfvX-7IVg-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/damian-patkowski-T-LfvX-7IVg-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/dan-dy-waBEDUNN7LY-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/dan-dy-waBEDUNN7LY-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/huper-by-joshua-earle-mErSbLOqSJk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/huper-by-joshua-earle-mErSbLOqSJk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-65.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-65.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-70.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-70.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-39.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-39.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-15.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-15.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/aditya-doula-l_92s7W0BIk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/aditya-doula-l_92s7W0BIk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20221222_105316.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20221222_105316.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20221016_154007.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20221016_154007.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20220726_112549.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20220726_112549.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20220627_110535.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20220627_110535.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20220321_182422.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20220321_182422.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20211116_172738.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20211116_172738.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/20210418_063643.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/20210418_063643.jpg" target="_self">View</a></div>
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
				<img class="img" src="../Images/Nature & landscape/IMAG4095_BURST002 (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/IMAG4095_BURST002 (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-28.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-28.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-14.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-14.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-12.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-12.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-35.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-35.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023 (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023 (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-40.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-40.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-76.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-76.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-80.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-80.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-56.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-56.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-60.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-60.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-21.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-21.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-04.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-04.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-22.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-22.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-42.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-42.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-72.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-72.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-01.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Nature & landscape/copyR@AD_AdobeLr_19_02_2023-01.jpg" target="_self">View</a></div>
				</div>
			</div>

		</div>

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

		<footer>
			<div class="footer-container">

				<div class="logo">
					<a href="../home.php"><img src="../Images/Website logo/TakeTwo.png" id="smalllogo" alt="TAKE TWO logo" /></a>
				</div>

				<div class="quicklinks">
					<ul>
						<li><a href="../Webpages/Inquiryform.php">Contact</a></li>
						<li><a href="../Webpages/Feedbackform.php">Feedback</a></li>
						<li><a href="../Webpages/Aboutus.php">About Us</a></li>
						<?php
						if(isset($_SESSION['adminUname'])){
							// If logged in, show "logout" link
							echo '<li><a href="../Webpages/Admin.php"><i class="fa fa-fw fa-user"></i>Admin</a></li>';
							echo '<li><a href="../Webpages/Logout.php"><i class="fa fa-fw fa-user"></i>Admin Log out</a></li>';
							} else {
							// If not logged in, show "Login" link
							echo '<li><a href="../Webpages/AdminLogin.php"><i class="fa fa-fw fa-sign-out"></i>Admin</a></li>';
							}
						?>
					</ul>
				</div>

				<div class="about">
					<p>Personalized service  -||-  Attention to detail  -||-  Moments  -||-  Customer satisfaction  -||-  Customized solutions  -||-  Memories <hr>&diams; Copyright &copy; 2023 , All photos used were properly sourced and used under proper licensing &diams;</p>
				</div>
				
			</div>
		</footer>

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
	</body>
</html>

