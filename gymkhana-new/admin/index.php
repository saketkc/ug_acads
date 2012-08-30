<?php
session_start();

require_once("functions.php");
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (admin_login($username,$password)){
		$_SESSION['username'] = $username;
		header("location: addposter.php");

	}
	else {
		$message = "Error Logging in ";
	}
}
?>
<html>
<body>
<form method="POST" action="">
	<?php echo $message; ?>
	<fieldset>
		<label>Username</label>
		<div><input type="text" name="username" id="username"></div>
		<br/>
		<label>Password</label>
		<div><input type="password" name="password" id="password"></div>
		<br/>
		<input type="submit" name="login" value="login">
	</fieldset>
</form>
</body>
</html>

