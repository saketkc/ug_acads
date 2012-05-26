<?php
session_start();
if(!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
require_once("connect.php");
$rowid=$_GET['id'];

$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());
mysql_select_db("$dbname") or die("Error conecting to db.");
$query="SELECT * FROM exam_file_data WHERE id='$rowid'";
$result =mysql_query($query);

	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
	$file = "/var/myuploads/".$row['examfilename'];
	if($row['examfileextension']=='pdf'){
		
		
		header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);

}

else {
$file = "/var/myuploads/".$row['examfilename'];
$image=imagecreatefromjpeg($file);
echo imagejpeg($image);
}
?>


