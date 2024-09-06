<?php session_start(); ?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Buy</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" href="../CSS/Buy.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<script>
			window.onload = function() {
				var mainContent = document.querySelector(".main");
				mainContent.style.opacity = "1";
			};
		</script>
		<!--<script> //Javascript DOM to fetch and load the page xml
			// everything working expect sa 2 button pou link la, Evrything else ok
			document.addEventListener("DOMContentLoaded", function() {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var xmlDoc = this.responseXML;
						if (xmlDoc) {
							var contents = xmlDoc.getElementsByTagName("content")[0];
							if (contents) {
								var contentDiv = document.createElement("div");
								contentDiv.classList.add("content", "main");

								// Recreate HTML structure from XML
								var heading2 = document.createElement("h2");
								heading2.classList.add("heading");
								heading2.textContent = contents.getElementsByTagName("Bheading2")[0]?.textContent || "";
								contentDiv.appendChild(heading2);

								var welcomePara = document.createElement("p");
								welcomePara.classList.add("Welcome");
								welcomePara.textContent = contents.getElementsByTagName("para")[0]?.textContent || "";
								contentDiv.appendChild(welcomePara);

								// Section 1: How to Purchase a Photo
								var section1 = document.createElement("div");
								var h3_1 = document.createElement("h3");
								h3_1.classList.add("sub-heading");
								h3_1.textContent = contents.getElementsByTagName("Bheading3")[0]?.textContent || "";
								section1.appendChild(h3_1);

								var div1 = document.createElement("div");
								div1.classList.add(contents.getElementsByTagName("BhowTo")[0]?.getAttribute("class") || "");
								var steps1 = contents.querySelectorAll("BhowTo step");
								steps1.forEach(function(step) {
									var p = document.createElement("p");
									p.textContent = step.textContent;
									div1.appendChild(p);
								});
								section1.appendChild(div1);
								contentDiv.appendChild(section1);

								// Button 1
								var button1 = document.createElement("button");
								button1.classList.add(contents.getElementsByTagName("BbuyBtn")[0]?.getAttribute("class") || "");
								var button1Label = contents.getElementsByTagName("BbuyBtn label")[0]?.textContent || "";
								var button1Link = contents.getElementsByTagName("BbuyBtn link")[0]?.textContent || "";
								button1.textContent = button1Label;
								var link1 = document.createElement("a");
								link1.href = button1Link;
								link1.textContent = "Click Here!";
								button1.appendChild(document.createElement("br"));
								button1.appendChild(link1);
								contentDiv.appendChild(button1);

								// Section 2: Reserve a Custom Session
								var section2 = document.createElement("div");
								var h3_2 = document.createElement("h3");
								h3_2.classList.add("sub-heading");
								h3_2.textContent = contents.getElementsByTagName("Rheading3")[0]?.textContent || "";
								section2.appendChild(h3_2);

								var div2 = document.createElement("div");
								div2.classList.add(contents.getElementsByTagName("RhowTo")[0]?.getAttribute("class") || "");
								var steps2 = contents.querySelectorAll("RhowTo step");
								steps2.forEach(function(step) {
									var p2 = document.createElement("p");
									p2.textContent = step.textContent;
									div2.appendChild(p2);
								});
								section2.appendChild(div2);
								contentDiv.appendChild(section2);

								// Section 3: Pricing Packages for Custom Shots
								var section3 = document.createElement("div");
								section3.classList.add("tableHeading");
								section3.textContent = contents.getElementsByTagName("THeading4")[0]?.textContent || "";
								var table = document.createElement("table");
								table.innerHTML = contents.getElementsByTagName("table")[0]?.innerHTML || "";
								section3.appendChild(table);
								contentDiv.appendChild(section3);

								// Button 2
								var button2 = document.createElement("button");
								button2.classList.add(contents.getElementsByTagName("RbuyBtn")[0]?.getAttribute("class") || "");
								var button2Label = contents.getElementsByTagName("RbuyBtn label")[0]?.textContent || "";
								var button2Link = contents.getElementsByTagName("RbuyBtn link")[0]?.textContent || "";
								button2.textContent = button2Label;
								var link2 = document.createElement("a");
								link2.href = button2Link;
								link2.textContent = "Go Here!";
								button2.appendChild(document.createElement("br"));
								button2.appendChild(link2);
								contentDiv.appendChild(button2);

								// Insert the created div into the document
								document.getElementById("xmlContent").appendChild(contentDiv);
							}
						}
					}
				};
				xhttp.open("GET", "../XML/Buy.xml", true);
				xhttp.send();
			});
		</script>-->
		<script>
			// above using ajax jquery to display
			// mone avoy toi link website la reference la, check li 
			$(document).ready(function() {
				$.ajax({
					type: "GET",
					url: "../XML/Buy.xml",
					dataType: "xml",
					success: function(xml) {
						$(xml).find('content').each(function() {
							var contentDiv = $('<div>').addClass('content main');
							
							// big heading la
							var heading2 = $('<h2>').addClass('heading').text($(this).find('Bheading2').text());
							contentDiv.append(heading2);

							var welcomePara = $('<p>').addClass('Welcome').text($(this).find('para').text());
							contentDiv.append(welcomePara);

							// Section 1: How to Purchase a Photo
							var section1 = $('<div>');
							var h3_1 = $('<h3>').addClass('sub-heading').text($(this).find('Bheading3').text());
							section1.append(h3_1);

							var div1 = $('<div>').addClass($(this).find('BhowTo').attr('class'));
							$(this).find('BhowTo step').each(function() {
								var step = $('<p>').text($(this).text());
								div1.append(step);
							});
							section1.append(div1);
							contentDiv.append(section1);

							// Button 1 pou buy
							var button1 = $('<button>').addClass($(this).find('BbuyBtn').attr('class'));
							var buttonText1 = $('<span>').text($(this).find('BbuyBtn label').text());
							var link1 = $('<a>').attr('href', $(this).find('BbuyBtn link').attr('href')).text($(this).find('BbuyBtn link').text());
							button1.append(buttonText1, '<br>', link1);
							contentDiv.append(button1);


							// Section 2: Reserve a Custom Session
							var section2 = $('<div>');
							var h3_2 = $('<h3>').addClass('sub-heading').text($(this).find('Rheading3').text());
							section2.append(h3_2);

							var div2 = $('<div>').addClass($(this).find('RhowTo').attr('class'));
							$(this).find('RhowTo step').each(function() {
								var step = $('<p>').text($(this).text());
								div2.append(step);
							});
							section2.append(div2);
							contentDiv.append(section2);

							// Section 3: Pricing Packages for Custom Shots
							var section3 = $('<div>').addClass('tableHeading').text($(this).find('THeading4').text());
							var table = $('<table>').html($(this).find('table').html());
							section3.append(table);
							contentDiv.append(section3);

							// Button 2 pou reserve
							var button2 = $('<button>').addClass($(this).find('RbuyBtn').attr('class'));
							var buttonText2 = $('<span>').text($(this).find('RbuyBtn label').text());
							var link2 = $('<a>').attr('href', $(this).find('RbuyBtn link').attr('href')).text($(this).find('RbuyBtn link').text());
							button2.append(buttonText2, '<br>', link2);
							contentDiv.append(button2);

							// add on page
							$('#xmlContent').append(contentDiv);
						});
					},
					error: function(xhr, status, error) {
						console.error(error);
					}
				});
			});
		</script> 

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>

