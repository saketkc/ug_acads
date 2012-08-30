<?php

function cleanQuery($string)
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  $badWords = array("/delete/i", "/update/i","/union/i","/insert/i","/drop/i","/http/i","/--/i");
  $string = preg_replace($badWords, "", $string);
  if (phpversion() >= '4.3.0')
  {
    $string = mysql_real_escape_string($string);
  }
  else
  {
    $string = mysql_escape_string($string);
  }
  return $string;
}


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
	$db = new PDO("mysql:dbname=bookbay;host=localhost", "root", "fedora13" );
	
	$query = $db->prepare("SELECT username FROM users WHERE username=?");
	$query->execute(array($ldap_id));
	$is_registered = $query->rowCount();
	$db=null;
	return $is_registered;
}

function ldap_find_all($attribute = 'uid', $value = '*', $baseDn = 'dc=iitb,dc=ac,dc=in') 
{  
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    $r = ldap_search($ds, $baseDn, $attribute . '=' . $value); 

    if ($r) 
    { 
        //if the result contains entries with surnames, 
        //sort by surname: 
        ldap_sort($ds, $r, "sn"); 

        return ldap_get_entries($ds, $r); 
    } 
} 

function DepartmentFindAll(){
	
	$db = new PDO("mysql:dbname=bookbay;host=localhost", "root", "fedora13" );
	
	$query = $db->prepare("SELECT value,department from departments ");
	$query->execute();
	$result = $query->fetchAll();
	$db=null;
	return $result;
	
	
}

function admin_login($username,$password){
	$db = new PDO("mysql:dbname=ugacademics;host=localhost", "root", "fedora" );
	$query = $db->prepare("SELECT COUNT(*) FROM ug_acads_gymkhana_admins WHERE username=? AND password=?");
	$result = $query->execute(array($username,$password));
	$number_of_rows = $query->fetchColumn();
	return $number_of_rows;
}
function add_poster($username,$start_date,$start_time,$end_date,$end_time,$location,$poster_location){
	$db = new PDO("mysql:dbname=bookbay;host=localhost", "root", "fedora13" );
	$created_at =date("Y-m-d H:i:s");
	$query = $db->prepare("INSERT INTO ug_acads_gymkhana_


}
function register_user($username,$fullname,$department,$email,$alt_email,$year_of_study,$mobile,$hostel,$room)
{
	$db = new PDO("mysql:dbname=bookbay;host=localhost", "root", "fedora13" );
	$created_at =date("Y-m-d H:i:s");
	$query = $db->prepare("INSERT INTO users (username,fullname,department,email,alt_email,year_of_study,mobile,hostel,room,created_at) VALUES (?,?,?,?,?,?,?,?,?,?)");
	
	$query->execute(array($username,$fullname,$department,$email,$alt_email,$year_of_study,$mobile,$hostel,$room,$created_at));
//	$db=null;
	
	
	
	
}    

function add_new_book($created_by,$name,$semester,$course,$cost,$tags){
$db = new PDO("mysql:dbname=bookbay;host=localhost", "root", "fedora13" );
$query=$db->prepare("INSERT INTO books(created_by,name,semester_used,course,cost,tags) VALUES (?,?,?,?,?,?)");
$query->execute(array($created_by,$name,$semester,$course,$cost,$tags));
return true;
}
?>
