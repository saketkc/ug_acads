<?php 
$host = "localhost";
$user = "ugacademics";
$pass = "ug_acads";
$db = "ugacademics";
$r = mysql_connect($host, $user, $pass);

if (!$r)
{
echo "Could not connect to server</br>";
trigger_error(mysql_error(), E_USER_ERROR);
}

	mysql_select_db($db) or die(mysql_error());
	
?>