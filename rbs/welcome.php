<?php
session_start();
if(!session_is_registered('id')){
header("location:login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>SAC Room Booking System</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="script.js"></script>

</head>

<body style="font-family:sans-serif;">
<div id="base">
</div>
<a href="logout.php" style="text-decoration:none; cursor:pointer; color:#ffffff;"><b><i>Logout</i></b></a></br>
<?php
echo $_SESSION['popup'];
?>
<div id="bigcontent">

<div id="contentleft">
<?php include("form.php"); ?>
</div>
<div id="contentright">
<?php include("display.php");?>
</div>

</div>

<!--<a href="logout.php" style="border:0; text-decoration:underline; opacity:0.5; color:#000000; font-weight:bold; width:75px; height:50px; cursor:pointer;">Logout</a>-->


</body>
</html>