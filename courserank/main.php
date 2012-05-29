<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}

    require_once 'logininfo.php';
    require_once 'functions.php';
    $db_server=  mysql_connect($db_hostname, $db_username, $db_password);
    if (!$db_server) die("Unable to connect to MySQL:".  mysql_error());
    mysql_select_db($db_database,$db_server) or die("Unable to select database:".  mysql_error());
    if (isset($_POST['Deptt']) &&
	isset($_POST['CourseNumber']) &&
	isset($_POST['CourseName']) &&
	isset($_POST['Instructor']) &&
        isset($_POST['d1']) &&
            isset($_POST['d2']) &&
            isset($_POST['d3']) &&
	isset($_POST['d4']))
            {
            $deptt   = get_post('Deptt');
            $cno    = get_post('CourseNumber');
            $cna = get_post('CourseName');
            $inst     = get_post('Instructor');
            $author = $_SESSION['ldap_id'];
            $d1     = get_post('d1');
             $d2     = get_post('d2');
             $d3=get_post('d3');
             $d4=get_post('d4');
            
             
             
             $deptt = str_replace('"', '', $deptt);
$cno = str_replace('"', '', $cno);
$cna = str_replace('"', '', $cna);
$course_no = str_replace(' ', '', $course_no);
$inst = str_replace('"', '', $inst);
$d1 = str_replace('"', '', $d1);
$d2 = str_replace('"', '', $d2);
$d3 = str_replace('"', '', $d3);
$d4 = str_replace('"', '', $d4);
             

            $query = "INSERT INTO reviews VALUES" .
		"(NULL,'$deptt', '$cno', '$cna', '$inst', '$author', '$d1', '$d2','$d3','$d4',CURDATE())";

            if (!mysql_query($query, $db_server))
		echo "Review could not be added.<br />" .
		mysql_error() . "<br /><br />";
            }

            
            mysql_close($db_hostname);
        
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/png" href="src/favicon.png">
<link rel="image_src" href="src/logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Course Rank | Get information/reviews of different courses to plan your semester better.</title>

<script type="text/javascript">
	  //form validation
            function validatename(field){
				if (field =="") 
				{
					return "No value entered. \n";}
				else{return "";}
			}
			
			function validateInstructor(field){
				if (field =="") {return "No Instructor Name entered. \n";
			}
			else{
				return "";
			}
					
			}
			function validatecode(field){
				if (field ==""){ return "No Course Number entered. \n";}
				else if(isNaN(field)) {
				return "Course Number should be a number.";
			} 
				else{
					return "";}
					
			}
			
			
			//form validation main program
            function validate(form)
            {
				
				fail=validatename(form.CourseName.value);
				fail+=validatecode(form.CourseNumber.value);
				fail+=validateInstructor(form.Instructor.value);
				fail+=validatename(form.d1.value);
                                fail+=validatename(form.d2.value);
                               fail+=validatename(form.d3.value);
                               fail+=validatename(form.d4.value);
				
				if (fail == "") return true
				else { alert(fail); return false }
			}
	  
	  function validate2(form)
            {
				
				fail=validatename(form.dep.value);
				fail+=validatecode(form.code.value);
				
				
				if (fail == "") return true
				else { alert(fail); return false }
			}
	  
            
        </script>





