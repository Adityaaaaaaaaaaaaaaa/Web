<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
    include ('../PHP/Taketwoconnect.php');

    // Get the session type, if user session or admin session
    $sessionType = isset($_SESSION['user_login']) ? 'user' : 'admin';

    if ($sessionType === 'user') {
        // Get the username from the session
        $userName = $_SESSION['user_login'];

        // Get the username from the session
		$userName = $_SESSION['user_login'];

		// Sql query
		$sql = "SELECT clnFn, clnLn, clnUn, clnEmail, clnPhone, clnPwd FROM client WHERE clnUn = '$userName';";

		// Execute the query
		$result = mysqli_query($conn, $sql);

		// Fetch the user data as an associative array
		$userData = mysqli_fetch_assoc($result);

		// Close the database connection
		mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Feedback Form</title>

		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Form style CSS.css" >
		
		<script>
			function checkform(form) {
				// ARRAY created to identify any encountered error(s) and display it/them to the user at the same time
				var errors = [];

				// regular expression to match only alphanumeric characters and spaces
				var special = /^[\w ]+$/;

				// regular expression to match any digit
				var digits = /\d/;

				// validation fails if the First Name field is empty
				if (form.fdFname.value == "") {
					errors.push("First Name is empty!");
				} else if (!special.test(form.fdFname.value)) {
					// validation fails if First Name does not match our regular expression concerning alphanumeric characters and spaces
					errors.push("First Name contains invalid characters!");
				}

				// validation fails if the Last name field is empty
				if (form.fdLname.value == "") {
					errors.push("The Last Name is empty!");
				} else if (!special.test(form.fdLname.value)) {
					// validation fails if there is any alphanumeric character in Last Name
					errors.push("Last Name contains invalid characters");
				}

				// validation fails if there is any digit in First Name and in Last Name
				if (digits.test(form.fdFname.value)) {
					errors.push("First Name cannot have any digits!");
				}

				if (digits.test(form.fdLname.value)) {
					errors.push("Last Name cannot have any digits!");
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
				<h1>"Let Us Know What You Think!"</h1>
				<h5>fill out this feedback form </h5>
			</div><br>
			
			<form name="feedbackForm" id="Feedback" action="../PHP/chkFeedback.php" method="POST" onsubmit="return checkform(this)">

				<div id="name1">
					<label for="feedbackForm" >&cir; Your Name :</label><br>
						<input type="text" id="fnamefd" name="fdFname" placeholder="First Name" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnFn'] : ''; ?>" />
						<input type="text" id="lnamefd" name="fdLname" placeholder="Last Name" value="<?php echo (isset($sessionType) && $sessionType === 'user') ? $userData['clnLn'] : ''; ?>" />
				</div><br><br>

				<div id="age">
					<label for="feedbackForm">&cir; Age :</label><br>
						<input type="radio" id="age1" name="age" value="0-30">
					<label for="age1">0 - 30</label>
						<input type="radio" id="age2" name="age" value="31-60">
					<label for="age2">31 - 60</label>
						<input type="radio" id="age3" name="age" value="61-100">
					<label for="age3">61 - 100</label>
				</div><br><br>

				<div id="gender">
					<label for="feedbackForm">&cir; Gender :</label><br>
						<input type="radio" id="male" name="gender" value="M">
					<label for="male">Male</label>
						<input type="radio" id="female" name="gender" value="F">
					<label for="female">Female</label>
						<input type="radio" id="noSay" name="gender" value="X">
					<label for="noSay">Prefer not to say</label>
				</div><br><br>

				<div id="qualityService">
					<label for="feedbackForm">&cir; Please provide your feedback on the quality of our service :</label><br>
						<input type="radio" id="Poor" name="qtser" value="Poor">
					<label for="Poor">Poor</label>
						<input type="radio" id="Average" name="qtser" value="Average">
					<label for="Average">Average</label>
						<input type="radio" id="Good" name="qtser" value="Good">
					<label for="Good">Good</label>
						<input type="radio" id="Vgood" name="qtser" value="Vgood">
					<label for="Vgood">Very Good</label>
						<input type="radio" id="Excellent" name="qtser" value="Excellent">
					<label for="Excellent">Excellent</label>
				</div><br><br>

				<div id="photoQuality">
					<label for="feedbackForm">&cir; Rate the quality of your Products :</label><br>
						<input type="radio" id="Low2" name="prodq" value="Low">
					<label for="Low2">Low</label>
						<input type="radio" id="Average2" name="prodq" value="Average">
					<label for="Average2">Average</label>
						<input type="radio" id="Good2" name="prodq" value="Good">
					<label for="Good2">Good</label>
						<input type="radio" id="Vgood2" name="prodq" value="Vgood">
					<label for="Vgood2">Very Good</label>
				</div><br><br>

				<div id="recommend">
					<label for="feedbackForm">&cir; Would you recomment our products to others ?</label><br>
						<input type="radio" id="Yes" name="recom" value="Yes">
					<label for="Yes">Yes</label>
						<input type="radio" id="Maybe" name="recom" value="Maybe">
					<label for="Maybe">Maybe</label>
						<input type="radio" id="No" name="recom" value="No">
					<label for="No">No</label>
				</div><br><br>

				<div id="suggestion">
					<label for="messagebox">&cir; Any other changes or other feedback you want to include ?</label><br>
					<textarea cols="45" rows="5" placeholder=" Write here ..." name="fbmsg" id="text"></textarea>	
				</div><br><br>

				<div id="button">
					<button type="submit" value="Submit" id="sub">Submit</button>
					<button type="reset" value="Clear" id="clear">Clear</button>
				</div>
			</form>
		</div>

		<?php include '../Webpages/Footer.php'; ?>

		<!-- mouse trail -->
		<script src="../Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="../Js/dark-mode.js"></script>
	</body>
</html>