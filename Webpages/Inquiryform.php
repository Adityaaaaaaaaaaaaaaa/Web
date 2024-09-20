<?php
	session_start();

	if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
		include ('../PHP/Taketwoconnect.php');

		$sessionType = isset($_SESSION['user_login']) ? 'user' : 'admin';

		if ($sessionType === 'user') {
			// Get the username from the session
			$userName = $_SESSION['user_login'];

			$userName = $_SESSION['user_login'];

			$sql = "SELECT clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd FROM client WHERE clnUn = '$userName';";

			$result = mysqli_query($conn, $sql);

			// Fetch the user data as an associative array
			$userData = mysqli_fetch_assoc($result);

			mysqli_close($conn);
		}
	} else {
		header("Location: ../webpages/Login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inquiry Form</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Form style CSS.css" >
		
		<script>
	  	function checkform1(form) {
		    var errors = [];
		    var special = /^[\w ]+$/;
		    var digits = /\d/;
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

		<?php include "../Webpages/Header.php"; ?>

		<div id="container" class="fade-in">

			<div id="head1">
				<h1>Inquiry?,  Request information?,  Ask us Anything! We got you!</h1>
				<h5>Want a custom shot? fill out our reservation form!&#128527;</h5>
			</div><br>
		
			<form name="contact_us" action="../PHP/chkInquiry.php" method="POST" onsubmit="return checkform1(this) ">
				<div id="form1">
					<div id="name2">
						<label for="formname" >Your Name</label><br>
						<input type="text" id="fnameiq" name="iqFname" placeholder="First Name" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnFn'] : ''; ?>" />
						<input type="text" id="lnameiq" name="iqLname" placeholder="Last Name"  value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnLn'] : ''; ?>"/><br><br>
					</div>

					<div id="emailid1">
						<label for="email1" >Your E-mail address</label><br>
						<input type="email" name="iqEmail" id="email1" placeholder="example@email.com" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnEmail'] : ''; ?>" /><br><br>
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

		<?php include '../Webpages/Footer.php'; ?>
	</body>
</html>

