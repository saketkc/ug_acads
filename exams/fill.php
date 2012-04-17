<?php
session_start();
require_once("functions.php");
$alldepartments =  DepartmentFindAll();

?>
<!DOCTYPE HTML>
<html>
	<head>
<title>Paper Info</title>
<form method="POST" action="myupload.php">
	<table>
		<tr><td>Prof.Name</td><td><input type='text' name='prof-name'></td></tr>
		<tr><td>Course Code</td><td><input type='text' name='course-code'></td></tr>
		<tr><td>Department </td><td><select name="department">
<?php 

foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
	else {
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}
	
		
}

?>

</select></td></tr>
<tr><td>Type</td><td><select name='exam-type'><option value='quiz'>Quiz</option><option value='midesem'>MidSem</option><option value='endsem'>Endsem</option></select></td></tr>

<tr><td>Year of Examination</td><td><select name='yearofexam'>
<option value='2001'>2001</option>
<option value='2002'>2002</option>
<option value='2004'>2003</option>

<option value='2004'>2004</option>
<option value='2005'>2005</option>
<option value='2006'>2006</option>
<option value='2007'>2007</option>
<option value='2008'>2008</option>
<option value='2009'>2008</option>
<option value='2010'>2010</option>
<option value='20011'>2011</option>
<option value='2012'>2012</option>


</select></td></tr>
<tr><td><input type='submit' value='Submit' name='info'></td></tr>
</table>
</form>
</head>
</html>
