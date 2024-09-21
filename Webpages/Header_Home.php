<div id="nav">
	<ul class="nav">
		<li><a href="home.php">Home</a></li>
		<li class="dropdown"><a href = "#">Gallery</a> 
			<div class = "dropdown-content">
				<a href="Webpages/NatureLandscape.php">Nature and Landscape</a>
				<a href="Webpages/Stilllife.php">Still life</a>
				<a href="Webpages/Portrait.php">Portraits</a>
				<a href="Webpages/WallArt.php">Wall Art</a>
				<a href="Webpages/UnsplashAPI.php">Image Search</a>
			</div>
		</li>
		<li class="dropdown"><a href = "#">Contact</a> 
			<div class = "dropdown-content">
				<a href="Webpages/Buy.php">Buy</a>
				<?php 
					if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
						echo '<a href="Webpages/Inquiryform.php">Inquiry form</a>';
					} else {
						echo '<a href="Webpages/Login.php">Inquiry form</a>';
					}
				?>
				<?php
					if(isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])){
						echo '<a href="Webpages/Reservationform.php">Reservation form</a>';
					} else {
						echo '<a href="Webpages/Login.php">Reservation form</a>';
					}
				?>
				<a href="Webpages/Feedbackform.php">Feedback</a> 
			</div>
		</li>    
		<li><a href="Webpages/Aboutus.php">About us</a></li>
		<?php
			if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
				// If logged in, show "Profile" link
				echo '<li><a href="Webpages/profile.php">Profile</a></li>';
			}
		?>
		<?php
			if((isset($_SESSION['user_login']) || isset($_SESSION['adminUname']))){
				// If logged in, show "logout" link
				echo '<li><a href="Webpages/Logout.php">Log out</a></li>';
				} else {
					// If not logged in, show "Login" link
					echo '<li><a href="Webpages/Login.php">login</a></li>';
			}
		?>
		<li><a href="#"><button class="darkModeToggle" role="button">Theme</button></a></li>
	</ul>
</div> 