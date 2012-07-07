<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['ldap_id'])){
	$username = $_SESSION['ldap_id'];
}
else {
	$username='';
}
require_once("logininfo.php");
if(isset($_GET['er']))
{
	if($_GET['er'] == "loginfailed" ) { $error= "Login Failed" ;}
	if($_GET['er'] == "wrong" ) { $error= "Invalid Roll no. or password" ;}
	if($_GET['er'] == "complete" ) { $error= "Voted! " ;}
	
}
if(isset($_GET['logout'])){
	
	session_destroy();
}
$link = mysql_connect($db_hostname, $db_username, $db_password) or die ("Not able to connect" . mysql_error());
mysql_select_db($db_database, $link) or die ("Query for database failed : " . mysql_error());
$time = date("Y-m-d H:i:s");

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Enter your choices here.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="main.css">
        <style>
            html{
                height:100%;
                
            }
            body{
                height:100%;
            }
        </style>
        
    </head>
    <body>
        <div class="container-fluid" id="container">
            <div class="row-fluid" id="top">
        <!--Rainbow band-->
            </div>
            <div class="row-fluid" id="loginmain">
                <div class="spanhalf" id="loginsidebar"></div>
                

         
                <div class="span6 offset4" id="loginmain2">
                    <div id="space"></div>
                    <div id="loginmain3">
                     <form class="form-horizontal" id="loginform" method="post" action="login.php">  
        <fieldset>
          <p id="r4">Login to Enter your choices</p><hr> 
          <p id="r1"></p>
          <br>
          <div class="control-group">  
            <label class="control-label" for="input01" id="r1">LDAP ID</label>  
            <div class="controls">  
              <input type="text" class="input-small" placeholder="LDAP ID" name="username">  
              <p class="help-block" id="r2">Enter your LDAP ID.</p>  
            </div>  
          </div>   
          <div class="control-group">  
            <label class="control-label" for="input01" id="r1">Password</label>  
            <div class="controls">  
              <input type="password" class="input-small" placeholder="Password" name="password">  
              <p class="help-block" id="r2">Enter your LDAP password.</p>  
            </div>  
          </div>  
          <?php echo $error?>
            <div id="submitbutton">  
            <button type="submit" class="btn btn-primary" value="Login">Login</button>  
            <br>
          </div>  
        </fieldset>  
</form>      
                </div>
                </div>
            </div>
        </div>
       
    </body>
</html>
