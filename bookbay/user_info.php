<?php
require_once("connect.php");
$id = $_GET['id'];
$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());
mysql_select_db("$dbname") or die("Error conecting to db.");
$result=mysql_query("SELECT * FROM users where id='$id'");
$results=mysql_fetch_array($result);
$info="Name:".$results["fullname"]."<br/>"."Hostel:".$results["hostel"]."/".$results['room']."<br/>Email:".$results["email"].",".$results["alt_email"]."<br/>Mobile:".$results["mobile"]."<br/><a  href='#' onClick='parent.jQuery.fancybox.close();'>Close This Window</a>";
echo $info;
?>

