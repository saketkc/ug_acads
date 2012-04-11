<?php
session_start();
if (!isset($_SESSION['ldap_id'])){
	header("location: index.php");
}
$rowid=$_POST['rowid'];
$username = $_POST['username'];

//if("$username"=="$_SESSION['ldap_id']"){
$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());

mysql_select_db("bookbay") or die("Error conecting to db.");

$query= "DELETE FROM books WHERE id='$rowid'";
if(mysql_query($query)){
	mysql_close($db);
	echo "Deleted";
}

//}

?>