</head>
<body>
<div class="container-fluid" id="container">
    <div class="row-fluid" id="top">
        <!--Rainbow band-->
    </div> 
    <div class="row-fluid" id="main">
        <div class="spanhalf" id="sidebar">
        <ul class="nav nav-pills">
    <li class="active" ><a href="depreviews.php?dept=AE" rel="tooltip" title="Aerospace Engineering (AE) Courses' Reviews">AE</a></li><br>
    <li class="active"><a href="depreviews.php?dept=AN" id="sideitem" rel="tooltip" title="Animation (AN) Courses' Reviews ">AN</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=GP" rel="tooltip" title="Applied Geophysics (GP) Courses' Reviews ">GP</a></li><br>
    
    <li class="active" id="sideitem"><a href="depreviews.php?dept=BM" rel="tooltip" title="Bio-Medical Engineering (BM) Courses' Reviews">BM</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=BS" rel="tooltip" title="Biosciences & Bioengineering (BS) Courses' Reviews">BS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=BT" rel="tooltip" title="Bio-Technology (BT) Courses' Reviews ">BT</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ES" rel="tooltip" title="Centre for Environmental Science & Engineering (ES) Courses' Reviews ">ES</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=NT" rel="tooltip" title="Centre for Research in Nano Technology and Sciences (NT) Courses' Reviews">NT</a></li><br>
   
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CL" rel="tooltip" title="Chemical Engineering (CL) Courses' Reviews">CL</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CH" rel="tooltip" title="Chemistry (CH) Courses' Reviews">CH</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CE" rel="tooltip" title="Civil Engineering (CE) Courses' Reviews ">CE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CM" rel="tooltip" title="Climate Studies (CM) Courses' Reviews">CM</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CS" rel="tooltip" title="Computer Science & Engineering (CS) Courses' Reviews">CS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=CR" rel="tooltip" title="Corrosion Science & Engineering (CR) Courses' Reviews">CR</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=TD" rel="tooltip" title="CTARA (TD) Courses' Reviews ">TD</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=GS" rel="tooltip" title="Earth Sciences (GS) Courses' Reviews">GS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ET" rel="tooltip" title="Educational Technology (ET) Courses' Reviews">ET</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=EE" rel="tooltip" title="Electrical Engineering (EE) Courses' Reviews">EE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=EN" rel="tooltip" title="Energy Science and Engineering (EN) Courses' Reviews">EN</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=EP" rel="tooltip" title="Engineering Physics (EP) Courses' Reviews">EP</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=GS" rel="tooltip" title="Earth Sciences (GS) Courses' Reviews">GS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=GE" rel="tooltip" title="General (GE) Courses' Reviews">GE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=HS" rel="tooltip" title="Humanities & Social Sciences (HS) Courses' Reviews">HS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ID" rel="tooltip" title="Industrial Design Centre (ID) Courses' Reviews">ID</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IE" rel="tooltip" title="Industrial Engineering & Operations Research (IE) Courses' Reviews">IE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IM" rel="tooltip" title="Industrial Management (IM) Courses' Reviews">IM</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IN" rel="tooltip" title="Interaction Design (IN) Courses' Reviews">IN</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=SI" rel="tooltip" title="Applied Statistics and Informatics (SI) Courses' Reviews">SI</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MS" rel="tooltip" title="Materials Science (MS) Courses' Reviews">MS</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MA" rel="tooltip" title="Mathematics (MA) Courses' Reviews">MA</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=ME" rel="tooltip" title="Mechanical Engineering (ME) Courses' Reviews">ME</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MM" rel="tooltip" title="Metallurgical Engineering & Materials Science (MM) Courses' Reviews">MM</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MD" rel="tooltip" title="Mobility & Vehicle Design (MD) Courses' Reviews">MD</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=PH" rel="tooltip" title="Physics (PH) Courses' Reviews">PH</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=RE" rel="tooltip" title="Reliability Engineering (RE) Courses' Reviews">RE</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=IT" rel="tooltip" title="School of Information Technology (IT)  Courses' Reviews">IT</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MG" rel="tooltip" title="SJM School of Management (MG) Courses' Reviews">MG</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=SC" rel="tooltip" title="Systems & Control Engineering (SC) Courses' Reviews">SC</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=VC" rel="tooltip" title="Visual Communication (VC) Courses' Reviews">VC</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=GNR" rel="tooltip" title="Centre of Studies in Resources Engineering (GNR) Courses' Reviews">GNR</a></li><br>
    <li class="active" id="sideitem"><a href="depreviews.php?dept=MMM" rel="tooltip" title="Materials, Manufacturing and Modelling (MMM) Courses' Reviews">MMM</a></li><br>
        </ul>
        </div>
        <div class="span3" id="content">
                <div id="logo"></div>
            
                <div id="fmenu">
                <ul>
                   <li><a href="main.php"><img src="src/1.png"></a></li><br>
                    <li><a href="addreview.php"><img src="src/2.png"></a></li><br>
                    <li><a href="index.php?logout=true"><img src="src/3.png"></a></li><br>
                    <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/"><img src="src/4.png"></a></li><br>
                </ul>
                </div>
        </div>
        <div class="span8" id="postarea">
            <div class="span8" id="search">
                <form class="form-horizontal" name="search" action="searchresult.php" method="post">  
        <fieldset>  
          <legend>Search Course Reviews</legend>  
          <p id="r3">Search though this form or use the navigation on the left hand sidebar.</p>
          <br>
          <div class="control-group">  
            <label class="control-label" for="select01">Department</label>  
            <div class="controls">  
              <select id="select01" name="dep">  
                <option>AE</option>  
                <option>AN</option>  
                <option>GP</option>  
                <option>SI</option>  
                <option>BM</option>  
                <option>BS</option>  
                <option>BT</option>  
                <option>ES</option>  
                <option>NT</option>  
                <option>GNR</option> 
                <option>CL</option>  
                <option>CH</option>  
                <option>CE</option>  
                <option>CM</option>  
                <option>CS</option> 
                <option>CR</option>  
                <option>TD</option>  
                <option>GS</option>  
                <option>ET</option>  
                <option>EN</option> 
                <option>EP</option>  
                <option>GE</option>  
                <option>HS</option>  
                <option>ID</option>  
                <option>IE</option> 
                <option>IM</option>
                <option>IN</option>
                <option>MMM</option>
                <option>MS</option>
                <option>MA</option>
                <option>ME</option>
                <option>MM</option>
                <option>MD</option>
                <option>IT</option>
                <option>PH</option>
                <option>RE</option>
                <option>MG</option>
                <option>SC</option>
                <option>VC</option>
              </select> 
                <p class="help-block">Select the appropriate Department code like "CS" for CS101 course.</p>
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label" for="input01">Three digit Course Code</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01" name="code">  
              <p class="help-block">Enter the appropriate Three Digit Course Code like "101" for CS101 course.</p>  
            </div>  
          </div>   
            <div class="form-actions">  
            <button type="submit" class="btn btn-primary" onClick="return validate2(search)">Search this course</button>  
             <?php if (count($_POST)>0) echo<<<_END
                <META HTTP-EQUIV=Refresh CONTENT="0; URL='searchresult.php'">
