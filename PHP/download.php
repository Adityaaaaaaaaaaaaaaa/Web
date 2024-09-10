<?php
	// Ensure the user has selected a table and format or a file
	if (isset($_POST['tableSelect'])) {
		$table = $_POST['tableSelect'];

		// Check if the user selected 'uploaded_files'
		if ($table === 'uploaded_files' && isset($_POST['fileSelect'])) {
			$file = $_POST['fileSelect'];

			// Construct the URL for the REST API to download the file
			$apiUrl = "http://127.0.0.1:8888/2210294_2210332/Server/Download_REST.php?file=" . urlencode($file);

			// Redirect to the API to handle the file download
			header("Location: $apiUrl");
			exit();
		} elseif (isset($_POST['formatSelect'])) {
			$format = $_POST['formatSelect'];

			// Construct the URL for the REST API to fetch data in the selected format
			$apiUrl = "http://127.0.0.1:8888/2210294_2210332/Server/Download_REST.php?table=" . urlencode($table) . "&format=" . urlencode($format);

			// Redirect to the API
			header("Location: $apiUrl");
			exit();
		} else {
			echo "Error: Missing required parameters!";
		}
	} else {
		echo "Error: No table selected!";
	}
?>
