<?php
$id = $_GET['id'];
require_once("connect.php");
$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());
mysql_select_db("$dbname") or die("Error conecting to db.");
$result=mysql_query("SELECT * FROM projects where id='$id'");
$results=mysql_fetch_array($result);
$info="<strong>Prof Name:</strong> ".$results["prof_name"]."<br/><br/>"."<strong>Project Title:</strong> ".$results["project_title"]."<br/><br/><strong>Project Description:</strong> ".$results["project_description"]."<br/><br/><strong>Eligibility Criteria:</strong> ".$results["eligibility_criteria"]."<br/><br/><strong>Duration:</strong> ".$results["duration"]."<br/><br/><a  href='#' onClick='parent.jQuery.fancybox.close();'>Close This Window</a>";
mysql_close($db);
echo $info;

?>