<!-- 		<div class="content main">
			<h2 class="heading">Our Services</h2>
			<p class="Welcome">Welcome to our services page! Here, you can find information on how to purchase photos from our collection or reserve a custom photoshoot session tailored just for you.</p>
			
			<!- Section 1: How to Buy a Photo --
			<h3 class="sub-heading">How to Purchase a Photo ?</h3>
			<div class="howTo">
				<p>1. Explore our Collection: Browse through our diverse range of high-quality photographs in our gallery.</p>
				<p>2. Select Your Favorite: Once you've found the perfect photo, click on it to get redirected here!</p>
				<p>3. Submit Inquiry: To purchase the photo, simply click on the "Inquiry" button below and Fill out the form with your contact information and any specific details regarding your purchase request.</li>
				<p>4. Confirmation: After receiving your inquiry, we'll promptly get in touch with you to finalize the purchase process.</p>
				<p>5. Ta-daaaaa!</p>
			</div>

			<br>

			<button class="buyBtn">
				Buy<br>
				<a href="../Webpages/Inquiryform.php">Click Here!</a>
			</button>
			
			<!- Section 2: Reserve a Custom Session --
			<h3 class="sub-heading">Reserve a Custom Photoshoot</h3>
			<div class="howTo">
				<p>1. Contact Us: Reach out to us via our Reservation page to discuss your custom photoshoot requirements along with your availability date.</p>
				<p>2. Consultation: We'll schedule a consultation to understand your vision, preferences, and any specific requests for the photoshoot.</p>
				<p>3. Confirmation: Once all details are finalized, we'll confirm the reservation for your custom session.</p>
				<p>4. See below our options and choose your best fit!</p>
			</div>

			<br>

			<!- Section 3: Pricing Packages for Custom Shots --
			<h4 class="tableHeading">Pricing Packages for Custom Photoshoots</h4>
			<table>
				<thead>
					<tr>
						<th>Package</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Essential</td>
						<td>Perfect for personal portraits, headshots or Mugshots! Includes up to 1-hour session and 10 edited photos.</td>
						<td>$ 99</td>
					</tr>
					<tr>
						<td>Classic</td>
						<td>Great for family or engagement photoshoots. Includes up to 2-hour session, 20/30 edited photos, and one location.</td>
						<td>$ 199</td>
					</tr>
					<tr>
						<td>Deluxe</td>
						<td>Ideal for birthdays, photoshoot or just for fun. Includes up to 4-hour session, 50 edited photos, multiple locations, and customized editing.</td>
						<td>$ 349</td>
					</tr>
					<tr>
						<td>Corporate</td>
						<td>Suitable for corporate events or professional branding. Includes up to 6-hour session, 100 edited photos, full coverage, and online gallery.</td>
						<td>Get in touch via our contact options</td>
					</tr>                    
					<tr>
						<td>Events</td>
						<td>Event based, Multiple locations, Hard/soft copy of photos, Full coverage, Custom Editting</td>
						<td>Get in touch via our contact options</td>
					</tr>
					<!- Add more rows for additional packages --
				</tbody>
			</table>

			<br>
			
			<button class="buyBtn">
				Custom<br>
				<a href="../Webpages/Reservationform.php">Go Here!</a>
			</button>

		</div> -->

		<div id="xmlContent">
			<!-- ajax will display it here , the xml-->
		</div>

		<?php include '../Webpages/Footer.php'; ?>

		<!-- mouse trail -->
		<script src="../Js/mouse.js"></script>

		<!-- dark mode js -->
		<script src="../Js/dark-mode.js"></script>
	</body>
</html>	