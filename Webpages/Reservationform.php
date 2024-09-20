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
		header("Location: ../webpages/Login.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reservation Form</title>

		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Form style CSS.css" >
		
		<script>
		  	function checkform2(form) {
			    // ARRAY created to identify any encountered error(s) and display it/them to the user at the same time
			    var errors = [];

			    // regular expression to match only alphanumeric characters and spaces
			    var special = /^[\w ]+$/;

			    // regular expression to match any digit
			    var digits = /\d/;

			    // regular expression to match .com at the end of the email address
			    var end = /(\.com)$/;

			    // regular expression to match a valid phone number pattern 5XXX[?]XXXX where ? is optional white space
				var phone = /^5\d{3}(\s?\d{4})?$/;

			    // validation fails if the First Name field is empty
			    if (form.rsvFname.value == "") {
			      	errors.push("First Name is empty!");
			    } else if (!special.test(form.rsvFname.value)) {
			      // validation fails if First Name does not match our regular expression concerning alphanumeric characters and spaces
			      	errors.push("First Name contains invalid characters!");
			    }

			    // validation fails if the Last name field is empty
			    if (form.rsvLname.value == "") {
			      	errors.push("The Last Name is empty!");
			    } else if (!special.test(form.rsvLname.value)) {
			      // validation fails if there is any alphanumeric character in Last Name
			      	errors.push("Last Name contains invalid characters");
			    }

			    // validation fails if there is any digit in First Name and in Last Name
			    if (digits.test(form.rsvFname.value)) {
			      	errors.push("First Name cannot have any digits!");
			    }

			    if (digits.test(form.rsvLname.value)) {
			      	errors.push("Last Name cannot have any digits!");
			    }

				if (form.rsvPhone.value == "") {
					errors.push("Phone number is empty!");
				} else if (!phone.test(form.rsvPhone.value)) {
					errors.push("Phone number must be in the format 5XXX XXXX or 5XXXXXXXX!");
				}

			    // validation fails if email field is empty
			    if (form.rsvEmail.value == "") {
			      	errors.push("Email address is empty!");
			    } else if (!end.test(form.rsvEmail.value)) {
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
				<h1>~ Reserve your next piece with us ~</h1>
				<h5>See you soon !</h5>
			</div><br>
		
			<form name="contact_us" action="../PHP/chkReservation.php" method="POST" onsubmit="return checkform2(this)">
				<div id="form1">
					<div id="name3">
						<label for="formname" >Your Name</label><br>
						<input type="text" id="fnamerv" name="rsvFname" placeholder="First Name" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnFn'] : ''; ?>" />
						<input type="text" id="lnamerv" name="rsvLname" placeholder="Last Name" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnLn'] : ''; ?>" /><br><br>
					</div>

					<div id="phone">
						<label for="phone1" >Your Phone Number</label><br>
						<input type="tel" name="rsvPhone" id="phone1" placeholder="5XXX XXXX" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnPhone'] : ''; ?>" />
					</div><br><br>

					<div id="emailid2">
						<label for="email2" >Your E-mail address</label><br>
						<input type="email" name="rsvEmail" id="email2" placeholder="example@email.com" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnEmail'] : ''; ?>" /><br><br>
					</div><br><br>

					<div id="date">
						<label for="date1">Choose Date for Meeting</label><br>
						<input type="date" name="rsvDate" />
					</div><br><br>
					
					<div id="message">
						<label>Your Message</label><br>
						<textarea rows="10" cols="60" id="text" name="rsvMsg" placeholder="Your Message ..."></textarea><br/>
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

