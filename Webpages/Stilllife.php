<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Still Life</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Gallery style CSS.css">
		<script src="../Js/jquery-3.7.0.js"></script>

	</head>
	<body>

		<<div>
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
			<h1 class="main-title">Still Life Photography</h1>
		</div>

		<div class="bigbox">

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20210711_123406.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20210711_123406.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20210730_174857 (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20210730_174857 (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20210918_212544.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20210918_212544.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20210929_120637 (1).jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20210929_120637 (1).jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20220119_102843.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20220119_102843.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/20230131_205736.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/20230131_205736.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/aditya-doula-1O56gmrEQzo-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/aditya-doula-1O56gmrEQzo-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/aditya-doula-Cd9kNW2eBkA-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/aditya-doula-Cd9kNW2eBkA-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/aditya-doula-JdxOJRlgomo-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/aditya-doula-JdxOJRlgomo-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/andrew-pons-lylCw4zcA7I-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/andrew-pons-lylCw4zcA7I-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/boudewijn-boer-eX1s8F9AjeM-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/boudewijn-boer-eX1s8F9AjeM-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/clem-onojeghuo-r8lDTtSWGUc-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/clem-onojeghuo-r8lDTtSWGUc-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-07.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-07.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-23.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-23.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-31.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-31.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-32.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-32.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-43.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-43.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-49.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-49.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-50.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-50.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-51.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-51.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-52.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-52.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-62.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-62.jpg" target="_self">View</a></div>
				</div>
			</div>
			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-68.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-68.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-69.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-69.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-71.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-71.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-74.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/copyR@AD_AdobeLr_19_02_2023-74.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/david-clarke-uOqdywF3GG0-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/david-clarke-uOqdywF3GG0-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/david-clode-zsalJqyCY8M-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/david-clode-zsalJqyCY8M-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/federica-gioia-wuqI6oEBvyk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/federica-gioia-wuqI6oEBvyk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/garreth-paul-FdP4asoEASY-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/garreth-paul-FdP4asoEASY-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/garreth-paul-rtF8qwOBsvc-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/garreth-paul-rtF8qwOBsvc-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/geran-de-klerk-wYy3rvvgjAU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/geran-de-klerk-wYy3rvvgjAU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/john-sekutowski-3nalUfmyG-s-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/john-sekutowski-3nalUfmyG-s-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/jonathan-cosens-photography-r6x_5sMPFQM-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/jonathan-cosens-photography-r6x_5sMPFQM-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/josie-weiss-RW48zft15Gw-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/josie-weiss-RW48zft15Gw-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/julia-joppien-cdBSNjP_v0w-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/julia-joppien-cdBSNjP_v0w-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/julia-joppien-IojCPQ2rWe8-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/julia-joppien-IojCPQ2rWe8-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/luis-arias-WnqewLN8Suk-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/luis-arias-WnqewLN8Suk-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/michael-d-jSADgWPmKDU-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/michael-d-jSADgWPmKDU-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/monika-grabkowska-qSkWlOBHia0-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/monika-grabkowska-qSkWlOBHia0-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/nilufar-nattaq-iszDsAOTo1E-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/nilufar-nattaq-iszDsAOTo1E-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/patrick-langwallner-3pR7d-tIRx8-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/patrick-langwallner-3pR7d-tIRx8-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/saffu-Ct1Mx5OTn9A-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/saffu-Ct1Mx5OTn9A-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/sixteen-miles-out-GuWy7FSPLd8-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/sixteen-miles-out-GuWy7FSPLd8-unsplash.jpg" target="_self">View</a></div>
				</div>
			</div>

			<div id="imgbox">
				<img class="img" src="../Images/Still life/smit-patel-dGMcpbzcq1I-unsplash.jpg" alt=''>
				<div class="middle">
					<div class="text"><?php
				if(isset($_SESSION['user_login'])){
				echo '<a href="../Webpages/Reservationform.php">Buy !</a>';
				} else {
				echo '<a href="../Webpages/Login.php">login to buy!</a>';
				}
				?><br><a href="../Images/Still life/smit-patel-dGMcpbzcq1I-unsplash.jpg" target="_self">View</a></div>
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

				var mainTitleText = "Still Life Category";
				var mainTitleSpeed = 100;
				typeWriterLoop('.main-title', mainTitleText, mainTitleSpeed);
			});
		</script>

	</body>
</html>

