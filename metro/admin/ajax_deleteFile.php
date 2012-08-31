<?php
session_start();
require_once("../config.php"); 
if($_SESSION['login']!=$adminLogin){
	die("It seems you're not logged in anymore. File NOT deleted! Try to reload this page.");
}
if(isset($_POST['file']) ){
	$file = $content=stripslashes($_POST['file']);  
	if(!file_exists($file)){
		die("Error: File doesn't exist!");
	}
	$handle = fopen($file,'r+');
	$content = fread($handle,filesize($file));
	fclose($handle);
	unlink($file);
	$nameArray = explode("/",$file);
	$name =end($nameArray);
	$url = 'trash/'.$name;
	$handle = fopen($url,'w+');
	fwrite($handle,$content);
	fclose($handle);
	echo "yes";
}
?>