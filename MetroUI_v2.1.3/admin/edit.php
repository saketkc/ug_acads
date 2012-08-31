<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: index.php");
	die("You are not logged in. Please go to <a href='index.php'>login</a>");
}
$error = '';
if(isset($_GET['p'])){
	if(file_exists($_GET['p'])){
		if(filesize($_GET['p']) ==0){
			$content = "<em>The file has no content yet!</em><br> <textarea id='editText' wrap='off'></textarea>";
		}else{
			$handle = fopen($_GET['p'], "r+") or die("Can't open file");
			$content = "<textarea id='editText' wrap='off'>".fread($handle,filesize($_GET['p']))."</textarea>";
		}
	}else{
		$error = "File not found. Please go to <a href='index.php'>Index</a>";
	}
}else{
	$error =  "No file specified. Please go to <a href='index.php'>Index</a>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin Area - Edit file</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/edit.css" />
    <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>file = '<?php echo $_GET['p']?>';</script>
	<script type="text/javascript" language="javascript" src="js/edit.js"></script>
</head> 
<body>
	<div id="wrapper">
		<h1><a href="home.php">Admin</a>  <a href="../" target='_blank' style='font-size:16px; margin-left:30px;'>Visit site</a></h1>
        <a id="logoutLink" href="#" onclick='logout();'>Logout</a>
        <hr />
		<h2>Edit <em><?php echo $_GET['p']?></em><button type="submit" id="deleteButton">Delete!</button></h2><br />
		<?php
        if($error == ''){//no errors
			echo $content;
            ?>
            <br /><br />
			<span>
            	Tab-size input:<input id="tabsize" value="4" size="1" />
            	<font size="-1">(default: 8, recommend: 4)</font>
	            <em>Only works in Firefox and Opera</em>
	        </span>
	        <span id="saveWrapper">
            	<span id="msgbox"></span>
            	<button type="submit" id="saveButton">Save!</button>          
            </span>
            <?Php
		}else{
			echo $error;
		}?>
	</div>
 	<a id="footer" href="http://metro-webdesign.tk" target="_blank">©Thomas Verelst; for commercial use check http://metro-webdesign.info</a>
</body>
</html>
