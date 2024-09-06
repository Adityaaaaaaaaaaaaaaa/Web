<?php
session_start();
session_unset();
session_destroy();
header("Location: http://127.0.0.1:8888/2210294_2112852/home.php"); // Redirect to the home
exit();
?>
