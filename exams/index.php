<?php
session_start();
require_once("functions.php");
if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if($username=="localhost" && $password=="thisisit"){
		$_SESSION['admin']="localhost";
		
		header("location: fill.php");
	}
	else 

	{
		if (ldap_auth($username,$password)){
			$_SESSION['ldap_id']=$username;
			header("location: view.php");
		}
		else {
			echo "DASSSSSSS";
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
<form method="POST" action="index.php">
	<fieldset>
		<table>
			<tr><td>Login:</td><td><input type='text' name='username'></td></tr>
			<tr><td>Password</td><td><input type='password' name='password'></td></tr>
			<tr><td><td><input type='submit' value='Login' name='login' ></td></td></tr>
			
		</table>
	</fieldset>
</form>
</body>
</html>
