<?php
session_start();
if (!(isset($_SESSION['id']))){
	header("location: index.php");
}
require_once 'connect.php';
    require_once 'functions.php';

if(isset($_POST['rno']) && isset($_POST['name']) && isset($_POST['hostel']) 
        && isset($_POST['room']) && isset($_POST['matter']) && isset($_POST['fine']) && isset($_POST['flag']))
{
add($_POST['rno'],$_POST['name'],$_POST['hostel'],$_POST['room'],$_POST['matter'],
        $_POST['matter'],$_POST['fine'],$_POST['flag'] );    

header("Location: viewall.php");

}
if(isset($_GET['logout'])){
	
	session_destroy();

header("Location: index.php");

        
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
<span id="heading"><h2>Search</h2></span>
<hr>


    <form class="form-search" method="post" action="search.php">
    <input type="text" class="input-emedium search-query" placeholder="Roll Number" name="searchrno">  
    <button type="submit" class="btn">Search</button>
    </form>
<hr>
<h2>Add for new fine entry</h2>
<fieldset>
		<form class="form-horizontal"  method="post" action="main.php" >
 <div class="control-group">			<label class="control-label"> Student Name </label>
<div class="controls">			<input type="text" id="name" name="name"></div></div>
		 <div class="control-group">	<label class="control-label"> Roll No. </label>
		<div class="controls">	<input type="text" id="rno" name="rno"></div></div>
	 <div class="control-group">		<label class="control-label"> Hostel</label>
	<div class="controls">		<select name="hostel">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="tansa">Tansa</option>
			</select></div></div>	
	 <div class="control-group">	<label class="control-label"> Room Number</label>

			
			<div class="controls"><input type="text"  name="room"></input></div></div>
	 <div class="control-group">		<label class="control-label"> Matter</label>
			<div class="controls"><textarea rows=1 col=40 id="description" name="matter"></textarea></div></div>
	 <div class="control-group">		<label class="control-label"> Fine Amount </label>
			<div class="controls"><input type="text" id="fine" name="fine"></div></div>
	 <div class="control-group">		<label class="control-label"> Paid/Unpaid</label>
	<div class="controls">		<select name="flag">
											<option value = "unpaid">
												Unpaid
											</option>
											<option value = "paid">
												Paid
											</option>
										</select>
									</div>
			</div>
<br>			
			<input type="submit" class="btn-large" value="Submit" name="submit">
		</form>
	</fieldset>
<?php echo $a; 
?>

</body>
</html> 
 
