<?php
session_start();
if (isset($_SESSION['id'])){
    header("location: main.php");
}

//require_once 'functions.php';
$id = $_POST['username'];
$pass =$_POST['password'];


if ($id!="" && $pass!="")
{
if ($id=="admin" && $pass=="12345"){
	$_SESSION['id'] = $id;
	
		header("location: main.php");
	
	
	
}
else {
header("location: index.php?er=loginfailed");
}
}



if (isset($_SESSION['id'])){

	
}
else {
	$username='';
}

if(isset($_GET['er']))
{
	if($_GET['er'] == "loginfailed" ) { $error= "Login Failed" ;}
	if($_GET['er'] == "wrong" ) { $error= "Invalid Roll no. or password" ;}
	if($_GET['er'] == "complete" ) { $error= "Voted! " ;}
	$error=$_GET['er'];
}
if(isset($_GET['logout'])){
	
	session_destroy();
        
    
}


?>
<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Student Fine Portal, IIT Bombay </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Amit" >

   <!--  Le styles-->
    <link href="css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      } 
    </style> 
  

	 <script type="text/javascript" src="js/jquery.js"></script>
	 
	 
	 
	<script type="text/javaScript" src="js/bootstrap-dropdown.js"></script>
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="css/main.css" rel="stylesheet">
<script type="text/javascript">
	    $('.dropdown-toggle').dropdown();
</script>

</head>
<body>
<?php 
include('menu.php');
?>
<div class="container-fluid">
		<div class="row-fluid">
<span id="heading"><h2>Login</h2></span>
<hr>
    <form class="form-horizontal" method="post" action="index.php">
    <div class="control-group">
    <label class="control-label" for="inputEmail">ID</label>
    <div class="controls">
    <input type="text" id="inputEmail" placeholder="ID" name="username">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" id="inputPassword" placeholder="Password" name="password">
    </div>
    </div>
<?php echo $error?>

    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn">Sign in</button>
    </div>
    </div>
    </form>
</body>
</html> 
