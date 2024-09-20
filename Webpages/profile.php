<?php
	session_start();

	if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
		include ('../PHP/Taketwoconnect.php');

		$sessionType = isset($_SESSION['user_login']) ? 'user' : 'admin';

		if ($sessionType === 'user') {
			$userName = $_SESSION['user_login'];

			$sql = "SELECT clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd FROM client WHERE clnUn = '$userName';";

			$result = mysqli_query($conn, $sql);

			// Fetch the user data as an associative array
			$userData = mysqli_fetch_assoc($result);

			mysqli_close($conn);
		}
	} else {
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
			a {
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
				cursor: pointer;
			}

			#showPasswordButton:hover {
				box-shadow: 0 0 15px 5px blue;
				background-color: snow;
			}
		</style>
	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

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

		<?php include '../Webpages/Footer.php'; ?>
	</body>
</html>
