<?php
session_start();
require_once("connect.php");
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
$result = mysql_query("SELECT COUNT(*) AS count FROM books WHERE cost='0'");
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
$SQL = "SELECT distinct created_by,name,course,tags FROM books WHERE cost='0' group by  created_by";
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$query = "SELECT * FROM users where username='".$row['created_by']."'";
	$results= mysql_query($query);
	$user_inf = mysql_fetch_array($results);
	$responce->rows[$i]['id']=$user_inf['id'];
    $responce->rows[$i]['cell']=array($row['created_by'],$row['name'],$row['course'],$row['tags']);
    $i++;
} 
echo json_encode($responce);
mysql_close($db);
?>
