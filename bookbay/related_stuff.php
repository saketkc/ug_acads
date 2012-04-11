<?php
$id = $_GET['id'];
$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());
mysql_select_db("bookbay") or die("Error conecting to db.");
$result=mysql_query("SELECT * FROM books where id='$id'");
$results=mysql_fetch_array($result);
$created_by = $results["created_by"];
$result=mysql_query("SELECT * FROM users where username='$created_by'");
$results=mysql_fetch_array($result);
$info="Name:".$results["fullname"]."<br/>"."Hostel:".$results["hostel"]."/".$results['room']."<br/>Email:".$results["email"].",".$results["alt_email"]."<br/>Mobile:".$results["mobile"]."<br/><a  href='#' onClick='parent.jQuery.fancybox.close();'>Close This Window</a>";
echo $info;
?>
