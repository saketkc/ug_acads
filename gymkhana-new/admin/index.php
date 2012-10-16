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





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gymkhana, IIT Bombay </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Amit" >

   <!--  Le styles-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/flip.css" rel="stylesheet">
    <link href="css/html5.css" rel="stylesheet">
<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      } 
    </style> 
  

	 <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javaScript" src="../js/bootstrap-dropdown.js"></script>
	 
	
	 
		<link href="../static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	 
	
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	
	<link rel="apple-touch-icon-precomposed" href="">
	<link href="../css/main.css" rel="stylesheet">


	
<title> Admin </title>
</head>


<body>
     <?php 
include('../menu.php');
?>
     <div class="container-fluid">
      <div class="row-fluid">
        
        <div class="span9">
          <div class="hero-unit">
           <div class="clearfix">
           <div id="adminform">
			<form method="POST" action="">
	<?php echo $message; ?>
	<fieldset>
		<label>Username</label>
		<div><input type="text" name="username" id="username"></div>
		<br/>
		<label>Password</label>
		<div><input type="password" name="password" id="password"></div>
		<input type="hidden" name="category"
		<br/>
		<input type="submit" class="btn btn-large btn-primary" name="login" value="Login" id="button-subscribe">
	</fieldset>
</form>
					
</div>
					
					
		</div>				
           
          </div>
          
          
        </div><!--/span-->
       	
        <div class="span3">
         <!-- <div class="well sidebar-nav" id="rsidebar">
            <ul class="nav nav-list">

         <a href="#" id="ug"><div id="sidetileo" >   <div id="sidetile" style="background-color:#00AEDB;"> <h2>UG Academics</h2></div></div></a>
            <div id="sidetilespace"></div>
   <a href="#cult" id="cult" ><div id="sidetileo">   <div id="sidetile" style="background-color:#00B159;"><h2>Cultural</h2></div></div></a>

<div id="sidetilespace"></div>
          <a href="#sports" id="sports"><div id="sidetileo">   <div id="sidetile" style="background-color:#F37735;"><h2>Sports</h2></div></div></a>
<div id="sidetilespace"></div>
           <a href="#tech" id="tech"><div id="sidetileo">   <div id="sidetile" style="background-color:#EC098C;"><h2>Technical</h2></div></div></a>
<div id="sidetilespace"></div>
            <a href="hostel" id="hostel"><div id="sidetileo">   <div id="sidetile" style="background-color:#7C4199;"><h2>Hostel</h2></div></div></a>
<div id="sidetilespace"></div>
           <a href="#pg" id="pg" ><div id="sidetileo">   <div id="sidetile" style="background-color:#FFC425;"><h2>PG Academics</h2></div></div></a>
            
           
            </ul>
          </div>   --><!--/.well -->
        </div><!--/span-->
        
        
        
        
      </div><!--/row-->
    </div><!--/.fluid-container-->




    <script type="text/javaScript" src="js/bootstrap.js"></script>
    <script type="text/javaScript" src="js/bootstrap-transition.js"></script>
    <script type="text/javaScript" src="js/bootstrap-alert.js"></script>
    <script type="text/javaScript" src="js/bootstrap-modal.js"></script>
    <script type="text/javaScript" src="js/bootstrap-dropdown.js"></script>
    <script type="text/javaScript" src="js/bootstrap-scrollspy.js"></script>
    <script type="text/javaScript" src="js/bootstrap-tab.js"></script>
    <script type="text/javaScript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javaScript" src="js/bootstrap-popover.js"></script>
    <script type="text/javaScript" src="js/bootstrap-button.js"></script>
    <script type="text/javaScript" src="js/bootstrap-collapse.js"></script>
    <script type="text/javaScript" src="js/bootstrap-carousel.js"></script>
    <script type="text/javaScript" src="js/bootstrap-typeahead.js"></script>
    
  </body>

</html>

