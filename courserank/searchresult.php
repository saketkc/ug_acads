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
    if (isset($_POST['dep']) &&
	isset($_POST['code']))
            {
            $dep   = get_post('dep');
            $code    = get_post('code');
            }
    
    
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * 5;
$sql = "SELECT * FROM reviews WHERE Deptt='$dep' AND CourseNumber=$code ORDER BY id DESC LIMIT $start_from, 5";
$rs_result = mysql_query ($sql);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/png" href="src/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Course Rank | Get information/reviews of different courses to plan your semester better.</title>

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
                <ul><li><a href="main.php"><img src="src/1.png"></a></li><br>
                    <li><a href="addreview.php"><img src="src/2.png"></a></li><br>
                    <li><a href="index.php?logout=true"><img src="src/3.png"></a></li><br>
                    <li><a href="http://gymkhana.iitb.ac.in/~ugacademics/"><img src="src/4.png"></a></li><br>
                </ul>
                </div>
        </div>
        <div class="span8" id="postarea">
            <?php
            /*$nrows=  mysql_num_rows($rs_result);
            echo $nrows;*/
                        while ($row = mysql_fetch_assoc($rs_result)) {
                            /*if ($nrows==0)
                            {
                                echo<<<_END
                Sorry,no reivews have been added for any of $dep courses.
                    <br>
                    Add one <a href="addreview.php">here</a>.
_END;
                            }
                            else{*/
                ?>
            <div class="span8" id="posts">
                
                   <dl id="postitem" class="dl-horizontal">
                    <dt>Department</dt><dd><? echo $row["Deptt"]; ?></dd>
                    <dt>Course Code</dt><dd><? echo $row["CourseNumber"]; ?></dd>
                    <dt>Course Name</dt><dd><? echo $row["CourseName"]; ?></dd>
                    <dt>Instructor's Name</dt><dd><? echo $row["Instructor"]; ?></dd>
                    <br>
                    <dt>What he/she learned at the end of the course</dt><dd><? echo $row["d1"]; ?></dd>
                    <br><hr>
                    <dt>How the course load was</dt><dd><? echo $row["d2"]; ?></dd>
                    <br><hr>
                    <dt>How the Instructor was</dt><dd><? echo $row["d3"]; ?></dd>
                    <br><hr>
                    <dt>How the difficulty level was</dt><dd><? echo $row["d4"]; ?></dd>
                    <br><hr>
                    <dt>Review written by</dt><dd><? echo $row["Author"]; ?></dd>
                    <dt>Date of review</dt><dd><? echo $row["date"]; ?></dd>
                    
              
                </dl>
            </div>
            <div id="separation" class="span8"></div>
            <?php
                         //   }
                        };
                ?> 
            
            <div class="span8" id="posts">
                
                <?php
$total_records = $row[0];
$total_pages = ceil($total_records / 5);
  if (mysql_num_rows($rs_result) ==0){
      echo<<<_END
                Sorry,no reivews have been added till now for any of $dep $code courses.
                    <br>
                    Add one <a href="addreview.php">here</a>.
_END;
  }
for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='searchresult.php?page=".$i."'>".$i."</a> ";
};
?>
            </div>   
            
        </div>
    </div>

</div>
</body>
</html>

