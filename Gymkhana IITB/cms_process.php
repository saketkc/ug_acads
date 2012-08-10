<?php
	include 'includes/db.inc.php';
	$ldap_id = $_POST['ldapuser'];
	$ldap_pwd = $_POST['password'];
	$hostel = $_POST['hostel'];
	$roomno = $_POST['room'];
	$category = $_POST['category'];
	$subject = $_POST['subject'];
	$complaint = $_POST['complaint'];
	if ($ldap_id == '' || $ldap_pwd == '')
	{
		echo "Please enter your LDAP details";
		header ("Refresh: 1; URL = 'cms.php'");
	}
	if ($hostel == '' || $roomno == '' || $category == '' || $subject == '' || $complaint == '')
	{
		echo "We hate spam. Please fill up all details :)";
		header ("Refresh: 2; URL = 'cms.php'");
	}
	$ds = ldap_connect("ldap.iitb.ac.in") or die ("Unable to connect to LDAP server. Please try again later.");
	if ($ldap_id == '') 
	{
		die ("You have not entered any LDAP ID. Please go back and fill it up.");
	}
	$sr = ldap_search ($ds, "dc=iitb,dc=ac,dc=in", "uid=$ldap_id");
	$info = ldap_get_entries ($ds, $sr);
	$ldapid = $info[0]['dn'];
	if (@ldap_bind ($ds, $ldapid, $ldap_pwd))
	{
		if ($hostel == '15')
		{
			$sql = "INSERT INTO cms (ldapid, hostel, roomno, category, subject, complaint) VALUES ('$ldap_id', 'Tansa', $roomno, '$category', '$subject', '$complaint')";
			echo "Database entry made";
		}
		else
		{
			$sql = "INSERT INTO cms (ldapid, hostel, roomno, category, subject, complaint) VALUES ('$ldap_id', '$hostel', $roomno, '$category', '$subject', '$complaint')";
		}
		mysqli_query ($link, $sql);
		echo ("Your complaint has been received. This page will be redirected automatically");
		header ("Refresh: 3; URL = 'cms.php'");
	}
	else
	{
		echo "LDAP Authentication Problem. Please check your credentials.";
		header ("Refresh: 1; URL = 'cms.php'");
	}
?>