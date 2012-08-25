<?php
session_start();
if(!session_is_registered('id')){
header("location:login.php");
}
?>

<html>
<head>
<style type="text/css">

</style>
</head>
<body>
<?php
session_start();
$userid=$_SESSION['id'];

include("connect.php");

$result2=mysql_query("SELECT club FROM cred WHERE username ='$userid'");
$credentials=mysql_fetch_array($result2);

echo "<h2>".$credentials['club']."</h2>";
echo "<br/><hr/><br/>";
$datenow=date('d');
$mnthnow=date('m');
$yrnow=date('Y');
$todayid=(10000*$yrnow)+(100*$mnthnow)+$datenow;
$nowid=(100*$yrnow)+$mnthnow;
//echo $nowid;
echo "<h3><a href=\"all.php\" style=\"text-decoration:none; cursor:pointer; color:rgb(59,82,124);\">* * To see all the bookings click here * *</a></h3>";
echo "<br/>";
echo "<hr/><br/>";

echo "<h4>My Bookings</h4>";
echo "<br/>";
$result3=mysql_query("SELECT * FROM adminbookings WHERE userid='$userid' ");
echo "<table id=\"mybookings\" style=\"text-align:right; float:right;\">";
echo "<tr><td><b>Event</b></td><td><b>Venue</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>Duration</b></td></tr>";
while($details=mysql_fetch_array($result3)) {
	if($details['mydate']<$todayid) {
		continue;
		}
		
	else {
	$p=$details['mydate'];
	$p1=$p % 100;
	$temp=($p-$p1)/100 ;
	$p2=$temp % 100;
	$p3=($temp-$p2)/100;
	$t=$details['time'];
	$t2=$t % 100;
	$t1=($t-$t2)/100;		
	$d=$details['duration'];
	$d2=$d % 100;
	$d1=($d-$d2)/100;	
	echo "<tr><td>".$details['eventname']."</td><td>".$details['room']."</td><td>".$p1."-".$p2."-".$p3."</td><td>".$t1.":".$t2."</td><td>".$d1." Hours ".$d2." Minutes</td></tr>";
	}
	}
echo "</table>";

?>
</body>
</html>