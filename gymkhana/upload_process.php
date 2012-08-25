<?php
	include 'includes/db.inc.php';
	function error ($error, $location, $seconds = 1)
	{
		header ("Refresh: $seconds; URL = \"$location\"");
		echo $error;
		exit;
	}
	$max_file_size = 2097152;
	$current_directory = str_replace(basename($_SERVER['PHP_SELF']) , '' , $_SERVER['PHP_SELF']);
	$upload_form = 'http://' . $_SERVER['HTTP_HOST'] . $current_directory . 'upload.php';
	$fieldname = 'image';
	$category = $_POST['category'];
	if ($category == '0')
	{
		error ("No category chosen", $upload_form);
	}
	if (!(($category == 'hostel') || ($category == 'misc')))
	{
		$subcat = $_POST['subcat'];
		if ($subcat == '0')
		{
			error ("No sub-category chosen", $upload_form);
		}
		$uploaded_directory = $_SERVER ['DOCUMENT_ROOT'] . $current_directory . 'posters/' . $category . '/' . $subcat . '/';
		$path = 'posters/' . $category . '/' . $subcat . '/';
	}
	else
	{
		$uploaded_directory = $_SERVER ['DOCUMENT_ROOT'] . $current_directory . 'posters/' . $category . '/';
		$path = 'posters/' . $category . '/';
	}
	if ((empty ($_POST['location'])) || (empty ($_POST['year'])) || (empty ($_POST['contact'])))
	{
		error ("Enter all details", $upload_form);
	}
	$location = $_POST['location'];
	$eventdate = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
	echo $eventdate;
	$contact = $_POST['contact'];
	$errors = array (1 => "Max file size exceeded", 2 => "Max file size exceeded", 3 => "Upload incomplete", 4 => "No file attached");
	isset ($_POST['submit']) or error ("Redirecting to upload form", $upload_form);
	($_FILES[$fieldname]['error'] == 0) or error ($errors[$_FILES[$fieldname]['error']], $upload_form);
	@is_uploaded_file($_FILES[$fieldname]['tmp_name']) or error ("Not an HTTP upload", $upload_form);
	@getimagesize($_FILES[$fieldname]['tmp_name']) or error ("Please upload only images", $upload_form);
	if (file_exists($uploaded_directory . str_replace(' ', '_', $_FILES[$fieldname]['name'])))
	{
		error ("File exists", $upload_form);
	}
	$uploadedfile = $_FILES[$fieldname]['tmp_name'];
	$image = getimagesize($uploadedfile);
	if (($image['mime'] == 'image/jpeg') || ($image['mime'] == 'image/pjpeg'))
	{
		$src = imagecreatefromjpeg($uploadedfile);
	}
	else if ($image['mime'] == 'image/gif')
	{
		$src = imagecreatefromgif($uploadedfile);
	}
	else if ($image['mime'] == 'image/png')
	{
		$src = imagecreatefrompng($uploadedfile);
	}
	list($width,$height)=getimagesize($uploadedfile);
	$newwidth = 400;
	$newheight = 400;
	$tmp = imagecreatetruecolor ($newwidth, $newheight);
	imagecopyresampled ($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg ($tmp, $uploaded_directory . str_replace(' ', '_', $_FILES[$fieldname]['name']), 100);
	imagedestroy($src);
	imagedestroy($tmp);
	$path = $path . str_replace(' ', '_', $_FILES[$fieldname]['name']);
	echo $path;
	$sql = "INSERT INTO poster (path_poster, category, subcat, location, event_date, contact) VALUES ('$path', '$category', '$subcat', '$location', '$eventdate', '$contact')";
	mysqli_query ($link, $sql);
	header ("Location: " . $upload_form);
?>