<?php
session_start();
require_once("functions.php");
if (!(isset($_SESSION['ldap_id']))){
	header ("location: index.php");
}
if (!(is_registered($_SESSION['ldap_id'])){
	//header("location: register.php?redirect=apply.php");
	echo "login at <a href="/register.php">here</a>";
}
$username = $_SESSION['ldap_id'];
$department = $_POST['department'];
$preference_1= $_POST['preference_1'];
$preference_2= $_POST['preference_2'];
//$preference_3= '3';//$_POST['preference_3'];
$pref_1 = explode("-",$preference_1);
$preference_1 = $pref_1[1];

$pref_2 = explode("-",$preference_2);
$preference_2 = $pref_2[1];

//$pref_3 = explode("-",$preference_3);
$preference_3 = '3';//$pref_1[3];
if (!(is_registered($username))){
//add_new_student_application($username,$department,$preference_1,$preference_2,$preference_3);
$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());

mysql_select_db("ispa") or die("Error conecting to db.");
mysql_query("INSERT INTO user_data(ldap_id,department,preference1,preference2,preference3) VALUES('$username','$department','$preference_1','$preference_2','$preference_3')") or die (mysql_error());
mysql_close($db);
	}
else {
	$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());

mysql_select_db("ispa") or die("Error conecting to db.");

mysql_query("UPDATE user_data SET preference1='$preference_1',preference2='$preference_2',preference3='$preference_3' WHERE ldap_id='$username'");

echo "Updated Choices";


}
//echo $username.$department.$preference_1.$preference_2.$preference_3;
?>
