<?php

session_start();
$userid=$_SESSION['id'];

$host = "localhost";
$user = "root";
$pass = "RectumSempra";
$db = "test";
$r = mysql_connect($host, $user, $pass);

if (!$r)
{
echo "Could not connect to server</br>";
trigger_error(mysql_error(), E_USER_ERROR);
}

	mysql_select_db($db) or die(mysql_error());


if(!$_POST['event']=='' && !$_POST['mydate']=='' && !$_POST['month']=='' && !$_POST['year']=='' && !$_POST['hours']=='' && !$_POST['minutes']=='' && !$_POST['durhours']=='' && !$_POST['durminutes']=='' && !$_POST['room']=='') 
{
	$ev=$_POST['event'];
	$des=$_POST['description'];
	$dt=$_POST['mydate'];
	$mnth=$_POST['month'];
	$yr=$_POST['year'];
	$hr=$_POST['hours'];
	$min=$_POST['minutes'];
	$dhr=$_POST['durhours'];
	$dmin=$_POST['durminutes'];
	$room=$_POST['room'];
	
	$dateid=($dt*1000000)+($mnth*10000)+$yr;
	$timeid=($hr*100)+$min;
	$durid=($dhr*100)+$dmin;
	$itu=$timeid;
	$ftu=$timeid+$durid;
	
	
	$register="INSERT INTO adminbookings (mydate,time,duration,eventname,eventdes,room,userid) VALUES ('$dateid','$timeid','$durid','$ev','$des','$room','$userid')";
	
	//echo "dateid : ".$dateid;
	$datecheck="SELECT * FROM adminbookings where mydate='$dateid' ";
	
	$result=mysql_query($datecheck);
	$num=mysql_num_rows($result);
	$result1=mysql_fetch_array($result);
	
	if($num>0) {
		
			$redflag=0;
			for($i=0;$i<$num;$i+=1) {
				if(strcmp($result1['room'],$room)==0) {
					$redflag=$redflag+1;}
				 }
			
			if($redflag>0) {
									
				for($j=0;$j<$redflag;$j+=1) {

					$itd=$result1['time'];
					$ftd=$result1['duration']+$itd;

					if($itu <= $itd && $itd <= $ftu) {
					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";break;}
					else if($itu <= $ftd && $ftd <= $ftu) {
					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";break;}
					else if($itd <= $itu && $itu <= $ftd) {
					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";break;}
					else if($itd <= $ftu && $ftu <= $ftd) {
					                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";break;}
					else{	
						mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
                  echo "<script type='text/Javascript'>alert('Succeffully Registered !')</script>";						
						
						}


/*					if( !($itu < $itd && $itd < $ftu) && !($itu < $ftd && $ftd < $ftu) && !($itd < $itu && $itu < $ftd) && !($itd < $ftu && $ftu < $ftd) ) {
						
						mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
                  echo "<script type='text/Javascript'>alert('Succeffully Registered !')</script>";						
						
						}
						
					else{
						
                  echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>Time slot already taken ! </br></br><a href=\"welcome.php\">Back</a></div>";

						}	
*/					
					}
				
				}
			else {mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
			echo "<script type='text/Javascript'>alert('Succeffully Registered !')</script>";}	 
		
		}
	else {mysql_query($register) or die("Failed to register, Please try again.</br>Sorry for inconvinience.");
	echo "<script type='text/Javascript'>alert('Succeffully Registered !')</script>";}
}

else {

echo "<div style=\"margin-left:auto; margin-right:auto; text-align:center;\"></br></br>You have not filled all the necessary fields ! </br></br><a href=\"welcome.php\">Back</a></div>";	
	}

?>