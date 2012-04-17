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
	
	$file = "/var/myuploads/".$row['consentfilename'];
	if($row['consentfileextension']=='pdf'){
		
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Length: ' . filesize($file));

// to open in browser
		//header('Content-Disposition: inline; filename=' . basename($file));
		header('Content-Disposition: attachment; filename=' . basename($file));
}
// to download
// header('Content-Disposition: attachment; filename=' . basename($file));

	//readfile($file); /* or use include($file);} */
	
//}
else {
$file = "/var/myuploads/".$row['consentfilename'];
$image=imagecreatefromjpeg($file);
echo imagejpeg($image);


}
?>


