<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inquiry Form</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Form style CSS.css" >
		
		<script>
	  	function checkform1(form) {
		    // ARRAY created to identify any encountered error(s) and display it/them to the user at the same time
		    var errors = [];

		    // regular expression to match only alphanumeric characters and spaces
		    var special = /^[\w ]+$/;

		    // regular expression to match any digit
		    var digits = /\d/;

		    // regular expression to match .com at the end of the email address
		    var end = /(\.com)$/;

		    // validation fails if the First Name field is empty
		    if (form.iqFname.value == "") {
		      	errors.push("First Name is empty!");
		    } else if (!special.test(form.iqFname.value)) {
				// validation fails if First Name does not match our regular expression concerning alphanumeric characters and spaces
				errors.push("First Name contains invalid characters!");
		    }

		    // validation fails if the Last name field is empty
		    if (form.iqLname.value == "") {
		      	errors.push("The Last Name is empty!");
		    } else if (!special.test(form.iqLname.value)) {
		      // validation fails if there is any alphanumeric character in Last Name
		      	errors.push("Last Name contains invalid characters");
		    }

		    // validation fails if there is any digit in First Name and in Last Name
		    if (digits.test(form.iqFname.value)) {
		      	errors.push("First Name cannot have any digits!");
		    }

		    if (digits.test(form.iqLname.value)) {
		      	errors.push("Last Name cannot have any digits!");
		    }

		    // validation fails if email field is empty
		    if (form.iqEmail.value == "") {
		      	errors.push("Email address is empty!");
		    } else if (!end.test(form.iqEmail.value)) {
		      	errors.push("Email must end with .com!");
		    }

		    // The length of the errors array needs to be greater than 0 to load our message and return false
		    if (errors.length > 0) {
				var message = "ERRORS:\n\n";
				for (var i = 0; i < errors.length; i++) {
					message += errors[i] + "\n\n";
				}
				alert(message);
				return false;
		    }

		    // validation is successful
		    return true;
	  	}
		</script>
		<script>
			window.onload = function() {
				var fadeElements = document.querySelectorAll('.fade-in');
				for (var i = 0; i < fadeElements.length; i++) {
					fadeElements[i].style.opacity = '1'; // Change opacity to 1 for fade-in
				}
			};
		</script>
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

			<div id="head1">
				<h1>Inquiry?,  Request information?,  Ask us Anything!</h1>
				<h5>We got you !&#128527;</h5>
			</div><br>
		
			<form name="contact_us" action="../PHP/chkInquiry.php" method="POST" onsubmit="return checkform1(this) ">
				<div id="form1">
					<div id="name2">
						<label for="formname" >Your Name</label><br>
						<input type="text" id="fnameiq" name="iqFname" placeholder="First Name" />
						<input type="text" id="lnameiq" name="iqLname" placeholder="Last Name"  /><br><br>
					</div>

					<div id="emailid1">
						<label for="email1" >Your E-mail address</label><br>
						<input type="email" name="iqEmail" id="email1" placeholder="example@email.com" /><br><br>
					</div>

					<div id="message">
						<label>Your Message</label><br>
						<textarea rows="10" cols="60" name="iqMsg" id="text" placeholder="Your Message ..."></textarea><br/>
					</div>

					<div id="button">
						<button type="submit" value="Submit" id="sub" >Submit</button>
						<button type="reset" value="Clear" id="clear">Clear</button>
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

