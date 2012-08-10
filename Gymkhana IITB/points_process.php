<?php
	include 'includes/db.inc.php';
	function error ($error)
	{
		echo $error;
		header ("Refresh: 1; URL = 'points.php'");
	}
	if (empty ($_POST['hostel']))
	{
		error ("Enter hostel number");
	}
	if (empty ($_POST['sports']))
	{
		error ("Enter sports GC points for $_POST['hostel']");
	}
	if (empty ($_POST['cult']))
	{
		error ("Enter cult GC points for $_POST['hostel']");
	}
	if (empty ($_POST['tech']))
	{
		error ("Enter tech GC points for $_POST['hostel']");
	}
	$hostel = $_POST['hostel'];
	$sports = $_POST['sports'];
	$cult = $_POST['cult'];
	$tech = $_POST['tech'];
	$sql = "UPDATE pointstally SET sports = $sports, cult = $cult, tech = $tech WHERE id = $hostel";
	mysqli_query($link, $sql);
	header("Location: points.php");
?>