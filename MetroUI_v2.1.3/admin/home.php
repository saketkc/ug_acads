<?php
session_start();
if(!isset($_SESSION['login'])){
	header("Location: index.php");
	die("You are not logged in. Please go to <a href='index.php'>login</a>");
}
$valid_ext = array("TXT","txt","htm","HTM","html","HTML","shtm","SHTM","shtml","SHTML","pl","PL","cgi","CGI","CSS","css","conf","CONF","ASP","asp","JSP","jsp","js","JS","php","PHP","php3","PHP3","PHTML","phtml","ini","INI","cfm","CFM","inc","INC");

function drawLinks($pages,$valid_ext){
	foreach($pages as $page){
		$page = substr($page,2);
    	$ext = substr(strrchr($page, '.'), 1);
		if (in_array($ext,$valid_ext) && is_writable("../".$page)) {
			echo '<a class="pageLink" title="Edit now!" href="edit.php?p='.'..'.$page.'">'.$page.'</a><br />';
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin Area - Overview</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/home.js"></script>
</head> 
<body>
<div id="wrapper">
	<h1><a href="home.php">Admin</a>  <a href="../" target='_blank' style='font-size:16px; margin-left:30px;'>Visit site</a></h1><a id="logoutLink" href="#" onclick='logout();'>Logout</a>
    <hr />
    <table width="100%"><tr valign="top"><td style='width:50%;'>
	<h2>Your Pages</h2>
	<?php
	//get all pages
	$directory = "../pages/";
	drawLinks(glob($directory . "*.*"),$valid_ext);
	?><br />
    <a href="#" id="newPage">New page</a>
    <div id="newPageWrapper"><em>The page will be made in /pages/ directory</em><br /><br />
      filename: <input id="newPageName" size="25"/><br /><br />
    <button id="newPageSubmit">Create</button><span id="newPageMsgbox"></span>
    </div>
    </td><td>
    <h2>Other Files</h2>
    <h3 style='margin-top:0px;'>Javascript</h3>
    <?php
	$directory = "../js/";
	drawLinks(glob($directory . "*.*"),$valid_ext);
	?>
    <br />
    <h3>CSS</h3>
    <?php
	$directory = "../css/";
	drawLinks(glob($directory . "*.*"),$valid_ext);
	?><br />
    <h3>Root</h3>
    <?php
	$directory = "../";
	drawLinks(glob($directory . "*.*"),$valid_ext);
	?><br />   
    <?php
	if(file_exists("../mobi/js/tiles-mob.js")){
		?>
	    <h3>Mobile plugin</h3>
	    <?php
		$directory = "../mobi/";
		drawLinks(glob($directory . "*.*"),$valid_ext);
		$directory = "../mobi/js/";
		drawLinks(glob($directory . "*.*"),$valid_ext);
		$directory = "../mobi/css/";
		drawLinks(glob($directory . "*.*"),$valid_ext);
	}
	?><br />
    <h3>Path</h3>
    <form id="goPathForm"><input id="goPathLink" size="50" /><button type="submit" id="goPathSubmit">Open</button></form>
    </td></tr></table>
    <hr />
    <h2>Compressing</h2>
    <em>This framework can compress and combine CSS and JS files. By compressing they have a smaller size and it makes your site faster to load. The framework caches the compressed files and wont make any changes to your original files, so you can edit them. When you've edited one of your pages you MUST flush the cache, otherwise, the script keeps using the old files. To enable caching, open config.php in the root folder and set $enableCompressionCss and $enableCompressionJs to true.</em>
    <br /><br />
    <button onclick="javascript:window.location.href='edit.php?p=../config.php'" >Open config file</button>
    <button id="flushCacheButton" >Flush cache!</button>
    <span id='flushMsgbox'></span>
</div>
<a id="footer" href="http://metro-webdesign.tk" target="_blank">©Thomas Verelst; for commercial use check http://metro-webdesign.info</a>
<!-- Please leave this line -->
</body>
</html>
