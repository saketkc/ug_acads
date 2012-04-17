<?php
session_start();
require_once("connect.php");
$rowid=$_GET['id'];

$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());
mysql_select_db("$dbname") or die("Error conecting to db.");
$query="SELECT * FROM exam_file_data WHERE id='$rowid'";
$result =mysql_query($query);
//while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	print_r($row);
	if($row['extension']=='pdf'){
		
		$file = $row['filename'];
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Length: ' . filesize($file));

// to open in browser
		//header('Content-Disposition: inline; filename=' . basename($file));
		header('Content-Disposition: attachment; filename=' . basename($file));
}
else if($row['extension']=="jpeg" || $row['extension']=="jpeg" || $row['extension']=="jpg" ||$row['extension']=="bmp") {
header("Content-Type: image/$row['extension']");
$_file = $row['filename']; // or $_GET['img']
echo file_get_contents('/var/myuploads/'.$_file);
}
?>


