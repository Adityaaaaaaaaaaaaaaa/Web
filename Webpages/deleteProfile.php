<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Delete Profile</title>

		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Profile style.css" >
		<script>
    		// fade-in animation on page load
			window.onload = function () {
				var fadeElements = document.querySelectorAll('.fade-in');
				for (var i = 0; i < fadeElements.length; i++) {
					fadeElements[i].style.opacity = '1'; // Change opacity to 1 for fade-in
				}
			};
		</script>
        <script>
            function ajaxPwd() {
				try {
					requestbox = new XMLHttpRequest();
				} catch (e) {
					alert("Your browser does not support AJAX!");
				}

				var passwd = document.delProfile.delPwd.value;
				var url = "../PHP/chkDelete.php";

				if (passwd !== "") {
					requestbox.open("POST", url, true);
					requestbox.onreadystatechange = chkpwd;
					requestbox.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					requestbox.send("delPwd=" + passwd);
				} else {
					document.getElementById('delbtn').innerHTML = "";
					document.getElementById('delbtn').style.display = "none"; // Hide the button
				}

				function chkpwd() {
					if ((requestbox.readyState == 4) && (requestbox.status == 200)) {
						document.getElementById('delbtn').innerHTML = requestbox.responseText;
						if (requestbox.responseText.includes("See you soon!")) {
							document.getElementById('delbtn').style.display = "block"; // Show the button
						} else {
							document.getElementById('delbtn').style.display = "none"; // Hide the button
						}
					}
				}
			}
        </script>
		<style>
			a {
				text-decoration: none;
				color: black;
			}
		</style>
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

		<div id="container" class="fade-in">

            <div id="infoMsg">
                <h1>~ Delete Your Profile Information ?~</h1>
                <h5>Leaving us ... &#128579;</h5>
            </div><br>

			<form name="delProfile" method="POST" action="../PHP/profileDelete.php">
				<div id="form1">
                    <div class="divlabel2">
                        <p>Deleting your account will remove all your data from our system</p><br>
                        <p>This action cannot be undone !</p><br><br>
                        <p>Note: You will be logged out upon deletion</p><br>
                        <p>Please re-enter your password :</p><br>
                    </div><br><br>

                    <div id="passwordDisplay" class="divlabel">
						<label for="password1">Enter Password</label><br>
						<input type="password" name="delPwd" id="passwordField" onblur="ajaxPwd()" />
                        <div id="delbtn"></div>
					</div><br><br>

					<div id="buttonX">
						<button id="nox" disabled><a href="../Webpages/profile.php">Cancel</a></button>
					</div>
				</div>
			</form>
		</div>

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
	</body>
</html>
