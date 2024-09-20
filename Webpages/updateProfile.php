<?php
	session_start();

	if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
		include ('../PHP/Taketwoconnect.php');

		$sessionType = isset($_SESSION['user_login']) ? 'user' : 'admin';

		if ($sessionType === 'user') {
			$userName = $_SESSION['user_login'];

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
		<title>Update Profile</title>
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
	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>	

		<div id="container" class="fade-in">

            <div id="infoMsg">
                <h1>~ Update Your Profile Information ~</h1>
                <h5>Click Save to finish</h5>
            </div><br>

			<form name="userProfile" method="POST" action="../PHP/profileUpdate.php">
				<div id="form1">
					<div id="nameDisplay" class="divlabel">
						<label for="formname" >Name :</label><br>
						<input type="text" id="fnamerv"  name="udpFname" placeholder="<?php if ($sessionType === 'user') echo $userData['clnFn']; ?>" />
						<input type="text" id="lnamerv"  name="updLname" placeholder="<?php if ($sessionType === 'user') echo $userData['clnLn']; ?>" /><br>
					</div><br><br>

					<div id="phoneDisplay" class="divlabel">
						<label for="phone1" >Phone Number :</label><br>
						<input type="tel" name="updPhone" id="phone1"  placeholder="<?php if ($sessionType === 'user') echo $userData['clnPhone']; ?>" />
					</div><br><br>

					<div id="emailDisplay" class="divlabel">
						<label for="email2" >E-mail address :</label><br>
						<input type="email" name="updEmail" id="email2"  placeholder="<?php if ($sessionType === 'user') echo $userData['clnEmail']; ?>" />
					</div><br><br>

					<div id="unameDisplay" class="divlabel">
						<label for="username1" >Username ( Username cannot be changed, please submit a request via form )</label><br>
						<input type="text" name="updUname" id="username1"  value="<?php if ($sessionType === 'user') echo $userData['clnUn']; ?>" disabled />
					</div><br><br>

					<div id="passwordDisplay" class="divlabel">
						<label for="password1">Password :</label><br>
						<input type="text" name="updPwd" id="passwordField"  placeholder="<?php if ($sessionType === 'user') echo $userData['clnPwd']; ?>" />
					</div><br><br>

					<div id="buttonX">
						<?php
							if ($sessionType !== 'admin') {
								// Only show the submit button if it's not an admin session
								echo '<button type="submit" id="yesx">Save</button>';
							}
						?>
						<button type="button" id="nox" onclick="goback(event);">Cancel</button>
					</div>
				</div>
			</form>
		</div>

		<?php include '../Webpages/Footer.php'; ?>

		<script>
			/*back button*/
			function goback(event) {
				event.preventDefault();
				window.history.back();
			}
		</script>
	</body>
</html>
