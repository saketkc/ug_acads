<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
require_once("functions.php");
if (isset($_POST['add'])){
	$created_by = $_SESSION['ldap_id'];
	$name = $_POST['name'];
	$semester = $_POST['semester'];
	$course_no= $_POST['course'];
	$cost = $_POST['cost'];
	$tags = $_POST['tags'];
	add_new_book($created_by,$name,$semester,$course_no,$cost,$tags);
	//echo $created_by. $name.$semester.$course_no.$cost.$tags;
	$message = "Successfully Added Book";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">

<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<title>bookBay</title>
<style>

.scroll{
            width:133px;
            height:61px;
            position:fixed;
            bottom:15px;
            left:150px;
            background:#fff url(scroll.png) no-repeat top left;
        }
 .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:0px;
            left:25%;
            background:#fff url(title.png) no-repeat top left;
        }
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
        }
		
		
		ul#navigation {
    position: fixed;
    margin: 0px;
    padding: 0px;
    top: 10px;
    left: 0px;
    list-style: none;
    z-index:9999;
}
ul#navigation li {
    width: 100px;
}
ul#navigation li a {
    display: block;
    margin-left: -2px;
    width: 100px;
    height: 70px;    
    background-color:#CFCFCF;
    background-repeat:no-repeat;
    background-position:center center;
    border:1px solid #AFAFAF;
    -moz-border-radius:0px 10px 10px 0px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -khtml-border-bottom-right-radius: 10px;
    -khtml-border-top-right-radius: 10px;
    /*-moz-box-shadow: 0px 4px 3px #000;
    -webkit-box-shadow: 0px 4px 3px #000;
    */
    opacity: 0.6;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
ul#navigation .home a{
    background-image: url(img/home.png);
}
ul#navigation .add a      {
    background-image: url(img/add.png);
}
ul#navigation .search a      {
    background-image: url(img/search.png);
}
ul#navigation .delete a      {
    background-image: url(img/delete.png);
}
ul#navigation .logout a   {
    background-image: url(img/logout.png);
}





body{
	background-image:url(img/back.png);
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 13px;
  line-height: 18px;
  color: #333333;
  background-color: #ffffff;
}

#outer{
	
	
	

	overflow:hidden;
	
	padding-left:5%;
}
#toppest{
	fdsfdsfdsfdsfsfdsheight:9px;
	background-image:url(img/1.jpg);
	margin:-10px;
	width:100%
}
#topbar{
	padding:2%;
	background-image:url(img/2.png);
	margin-top:9px;
	margin-left:-10px;
	margin-right:-10px;
	width:100%;
}
#main1{
	padding:6%;
	align:center;
}
#main{
	height:550px;
	width:75%;
	background-color:#FFF;
	margin:auto;
	padding:6%;
	font-size:36px;
	line-height:100px;
	
}
#footbar{
	height:180px;
	background-color:#FFF;
	padding-left:5%;
	padding-top:20px;
	padding-bottom:20px;
	padding-right:20px;
	margin:-10px;
	width:100%;
}
#footer{
	height:30px;
	background-image:url(img/4.png);
	margin:-10px;
	padding-top:20px;
	padding-bottom:20px;
	padding-right:20px;
	padding-left:5%;
	width:100%;
	color:#FFF;
}
#about{
	font:Georgia, "Times New Roman", Times, serif;
	font-size:16px;
	
	width:40%;
	float:left;
}
#list{
	list-style-type:none;
	font-size:24px;

}
#links{
	width:40%;
	float:right;
}
.listing ul li{
	line-height:2;
}
.button{
font-size:36px;
line-height:50px;
}
.formed{
	font-size:75%;
line-height:2em;
}
#descrip{
	font-size:20px;
line-height:.5em;
}
#comment{
color:#666666;
display:block;
font-size:14px;
font-weight:normal;
text-align:right;
width:200px;
}
#label{
	display:block;
	text-align:right;
	float:left;
line-height:.8em;
}
#main input{
float:left;
font-size:24px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:100%;
margin:2px 0 20px 10px;
height:47px;
}
#addbutton{
height:50px;
font-size:20px;
}
</style>

  <script type="text/javascript">
	  //form validation
            function validatename(field){
				if (field =="") 
				{
					return "No Name entered. \n";}
				else{return "";}
			}
			function validatesemester(field){
				if (field =="") {return "No Semester entered. \n";}
				else if(isNaN(field)) {
				return "Semester should be a number";
			}
			else {
				return "";
			}
			}
			function validatecourse(field){
				if (field =="") {return "No Course entered. \n";
			}
			else{
				return "";
			}
					
			}
			function validatecost(field){
				if (field ==""){ return "No Cost entered. \n";}
				else if(isNaN(field)) {
				return "Semester should be a number";
			}
				else{
					return "";}
					
			}
			
			
			//form validation main program
            function validate(form)
            {
				
				fail=validatename(form.name.value);
				fail+=validatesemester(form.semester.value);
				fail+=validatecourse(form.course.value);
				fail+=validatecost(form.cost.value);
				
				if (fail == "") return true
				else { alert(fail); return false }
			}
	  
	  
	  
            
        </script>
</head>

<body>

<div class="container-fluid">
<div class="row-fuid" id="toppest">

</div>
<div class="row-fluid" id="topbar">
<div class="span11" id="outer">
<h1 id="logo"><a href="#"><img src="img/title1.png" /></a></h1>
</div>
</div>
<div id="main1" class="row-fluid">
<div id="main" class="span10">
<span id="descrip">To donate workshop tools please send a mail to <a href="mailto:gsecaaug@iitb.ac.in">gsecaaug@iitb.ac.in</a><br/><?php echo $message?><br/></span>



<form method="POST" action="add.php" name="form2" class="formed"><table>
<span id="main2">
<tr><td><span id ="label">Book name<span id="comment"> (Eg. "Introduction to Economics - Samuelson")</span></span></td><td> <input type="text" name="name" /></td></tr>
<tr><td><span id="label">Semester<span id="comment">Eg. "1"</span></span></td><td><input type="text" name="semester" /></td></tr>
<tr><td><span id="label">Course<span id="comment">Eg. "HS101"</span></span></td><td><input type="text" name="course" /></td></tr>
<tr><td><span id="label">Cost<span id="comment">Eg. "50"; Enter "0" for donating the book</span></span></td><td><input type="text" name="cost" /></td></tr>

<tr><td><span id="label">Tags<span id="comment">Eg. "Economics","Samuelson"</span></span></td><td><input type="text" name="tags" /></td></tr>
</span>
<tr><td><input type="submit" class="button" name='add' value="Add" onClick="return validate(form2)" id="addbutton"/></td><tr></table>
</form>
</div>

</div>

 <ul id="navigation">
           
            <li class="add"><a href="add.php" title="Add Books"></a></li>
            <li class="search"><a href="view.php" title="Search books"></a></li>
            <li class="delete"><a href="delete.php" title="Delete books"></a></li>
            <li class="logout"><a href="index.php?logout=true" title="Log Out"></a></li>
        
        </ul>

       

      



<div class="row-fluid" id="footbar">
<div class="span5" id="about">
<h3>About bookBay</h3>
Buy and sell your old books online with bookBay. You can search the books according to semester as well as according to the book titles as well.
</div>
<div class="listing" id="links">
<a href="http://gymkhana.iitb.ac.in/~ugacademics/"><img src="img/logo.jpg"><span id="qwer">  IIT Bombay UG Academics</span></a>
</div>
</div>
<div class="row-fluid" id="footer">
<span class="span8" >
bookBay © 2012. All rights reserved
</span>
</div>
</div>


</body>




</html>
