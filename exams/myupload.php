<?php
session_start();
if (!(isset($_SESSION['admin']))){
	header("location: index.php");
}
if(isset($_POST['info'])){
	$prof_name= $_POST['prof-name'];
	$course_code = $_POST['course-code'];
	$department = $_POST['department'];
	$yearofexam= $_POST['yearofexam'];
	$yearofstudy = $_POST['yearofstudy'];
	$examtype=$_POST['exam-type'];
	$_SESSION['prof_name'] = $prof_name;
	$_SESSION['course_code'] = $course_code;
	$_SESSION['department'] = $department;
	$_SESSION['yearofexam'] = $yearofexam;
	$_SESSION['yearofstudy'] = $yearofstudy;
	$_SESSION['examtype'] = $examtype;
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exams | Upload</title>
</head>

<body>
<?php
$max_no_img=2; // Maximum number of images value to be set here

echo "<form method='post' action='' enctype='multipart/form-data'>";

echo "<table border='0' width='400' cellspacing='0' cellpadding='0' align=center>";

echo "<tr><td>Consent Letter</td><td><input type=file name='images[]' class='bginput'></td></tr>";
echo "<tr><td>Exam Paper</td><td><input type=file name='images[]' class='bginput'></td></tr>";


echo "<tr><td colspan=2 align=center><input type='submit' name='uploadify' value='Add Image'></td></tr>";
echo "</form> </table>";

	$prof_name=$_SESSION['prof_name'] ;
			$department = $_SESSION['department'];
	$course_code=$_SESSION['course_code'] ;
	$department=$_SESSION['department'] ;
	$yearofexam=$_SESSION['yearofexam']  ;
	$yearofstudy=$_SESSION['yearofstudy']  ;
	$examtype=$_SESSION['examtype']  ;
	 

	$i=0;		
          
           
while(list($key,$value) = each($_FILES['images']['name']))
{
    //echo $key;
    //echo "<br>";
    
    //echo "<br>";
if(!empty($value)){   // this will check if any blank field is entered
$filename =$value;    // filename stores the value
if($key==0){
	$consentfileextension = pathinfo($filename, PATHINFO_EXTENSION);
	$consentfilename = "CONSENT_LETTER"."$course_code"."_"."$examtype"."_"."$yearofexam"."_"."$prof_name"."."."$consentfileextension";
	
	$add = "/var/myuploads/$consentfilename";
}

//$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line

;   // upload directory path is set
//echo $_FILES['images']['type'][$key];     // uncomment this line if you want to display the file type
//echo "<br>";                             // Display a line break

if($key==1){
	$examfileextension = pathinfo($filename, PATHINFO_EXTENSION);
	$examfilename = "EXAM_PAPER"."$course_code"."_"."$examtype"."_"."$yearofexam"."_"."$prof_name"."."."$examfileextension";
	
	$add = "/var/myuploads/$examfilename";
	$key=1;
}
copy($_FILES['images']['tmp_name'][$key], $add); 

			
            
    //  upload the file to the server
chmod("$add",0777);   
$i++;              // set permission to the file.
}
}
if ($i>=1){
	
	$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());
	  mysql_select_db("exams") or die("Error conecting to db.");
	$query="INSERT into exam_file_data(prof_name,department,course,yearofstudy,yearofexam,examtype,examfilename,examfileextension,consentfilename,consentfileextension) VALUES('$prof_name','$department','$course_code','$yearofstudy','$yearofexam','$examtype','$examfilename','$examfileextension','$consentfilename','$consentfileextension')";
	mysql_query($query);
	mysql_close($db);
	header("location: fill.php");
	echo "Done";
}

?>
</body>
</html>