_END;
            ?><br>
            
          </div>  
        </fieldset>  
</form>    To browse through all reviews,click <a href="posts.php">here</a>.  
           
            </div>
           
            <div id="separation" class="span8"></div>
            <div class="span8" id="add">
               
                <form class="form-horizontal" name="addco" action="main.php" method="post">  
        <fieldset>  
          <legend>Add your Course Reviews</legend>  
          
         
          <div class="control-group">  
            <label class="control-label" for="select01" >Department</label>  
            <div class="controls">  
              <select id="select01" name="Deptt">  
                <option>AE</option>  
                <option>AN</option>  
                <option>GP</option>  
                <option>SI</option>  
                <option>BM</option>  
                <option>BS</option>  
                <option>BT</option>  
                <option>ES</option>  
                <option>NT</option>  
                <option>GNR</option> 
                <option>CL</option>  
                <option>CH</option>  
                <option>CE</option>  
                <option>CM</option>  
                <option>CS</option> 
                <option>CR</option>  
                <option>TD</option>  
                <option>GS</option>  
                <option>ET</option>  
                <option>EN</option> 
                <option>EP</option>  
                <option>GE</option>  
                <option>HS</option>  
                <option>ID</option>  
                <option>IE</option> 
                <option>IM</option>
                <option>IN</option>
                <option>MMM</option>
                <option>MS</option>
                <option>MA</option>
                <option>ME</option>
                <option>MM</option>
                <option>MD</option>
                <option>IT</option>
                <option>PH</option>
                <option>RE</option>
                <option>MG</option>
                <option>SC</option>
                <option>VC</option>
              </select> 
                <p class="help-block">Select the appropriate Department code like "CS" for CS101 course.</p>
            </div>  
          </div>  
          <div class="control-group">  
            <label class="control-label" for="input01" >Three digit Course Code</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01" name="CourseNumber">  
              <p class="help-block">Enter the appropriate Three Digit Course Code like "101" for CS101 course.</p>  
            </div>  
          </div>  
           <div class="control-group">  
            <label class="control-label" for="input01">Course Name</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01"  name="CourseName">  
              <p class="help-block">Enter the name of the Course like "Computer Programming and Utilization" for CS101.</p>  
            </div>  
          </div> 
           <div class="control-group">  
            <label class="control-label" for="input01">Course Instructor</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01"  name="Instructor">  
              <p class="help-block">Enter the name of the Instructor with whom you did the course.</p>  
            </div>  
          </div> 
           <div class="control-group">  
            <label class="control-label" for="textarea" >What did you learn at the end of this course?</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" rows="3" name="d1"></textarea>  
            </div>  
          </div> 
           <div class="control-group">  
            <label class="control-label" for="textarea" >How was the course load?</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" rows="3" name="d2"></textarea>  
               <p class="help-block">Were there too many assignments or too few of them to apply the concepts?</p> 
            </div>  
          </div> 
           <div class="control-group">  
            <label class="control-label" for="textarea" >How was the Instructor for this course?</label>  
            <div class="controls">  
              <textarea class="input-xlarge" id="textarea" rows="3" name="d3"></textarea>  
              <p class="help-block">Write your review of the Course Instructor here.</p> 
            </div>  
          </div> 
          <div class="control-group">  
            <label class="control-label" for="select01" >What was the difficulty level?</label>  
            <div class="controls">  
              <select id="select01" name="d4">  
                <option>Easy</option>  
                <option>Moderately Difficult</option>  
                <option>Difficult</option>  
              </select> 
                <p class="help-block">Select the appropriate Difficulty level, of which the course was for you.</p>
            </div>  
          </div>  
          <div class="form-actions">  
            <button type="submit" class="btn btn-primary" onClick="return validate(addco)">Save changes</button>  
            <button class="btn">Cancel</button>  <hr><br>
            <?php if (count($_POST)>0) echo<<<_END
                <META HTTP-EQUIV=Refresh CONTENT="0; URL='posts.php'">
_END;
            ?>
           

          </div>  
        </fieldset>  
</form>  
                
            </div>
        </div>
    </div>

</div>
</body>
</html>
