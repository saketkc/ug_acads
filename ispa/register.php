<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
require_once("functions.php");
if (isset($_POST['register']))
{

	$username= $_SESSION['ldap_id'];//$_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$alt_email = $_POST['altemail'];
	$department = $_POST['department'];
	$year_of_study = $_POST['year'];
	$mobile = $_POST['mobile'];
	$hostel = $_POST['hostel'];
	$room = $_POST['room'];
	if (!(is_registered($username)))
	{
		register_user($username,$fullname,$department,$email,$alt_email,$year_of_study,$mobile,$hostel,$room);
		header("location:apply.php");
	}
	else 
	{
		header("location:apply.php");
	}
	
}

else{
$info = ldap_find_all('uid',$_SESSION['ldap_id']);
//print_r($info);
$fullname = $info[0]["cn"][0];
$username=$info[0]['uid'][0];
$dep = explode(",",$info[0]["dn"]);
$alldepartment = explode("=",$dep[2]);
$mydepartment=$alldepartment[1];
$alldepartments =  DepartmentFindAll();
$email=$info[0]["mail"][0];
$alternate_email=$info[0]['mailforwardingaddress'][0];
$year = explode('/',$info[0]["mailmessagestore"][0]);
$year_of_study=2012-$year[2];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />
<title>ISPA | Home</title>
</head>
<body id="body1">

    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li class="active"><a href="index.php">Home</a></li>
		   <li><a href="login.php">Apply</a></li>
		  <li><a href="updates.php">Updates/Results</a></li>
		  <li><a href="">FAQs</a></li>
		  <li><a href="contact.html">Contact</a></li>
		  </ul>
		 <div class="row-fluid"> 
         <div class="contenthome1 span8">
		<form method="POST" action="register.php">
			<table>
		 <tr><td>Username </td><td><input type="text" name="username" value='<?php echo $username;?>' disabled='true'/></td></tr>
<tr><td>Name </td><td><input type="text" name="fullname" value='<?php echo $fullname;?>' /></td></tr>
<tr><td>Email</td><td><input type="text" name="email" value ='<?php echo $email;?>' /></td></tr>
<tr><td>Alternate Email </td><td><input type="text" name="altemail" value ='<?php echo $alternate_email;?>' /></td></tr>
<tr><td>Year</td><td><input type="text" name="year" value ='<?php echo $year_of_study;?>' /></td></tr>
<tr><td>Hostel</td><td><select name='hostel'>
<option value='H'>H1</option>
<option value='H'>H2</option>
<option value='H'>H3</option>
<option value='H'>H4</option>
<option value='H'>H5</option>
<option value='H'>H6</option>
<option value='H'>H7</option>
<option value='H'>H8</option>
<option value='H'>H9</option>
<option value='H'>H10</option>
<option value='H'>H11</option>
<option value='H'>H12</option>
<option value='H'>H13</option>
<option value='H'>H14</option>
<option value='H'>Tansa</option>

</select></td></tr>
<tr><td>Room </td><td><input type='text' name='room'/></td></tr>
<tr><td>Mobile </td><td><input type='text' name ="mobile"></td><tr>

<tr><td>Department </td><td><select name="department">
<?php 

foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
	else {
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}
	
		
}?>
<input type='submit' value='register' name='register'>
</table>

</form> 
		 </div>
		 
		</div>
    
</body>
</html>

