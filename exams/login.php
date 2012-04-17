<?php
session_start();
require_once("functions.php");
if (isset($_POST['login']){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($username=="localhost" && $password=="thisisit"){
		$_SESSION['admin']=$username;
		header("location : upload.php");
	}
	else 
	
	{
		if (ldap_auth($username,$password)){
			$_SESSION['user']=$username;
			header("location : view.php");
		}
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Exams</title>
</head>
<body>
<form method="POST" action="login.php">
	<fieldset>
		<table>
			<tr><td>Login:</td><td><input type='text' name='login'></td></tr>
			<tr><td>Password</td><td><input type='password' name='password'></td></tr>
			<tr><td><td><input type='submit' value='Login' name='login' ></td></td></tr>
			
		</table>
	</fieldset>
</form>
</body>
</html>
