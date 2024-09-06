<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Dashboard</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" href="../CSS/admin style.css">
		<script>
			window.onload = function() {
				var mainContent = document.querySelector(".main");
				mainContent.style.opacity = "1";
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

		<div class="main fade-in">

            <div id="adminDash">
                <div class="Maintext">
                    <h1>Admin Dashboard</h1>

                    <div class="dashboard-section">
                        <p><h2>Welcome, Admin!</h2></p>
                        <p>Stats below, Enjoy!</p>
                    </div><br><br>

                    <div id="tableStats">
						<p id="stats">Use the drop-down menu to view more results: <p>
                            <?php
                                require "../PHP/Taketwoconnect.php";

                                // Define table names
                                $tables = array("client", "reservation", "inquiry", "feedback");

                                foreach ($tables as $table) {
                                    $query = "SELECT COUNT(*) AS count FROM $table";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $count = $row['count'];

                                    echo "<p id='stats'>Number of records in $table: $count</p>";
                                }
                            ?>
                    </div>

                    <div id="formAdmin">
                        <form id="thisOne" name="theForm" action="../PHP/adminData.php" method="POST">
                            <div id="tableData">
                                <select id="tableList" name="tablex">
                                    <option value="client">Client Information</option>
                                    <option value="reservation">Reservations</option>
                                    <option value="inquiry">Inquiries</option>
                                    <option value="feedback">Feedback</option>
                                </select><br><br>
                                <button id="displayDataBtn">Display Data</button>
                            </div><br><br>
                        </form>
                    </div>

                </div>
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