<?php
session_start();
require_once("functions.php");
if (!isset($_POST['username']) or !isset($_POST['password'])){
	
header("location: index.php?er=loginfailed");

}
$ldap_id = $_POST['username'];
$ldap_password = $_POST['password'];
if ($ldap_id!="" && $ldap_id!="")
{
if (ldap_auth($ldap_id,$ldap_password)){
	$_SESSION['ldap_id'] = $ldap_id;
	if (is_registered($ldap_id))
	{
		$_SESSION['registered']=$ldap_id;
		header("location:view.php");
	}
	else {
		header("location: register.php");
	}
	
	
}
else {
header("location: index.php?er=loginfailed");
}
}
else{
	header("location: index.php?er=loginfailed");
}
	
?>
