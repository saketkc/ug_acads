<?php
session_start();
require_once("functions.php");
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction
$department = $_REQUEST['department'];
if(!$sidx) $sidx =1;

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
if($totalrows) {
	$limit = $totalrows;
}


// connect to the database
$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());

mysql_select_db("ispa") or die("Error conecting to db.");
//populateDBRandom();
$result = mysql_query("SELECT COUNT(*) AS count FROM projects WHERE department=$department");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
if ($limit<0) $limit = 0;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
if ($start<0) $start = 0;
$SQL = "SELECT id, prof_name, project_title,project_description,eligibility_criteria FROM projects WHERE department='$department' ";
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
	$preference_1=0;
	$preference_2=0;
	$preference_3=0;
if(is_registered($_SESSION['ldap_id'])){
	$username =$_SESSION['ldap_id'];
$SQL = "SELECT * FROM user_data WHERE ldap_id='$username'";
$results = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
while($srow = mysql_fetch_array($results,MYSQL_ASSOC)) {
	$preference_1=$srow['preference1'];
	$preference_2=$srow['preference2'];
	$preference_3=$srow['preference3'];
	
}	
}
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['id'];
	if($row['id']==$preference_1){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility_criteria'],'1');
}
else if($row['id']==$preference_2){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility_criteria'],'2');
}
else if($row['id']==$preference_3){
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility_criteria'],'3');
}
else{
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['project_title'],$row['project_description'],$row['eligibility_criteria'],'0');
}
    $i++;
} 
echo json_encode($responce);
mysql_close($db);
?>
