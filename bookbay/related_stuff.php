<?php

/*$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());
mysql_select_db("bookbay") or die("Error conecting to db.");
$result = mysql_query("SELECT COUNT(*) AS count FROM users");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
*/
$id = $_GET['id'];
echo $id;
?>
