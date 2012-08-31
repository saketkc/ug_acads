<?php
$link = mysqli_connect('localhost', 'root', 'fedora');
	if (!$link)
	{
		$error = "Unable to connect to the database server";
		include 'error.html.php';
		exit ();
	}
	if (!mysqli_set_charset ($link, 'utf8'))
	{
		$error = "Unable to set database connection encoding";
		include 'error.html.php';
		exit ();
	}
	if (!mysqli_select_db ($link, 'iitb'))
	{
		$error = "Unable to locate the IIT Bombay database";
		include 'error.html.php';
		exit ();
	}
?>
