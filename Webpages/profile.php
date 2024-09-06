<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
    include ('../PHP/Taketwoconnect.php');

    $sessionType = isset($_SESSION['user_login']) ? 'user' : 'admin';

    if ($sessionType === 'user') {
        // Get the username from the session
        $userName = $_SESSION['user_login'];

        // the sql query
        $sql = "SELECT clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd FROM client WHERE clnUn = '$userName';";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Fetch the user data as an associative array
        $userData = mysqli_fetch_assoc($result);

        // Close the database connection
        mysqli_close($conn);
    }
} else {
    // Redirect if the user is not logged in
    header("location: ../Webpages/Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Profile Page</title>

		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Profile style.css" >
		<script>
			// Initialize the timeout ID
			var timeoutId;

			// Function to show password and set timeout
			function showPass() {
				var passwordField = document.getElementById("passwordField");
				if (passwordField.type === "password") {
					passwordField.type = "text";
					clearTimeout(timeoutId); // Clear any previous timeouts
					timeoutId = setTimeout(hidePass, 10000); // new timeout for 10 seconds
				} else {
					passwordField.type = "password";
					clearTimeout(timeoutId); // Clear timeout
					timeoutId = setTimeout(hidePass, 10000); // new timeout 10 seconds
				}
			}

			// Function to hide password
			function hidePass() {
				var passwordField = document.getElementById("passwordField");
				passwordField.type = "password";
			}

			// Initialize the timeout & fade-in animation on page load
			window.onload = function () {
				var fadeElements = document.querySelectorAll('.fade-in');
				for (var i = 0; i < fadeElements.length; i++) {
					fadeElements[i].style.opacity = '1'; // Change opacity to 1 for fade-in
				}

				timeoutId = setTimeout(hidePass, 10000); // Set the initial timeout
			};
		</script>

		<style>
			{
				text-decoration: none;
				color: black;
			}

			/* showPasswordButton */
			#showPasswordButton {
				display: inline;
				border: 1px;
				margin-top: 20px;
				margin-left: 10px;
				padding: 10px;
				border-radius: 15px;
				text-align: center;
				font-family: fantasy, serif, 'Impact';
				font-size: 10px;
				background-color: #a9a9a9;
			}

			#showPasswordButton:hover {
				box-shadow: 0 0 15px 5px blue;
				background-color: snow;
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
                <h1>~ Your Profile Information ~</h1>
                <h5>A little about yourself!</h5>
            </div><br>

			<form name="userProfile" method="POST">
				<div id="form1">
					<div id="nameDisplay" class="divlabel">
						<label for="formname" >Your Name</label><br>
						<input type="text" id="fnamerv"  name="rsvFname" value="<?php if ($sessionType === 'user')  echo $userData['clnFn']; ?>" disabled/>
						<input type="text" id="lnamerv"  name="rsvLname" value="<?php if ($sessionType === 'user')  echo $userData['clnLn']; ?>" disabled/><br>
					</div><br><br>

					<div id="phoneDisplay" class="divlabel">
						<label for="phone1" >Your Phone Number</label><br>
						<input type="tel" name="rsvPhone" id="phone1"  value="<?php if ($sessionType === 'user')  echo $userData['clnPhone']; ?>" disabled/>
					</div><br><br>

					<div id="emailDisplay" class="divlabel">
						<label for="email2" >Your E-mail address</label><br>
						<input type="email" name="rsvEmail" id="email2"  value="<?php if ($sessionType === 'user')  echo $userData['clnEmail']; ?>" disabled/>
					</div><br><br>

					<div id="unameDisplay" class="divlabel">
						<label for="username1" >Your Username</label><br>
						<input type="text" name="rsvEmail" id="username1"  value="<?php if ($sessionType === 'user')  echo $userData['clnUn']; ?>" disabled/>
					</div><br><br>

					<div id="passwordDisplay" class="divlabel">
						<label for="password1">Your Password</label><br>
						<input type="password" name="rsvPwd" id="passwordField"  value="<?php if ($sessionType === 'user')  echo $userData['clnPwd']; ?>" disabled/>
						<button type="button" id="showPasswordButton" onclick="showPass()">Show Password</button>
					</div><br><br>

					<div id="buttonX">
						<button id="yesx" disabled><a href="../Webpages/updateProfile.php" >Update Account</a></button>
						<button id="nox" disabled><a href="../Webpages/deleteProfile.php" >Delete Account</a></button>
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
