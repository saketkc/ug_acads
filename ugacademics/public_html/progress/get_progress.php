<?php
session_start();
error_reporting(0);

// For PHP 5.4 users
$progress_key = ini_get("session.upload_progress.prefix")."uploadImage";	// uploadImage is a Form name
$current = $_SESSION[$progress_key]["bytes_processed"];
$total = $_SESSION[$progress_key]["content_length"];
echo $current < $total ? ceil($current / $total * 100) : 100;


/*// For PHP 5.2+ php_apc.dll or php_apc.so holder
if(isset($_GET['progress_key']) and !empty($_GET['progress_key'])){	
	$status = apc_fetch('upload_'.$_GET['progress_key']); 	
    echo $status['current']/$status['total']*100;
	exit;
}*/
?>
