<footer>
	<div class="footer-container">

		<div class="logo">
			<a href="../home.php"><img src="../Images/Website logo/TakeTwo.png" id="smalllogo" alt="TAKE TWO logo" /></a>
		</div>

		<div class="quicklinks" id="nav">
			<ul class="nav">
				<li><?php
					if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
						echo '<a href="../Webpages/Inquiryform.php">Contact</a>';
					} else {
						echo '<a href="../Webpages/Login.php">Contact</a>';
					}
					?>
				</li>
				<li><a href="../Webpages/Feedbackform.php">Feedback</a></li>
				<li><a href="../Webpages/Aboutus.php">About Us</a></li>
				<?php
				if(isset($_SESSION['adminUname'])){
					// If logged in, show "logout" link
					echo '<li><a href="../Webpages/Admin.php">Admin</a></li>';
					echo '<li><a href="../Webpages/Logout.php">Admin Log out</a></li>';
					} else {
					// If not logged in, show "Login" link
					echo '<li><a href="../Webpages/AdminLogin.php">Admin</a></li>';
					}
				?>
			</ul>
		</div>

		<div class="about">
			<p>Personalized service  -||-  Attention to detail  -||-  Moments  -||-  Customer satisfaction  -||-  Customized solutions  -||-  Memories &#9996;<hr><span id="icon">&#10022;</span> <span id="footerTake2">TakeTwo</span> &copy; <span id="year"></span> - All photos used were properly sourced and used under proper licensing <span id="icon">&#10022;</span></p>
		</div>
		
	</div>
</footer>
<script src="../Js/year.js"></script>
