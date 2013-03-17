<?php





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
    <form class="form-horizontal">
    <div class="control-group">
    <label class="control-label" for="inputEmail">ID</label>
    <div class="controls">
    <input type="text" id="inputEmail" placeholder="ID">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" id="inputPassword" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn">Sign in</button>
    </div>
    </div>
    </form>
</body>
</html> 
