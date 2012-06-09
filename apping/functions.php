<?php

function ldap_auth($ldap_id,$ldap_password){
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password)){
		return true;
	}
	else{ return false;}
	
}

function is_registered($ldap_id){
require_once("dbconnect.php");	
	try {
		$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword );    
		if ($db)
	{
		$query = $db->prepare("SELECT username FROM apping_database WHERE username=?");
		$query->execute(array($ldap_id));
		$is_registered = $query->rowCount();
		$db=null;
		return $is_registered;
	}
		}
	catch(PDOException $e)
    {
    echo $e->getMessage();
    }
	
}

function ldap_find_all($attribute = 'uid', $value = '*', $baseDn = 'dc=iitb,dc=ac,dc=in') 
{  
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    $r = ldap_search($ds, $baseDn, $attribute . '=' . $value); 
    if ($r) 
    {        
        ldap_sort($ds, $r, "sn"); 
        return ldap_get_entries($ds, $r); 
    } 
} 

function DepartmentFindAll(){
	require_once("dbconnect.php");
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword );	
	$query = $db->prepare("SELECT value,department from departments ");
	$query->execute();
	$result = $query->fetchAll();
	$db=null;
	return $result;	
}

function register_user($username,$fullname,$department,$email,$alt_email,$mobile,$cpi,$gre)
{
	require_once("dbconnect.php");
	$db = new PDO("mysql:host=localhost;dbname=ugacademics", "ugacademics", "ug_acads" );	
	$created_at =date("Y-m-d H:i:s");
	$query = $db->prepare("INSERT INTO apping_database (username,fullname,department,email,alt_email,mobile,cpi,gre,created_at) VALUES (?,?,?,?,?,?,?,?,?)");	
	$query->execute(array($username,$fullname,$department,$email,$alt_email,$mobile,$cpi,$gre,$created_at));
	$db=null;
	
}    

function add_new_university($created_by,$university,$programme,$department,$status,$funding,$finally_accepted,$fundae){
//	require_once("dbconnect.php");
//	$db = new PDO("mysql:host=localhost;dbname=ugacademics", "ugacademics", "ug_acads" );
	$con = mysql_connect("localhost","ugacademics","ug_acads");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ugacademics", $con);	
	$query = mysql_query("INSERT INTO apping_database_university_data(username,university,programme,department,status,funding,finally_accepted,fundae) VALUES ('$created_by','$university','$programme','$department','$status','$funding','$finally_accepted','$fundae')");		
	//$query->execute("created_by");
//	$db=null;
}


function add_general_data($created_by,$recommenders,$general_fundae,$resume_location){
//	require_once("dbconnect.php");
//	$db = new PDO("mysql:host=localhost;dbname=ugacademics", "ugacademics", "ug_acads" );
	$con = mysql_connect("localhost","ugacademics","ug_acads");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ugacademics", $con);	
	$query = mysql_query("INSERT INTO apping_database_general_data(username,recommenders,general_fundae,resume_location) VALUES ('$created_by','$recommenders','$general_fundae','$resume_location')");		
	//$query->execute("created_by");
//	$db=null;
}

?>
