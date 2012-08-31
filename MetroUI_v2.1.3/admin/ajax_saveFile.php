<?php
session_start();
require_once("../config.php"); 
if($_SESSION['login']!=$adminLogin){
	die("It seems you're not logged in anymore. Changes NOT saved! Please save your content and reload this page.");
}
if(isset($_POST['file']) && isset($_POST['content'])){
	$handle = fopen($_POST['file'], "w") or die("Can't open file. Changes not saved!");
	if(get_magic_quotes_gpc()==1){
		$content=stripslashes($_POST['content']);
	}else{
		$content=($_POST['content']);
	}
 
	fwrite($handle, $content) or die("Can't write file. Changes not saved!");
	echo "yes";
}else{
	die("Something went wrong, try again or reload this page.");
}
?>