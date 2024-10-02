<?php
	if (isset($_POST['tableSelect'])) {
		$table = $_POST['tableSelect'];

		if ($table === 'uploaded_files' && isset($_POST['fileSelect'])) {
			$file = $_POST['fileSelect'];

			$apiUrl = "http://127.0.0.1:8888/2210294_2210332/Server/Download_REST.php?file=" . urlencode($file);

			header("Location: $apiUrl");
			exit();
		} elseif (isset($_POST['formatSelect'])) {
			$format = $_POST['formatSelect'];

			$apiUrl = "http://127.0.0.1:8888/2210294_2210332/Server/Download_REST.php?table=" . urlencode($table) . "&format=" . urlencode($format);

			header("Location: $apiUrl");
			exit();
		} else {
			echo "Error: Missing required parameters!";
		}
	} else {
		echo "Error: No table selected!";
	}
?>
