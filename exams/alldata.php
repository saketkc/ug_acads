<?php
session_start();
if(!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}

require_once("connect.php");
$department = $_REQUEST['department'];
$page = $_REQUEST['page']; // get the requested page
$limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
$sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
$sord = $_REQUEST['sord']; // get the direction
if(!$sidx) $sidx =1;

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows']: false;
if($totalrows) {
	$limit = $totalrows;
}


// connect to the database
$db = mysql_connect("localhost", "$dbuser", "$dbpasswd") or die("Connection Error: " . mysql_error());

mysql_select_db("$dbname") or die("Error conecting to db.");
//populateDBRandom();
$result = mysql_query("SELECT COUNT(*) AS count FROM exam_file_data WHERE department='$department'");
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
$SQL = "SELECT id,prof_name,course,examtype,yearofexam,examfileextension,consentfileextension FROM exam_file_data WHERE department='$department' order by 'id'";
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['id'];
    $responce->rows[$i]['cell']=array($row['prof_name'],$row['course'],$row['examtype'],$row['yearofexam'],$row['examfileextension'],$row['consentfileextension']);
    $i++;
} 
echo json_encode($responce);
mysql_close($db);
?>
