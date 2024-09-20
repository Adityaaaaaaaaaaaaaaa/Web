<?php
session_start();

	// Check for responses in the URL parameters
	if (isset($_GET['userdatafile'])) {
		$userdatafile_response = $_GET['userdatafile'];
	} else {
		$userdatafile_response = "Select File to upload<br>Note: Error code X = No file was uploaded/Array Empty.";
	}

	if (isset($_GET['otherfile'])) {
		$otherfile_response = $_GET['otherfile'];
	} else {
		$otherfile_response = "Note: Experiemntal - Upload Small Files < 3500 Kb<br> Large Files timeout the connection<br>php.ini file not configured!";
	}

	if (!isset($_SESSION['adminUname'])) {
		echo ' <!-- jQuery -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				<!-- XSAlert CSS -->
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/themes/light-theme.css">
				<!-- XAlert core JS -->
				<script src="https://cdn.jsdelivr.net/gh/frankeno/xsalert@main/src/xsalert.js"></script>
				<script>
				XSAlert({
					title: "Sneaking in?",
					message: "You know what to do",
					icon: \'error\',
					hideCancelButton: true,
					closeOnOutsideClick: false,
					hideOkButton: true,
					closeWithESC: false,
					footer: \'<a href="../home.php">Home</a>\'
				})
			</script>';
	}
?>

<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Dashboard</title>
		<link rel="stylesheet" type="text/css" href="../CSS/home.css">
		<link rel="stylesheet" href="../CSS/admin style.css">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
		<script>
			window.onload = function() {
				var mainContent = document.querySelector(".main");
				mainContent.style.opacity = "1";
			};
		</script>

	</head>
	<body>

		<?php include "../Webpages/Header.php"; ?>


		<div class="main fade-in">

            <div id="adminDash">
                <div class="Maintext">
                    <h1>Admin Dashboard</h1>

                    <div class="dashboard-section">
                        <p><h2>Welcome, <?php
											if((isset($_SESSION['adminUname']))){
												// If logged in, show "logout" link
												echo $_SESSION['adminUname'];
											}
										?>
							&#128150;</h2>
						</p>
                        <p>Stats below, Enjoy!</p>
                    </div><br><br>

                    <div id="formAdmin">
						<p id="stats">Use the drop-down menu to view more results: </p>
                        <form id="thisOne" name="theForm" action="../PHP/adminData.php" method="POST">
                            <div id="tableData">
                                <select id="tableList" name="tablex">
                                    <option value="client">Client Information</option>
                                    <option value="reservation">Reservations</option>
                                    <option value="inquiry">Inquiries</option>
                                    <option value="feedback">Feedback</option>
									<option value="uploaded_files">Files</option>
                                </select><br><br>
                                <button id="displayDataBtn">Display Data</button>
                            </div><br><br>
                        </form>
                    </div>

                </div>
            </div>

			<!-- file upload -->
			<div class="database">
				<!-- Upload Form -->
				<div class="update-form">
					<div class="form-container">
						<form action="../PHP/upload.php" method="POST" enctype="multipart/form-data">
							<label for="userdatafile">Select User Data File (XML only):</label>
							<input type="file" class="inputx" name="userdatafile[]" id="userdatafile" multiple> 
							<label for="otherfile">Select Other File:</label>
							<input type="file" class="inputx" name="otherfile[]" id="otherfile" multiple>
							<button type="submit" class="subbutton" name="submit" onsubmit="UploadStatus()">Upload</button>
							<br>
							<!-- Div to display upload response -->
							<div id="uploadResponse">
								<p><?php echo $userdatafile_response; ?></p>
								<p><?php echo $otherfile_response; ?></p>
							</div>
						</form>
					</div>
				</div>

				<form action="../PHP/download.php" method="post" id="downloadForm">
					<label for="tableSelect">Select Table:</label>
					<select name="tableSelect" id="tableSelect" class="inputx">
						<option value='x'>Select a table below</option>
						<?php
						include '../PHP/Taketwoconnect.php';
						// Fetch the list of tables from your database
						$query = "SHOW TABLES";
						$result = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_array($result)) {
							$tableName = $row[0];
							// Exclude the "uploaded_files" table from the options
							if ($tableName != "uploaded_files") {
								echo "<option value='$tableName'>$tableName</option>";
							} else {
								echo "<option value='$tableName'>$tableName</option>";
							}
						}
						?>
					</select>

					<!-- Hidden div to contain download options -->
					<div id="downloadOptions" class="inputx" style="display: none;">
						<label for="formatSelect">Select Format:</label>
						<select name="formatSelect" id="formatSelect" class="inputx">
							<option value="xml">XML</option>
							<option value="csv">CSV</option>
							<option value="json">JSON</option>
						</select>
					</div>

					<!-- Dropdown for uploaded files -->
					<div id="fileOptions" class="inputx" style="display: none;">
						<label for="fileSelect">Select File:</label>
						<select name="fileSelect" id="fileSelect" class="inputx">
							<!-- Options will be loaded dynamically using PHP -->
						</select>
					</div>

					<button type="submit" name="download" onclick="downloadFile()">Download</button>

					<div id="message" style="display: none;"></div>
				</form>
			</div>
		</div>

		<!-- Download DOM and PHP -->
		<script>
			document.getElementById("tableSelect").addEventListener("change", function() {
				var selectedTable = this.value;
				var downloadOptions = document.getElementById("downloadOptions");
				var fileOptions = document.getElementById("fileOptions");

				if (selectedTable === "x") { // Assuming "x" represents the default option
					downloadOptions.style.display = "none";
					fileOptions.style.display = "none"; // Hide file options as well
				} else if (selectedTable === "uploaded_files") {
					downloadOptions.style.display = "none";
					fileOptions.style.display = "block";
				} else {
					downloadOptions.style.display = "block";
					fileOptions.style.display = "none";
				}
			});

			document.addEventListener("DOMContentLoaded", function() {
				fetch("../PHP/get_uploaded_files.php")
				.then(response => response.json())
				.then(data => {
					var fileSelect = document.getElementById("fileSelect");

					// Add options to the fileSelect dropdown
					data.forEach(file => {
						var option = document.createElement("option");
						option.setAttribute("value", file);
						option.textContent = file;
						fileSelect.appendChild(option);
					});
				})
				.catch(error => console.error('Error fetching uploaded files:', error));
			});
		</script>

		<!-- upload ajax request -->
		<script>
			$(document).ready(function() {
				$('#uploadForm').submit(function(e) {
					e.preventDefault(); // Prevent the form from submitting normally
					
					// Create a FormData object to store the form data
					var formData = new FormData(this);
					
					// Send an AJAX request to upload.php
					$.ajax({
						type: 'POST',
						url: '../PHP/upload.php',
						data: formData,
						dataType: 'json',
						processData: false,
						contentType: false,
						success: function(response) {
							// Display the response message
							$('#uploadResponse').text(response.response);
						},
						error: function(xhr, status, error) {
							console.error(xhr.responseText);
						}
					});
				});
			});
		</script>

		<?php include '../Webpages/Footer.php'; ?>
	</body>
</html>	