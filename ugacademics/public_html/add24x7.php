<?php
session_start();
require_once("functions.php");
require_once("connect.php");
if (isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
if (!(ldap_auth($username,$password))){
header("location: index.php?err=1");
}
}
if (!(isset($_POST['login']) && (!isset($_SESSION['user']))){
location("header: index.php");
}


?>
<?php include 'include/header.php' ?>
	<div id="content" class="bgnavcolor">
        <?php include 'include/sidebar.php' ?>
        <div id="main_content" class="white" width="760">
        	<h1>24x7 Webistes</h1>
            <div class="content_text">
	<form method="POST" action="add24x7.php">
<fieldset>
<table>
<tr><td>LDAP ID</td><td><input type="text" name="login"></td></tr>
<tr><td>Password</td><td><input type="password" name="password"></td></tr>
<tr><td><td><input type="submit" name="login" value="login"></td></td></tr>
</table>
</fieldset>
</form>
            </div>
        </div>
    </div>
<?php include 'include/footer.php' ?>
