<?php
session_start();
if(isset($_SESSION['login'])){
	header("Location: home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Area - Login</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
</head> 
<?php
$errors = '';
if(isset($_POST['metro_login'])){
	require_once("../config.php");
	if($_POST['metro_login'] == $adminLogin && $_POST['metro_password'] == $adminPassword){
		$_SESSION['login'] = $adminLogin;
		header('Location: home.php');
	}else{
		$errors = 'Wrong login or password';
	}
}
 ?>
<body>
	<div id="loginWrapper">
	<h1>Login</h1>
	<form method="post" action=''>
	<table>
	<tr><td>Login: </td><td><input type="text" name="metro_login" /></td></tr>
	<tr><td>Password: </td><td><input type="password" name="metro_password"/></td></tr>
	<tr height="50"><td></td><td><button type="submit"/>Login</button></td></tr>
	</table>
    <?php echo $errors?>
	</form>
	</div>
    <a id="footer" href="http://metro-webdesign.tk" target="_blank">©Thomas Verelst; for commercial use check http://metro-webdesign.info</a>
</body>
</html>
