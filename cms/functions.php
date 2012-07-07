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
	$query = $db->prepare("SELECT value,department from ug_departments ");
	$query->execute();
	$result = $query->fetchAll();
	$db=null;
	return $result;	
}

function insert_into_database($ldap_id,$type_of_request,$request_text){
    
    $db = new PDO("mysql:dbname=ugacademics;host=localhost", "ugacademics", "ug_acads" );
    $query=$db->prepare("INSERT INTO cms_queries(ldap_id,type_of_request,request_text,department,created_at,status) VALUES (?,?,?,?,?,?)");
    $created_at =date("Y-m-d H:i:s");
    $query->execute(array($ldap_id,$type_of_request,$request_text,$department,$created_at,"pending"));
    return $db->lastInsertId();
}
?>
