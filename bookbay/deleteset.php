<?php
session_start();
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
$db = mysql_connect("localhost", "root", "fedora13") or die("Connection Error: " . mysql_error());

mysql_select_db("bookbay") or die("Error conecting to db.");
//populateDBRandom();
$username=$_SESSION['ldap_id'];
$result = mysql_query("SELECT COUNT(*) AS count FROM books WHERE created_by='$username'");
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
$SQL = "SELECT * FROM books WHERE created_by='$username' ";
$result = mysql_query( $SQL ) or die("Couldnt execute query.".mysql_error());
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['id'];
    $responce->rows[$i]['cell']=array($row['name'],$row['semester_used'],$row['course'],$row['cost'],$row['tags'],'');
    $i++;
} 
echo json_encode($responce);
mysql_close($db);
?>
