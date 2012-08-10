<?php
	include 'includes/db.inc.php';
	$filename = $_GET['file'];
	unlink($filename);
	$sql = "DELETE FROM poster WHERE path_poster = '$filename'";
	mysqli_query ($link, $sql);
	header('Location: upload.php');
?>