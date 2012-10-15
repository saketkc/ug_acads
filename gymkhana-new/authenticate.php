<?php
require_once("functions.php");
$ldap = $_POST['sub-email'];
$password = $_POST['sub-password'];
if(ldap_auth($ldap,$password){
	$array = array('authenticate' => true)
	return json_encode($array);
}

else {
	$array = array('authenticate' => false)
	return json_encode($array);
}
}
?>
