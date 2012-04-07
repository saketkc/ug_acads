<?php
session_start();
require_once("functions.php");
if (!isset($_POST['username']) or !isset($_POST['password'])){
	
header("location: index.php?er=12");

}
$ldap_id = cleanQuery($_POST['username']);
$ldap_password = cleanQuery($_POST['password']);

if (ldap_auth($ldap_id,$ldap_password)){
	$_SESSION['ldap_id'] = $ldap_id;
	if (is_registered($ldap_id))
	{
		$_SESSION['registered']=$ldap_id;
		header("location: add.php");
	}
	else {
		header("location: register.php");
	}
	
	
}
else {
echo "Login Failed";
}
?>
