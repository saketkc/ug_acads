<?php
session_start();
require_once("../config.php"); 
if($_SESSION['login']!=$adminLogin){
	die("It seems you're not logged in anymore. Flushing failed.");
}
$handle = fopen("../compress/compressed.css","w") or die("Can't flush cache of css files");
fclose($handle);
unlink("../compress/compressed.css")  or die("Can't flush cache of css files");
$handle = fopen("../compress/compressed.js","w") or die("Can't flush cache of javascript files");
fclose($handle);
unlink("../compress/compressed.js")  or die("Can't flush cache of javascript files");
if(file_exists("../compress/compressed-mob.css")){
	$handle = fopen("../compress/compressed-mob.css","w") or die("Can't flush cache of css files  for mobile version");
	fclose($handle);
	unlink("../compress/compressed-mob.css")  or die("Can't flush cache of css files for mobile version");
}
if(file_exists("../compress/compressed-mob.js")){
	$handle = fopen("../compress/compressed-mob.js","w") or die("Can't flush cache of javascript files for mobile version");
	fclose($handle);
	unlink("../compress/compressed-mob.js")  or die("Can't flush cache of javascript files for mobile version");
}
if(file_exists("../compress/no-js-mob.txt")){/*FLUSH NO-JS CACHE / ONLY FOR MOBILE VERSION */
	$handle = fopen("../compress/no-js-mob.txt","w") or die("Can't flush cache of javascript files for mobile version");
	fclose($handle);
	unlink("../compress/no-js-mob.txt")  or die("Can't flush cache of javascript files for mobile version");
}
echo "yes";
?>