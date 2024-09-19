<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Image Search</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Gallery style CSS.css"> 
		<script src="../Js/jquery-3.7.0.js"></script>
	</head>
	<body>
		<?php include "../Webpages/Header.php"; ?>

		<div class="headings">
			<h1 class="main-title">Search or Get Random Images</h1>
		</div>

		<!-- Search form for the user -->
		<div class="search-container">
			<input type="text" id="searchQuery" placeholder="Enter keyword to search for images">
			<button id="searchBtn">Search</button>
			<button id="randomBtn">Random</button> <!-- Random button -->
		</div>

		<!-- Div to display the images dynamically -->
		<div class="bigbox" id="imageGallery"></div>

		<?php include '../Webpages/Footer.php'; ?>

		<!-- heading jquery -->
		<script>
			$(document).ready(function() {
				function typeWriterLoop(element, text, speed) {
					var i = 0;
					var $element = $(element);
					$element.empty();

					function type() {
						if (i < text.length) {
							$element.append(text.charAt(i));
							i++;
							setTimeout(type, speed);
						} else {
							setTimeout(function() {
								$element.empty();
								i = 0;
								type();
							}, 2000); 
						}
					}

					type();
				}

				var mainTitleText = "Search or Get Random Images";
				var mainTitleSpeed = 100;
				typeWriterLoop('.main-title', mainTitleText, mainTitleSpeed);

				// Event listener for search button click (fetch random 30 images based on query)
				document.getElementById('searchBtn').addEventListener('click', function() {
					const query = document.getElementById('searchQuery').value.trim();
					if (query) {
						fetchRandomUnsplashImages(query, 30); // Fetch 30 images based on search query
					}
				});

				// Event listener for random button click (fetch 30 random images)
				document.getElementById('randomBtn').addEventListener('click', function() {
					fetchRandomImages(30); // Fetch 30 random images
				});
			});

			// Fetch random images based on a search query and retry if fewer than expected
			function fetchRandomUnsplashImages(query, count, fetchedImages = []) {
				const accessKey = 'FyOl7pUHQEsiiCKv_SJlKHuPNQ3I4GMqHaGSmDrNN2I'; // Unsplash API key
				const apiUrl = `https://api.unsplash.com/photos/random?query=${encodeURIComponent(query)}&count=${count}&client_id=${accessKey}`;

				fetch(apiUrl)
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						return response.json();
					})
					.then(data => {
						if (!Array.isArray(data)) {
							data = [data];
						}

						// Filter landscape images and add them to the fetchedImages array
						data.forEach(image => {
							if (image.width > image.height) {
								fetchedImages.push(image);
							}
						});

						// If fewer than the desired count, fetch more images
						if (fetchedImages.length < count) {
							let remainingCount = count - fetchedImages.length;
							fetchRandomUnsplashImages(query, remainingCount, fetchedImages);
						} else {
							// Once we have enough images, render them
							renderImages(fetchedImages);
						}
					})
					.catch(error => {
						console.error('Error fetching images:', error);
						document.getElementById('imageGallery').innerHTML = '<p>Error fetching images. Please try again later.</p>';
					});
			}

			// Fetch completely random images and retry if fewer than expected
			function fetchRandomImages(count, fetchedImages = []) {
				const accessKey = 'FyOl7pUHQEsiiCKv_SJlKHuPNQ3I4GMqHaGSmDrNN2I'; // Unsplash API key
				const apiUrl = `https://api.unsplash.com/photos/random?count=${count}&client_id=${accessKey}`;

				fetch(apiUrl)
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						return response.json();
					})
					.then(data => {
						if (!Array.isArray(data)) {
							data = [data];
						}

						// Filter landscape images and add them to the fetchedImages array
						data.forEach(image => {
							if (image.width > image.height) {
								fetchedImages.push(image);
							}
						});

						// If fewer than the desired count, fetch more images
						if (fetchedImages.length < count) {
							let remainingCount = count - fetchedImages.length;
							fetchRandomImages(remainingCount, fetchedImages);
						} else {
							// Once we have enough images, render them
							renderImages(fetchedImages);
						}
					})
					.catch(error => {
						console.error('Error fetching random images:', error);
						document.getElementById('imageGallery').innerHTML = '<p>Error fetching random images. Please try again later.</p>';
					});
			}

			// Render the images in the gallery
			function renderImages(images) {
				let gallery = document.getElementById('imageGallery');
				gallery.innerHTML = ''; // Clear existing images

				images.forEach(image => {
					let imageUrl = image.urls.regular;
					let imageHtml = `
						<div id='imgbox'>
							<img class='img' src='${imageUrl}' alt='Random Image'>
							<div class='middle'>
								<div class='text'>
									${getBuyOrLoginLinks(imageUrl)}
									<br><a href='${imageUrl}' target='_self'>View</a>
								</div>
							</div>
						</div>`;
					gallery.innerHTML += imageHtml;
				});
			}

			// Function to return "Buy" or "Login" link based on session status
			function getBuyOrLoginLinks(imageUrl) {
				<?php if (isset($_SESSION['user_login']) || isset($_SESSION['adminUname'])) { ?>
					return `<a href='#'>Buy !</a>`;
				<?php } else { ?>
					return `<a href='#'>Login to buy!</a>`;
				<?php } ?>
			}
		</script>

		<script src="../Js/mouse.js"></script>
		<script src="../Js/dark-mode.js"></script>
	</body>
</html>
