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

function mail_subscription($category){
	$db = new PDO("mysql:dbname=ugacademics;host=localhost", "root", "fedora" );
	$query = $db->prepare("SELECT ldap_id FROM ug_acads_gymkhana_subscriptions WHERE category=? ");
	$result = $query->execute(array($category));
	while ($row = $query->fetch(PDO::FETCH_ASSOC)){
		exec("python mailer.py $row subject body");
	}
	
}


function update_google_calendar($event_name, $start_date, $start_time, $end_date, $end_time, $location, $description, $category)
{
	
	 $url = "http://ugacads-calendar.appspot.com/?start_date=".urlencode($start_date)."&start_time=".urlencode($start_time)."&end_date=".urlencode($end_date)."&end_time=".urlencode($end_time)."&title=".urlencode($event_name)."&description=".urlencode($description)."&location=".urlencode($location)."&category=".urlencode($category);
//echo $url;
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_PROXY, 'http://netmon.iitb.ac.in');
     curl_setopt($ch, CURLOPT_PROXYPORT, 80);
     curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'saket.kumar:thisisit1314.');
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_GET, 1);
     curl_setopt($ch, CURLOPT_GETFIELDS, "");
     curl_exec ($ch);
     curl_close ($ch);

}


function add_poster($username,$event_name,$start_date,$start_time,$end_date,$end_time,$location,$poster_location,$category, $description){
	$db = new PDO("mysql:dbname=ugacademics;host=localhost", "root", "fedora" );
	$created_at =date("Y-m-d H:i:s");
	$sql = "INSERT INTO ug_acads_gymkhana_posters(uploaded_by,event_name,event_start_date,event_start_time,event_end_date,event_end_time,event_location,event_poster_location,event_category,description) VALUES(?,?,?,?,?,?,?,?,?,?)";
	
	$query = $db->prepare($sql);
	$query->execute(array($username,$event_name,$start_date,$start_time,$end_date,$end_time,$location,$poster_location,$category,$description));
	$start_date = str_replace (" ", "", $start_date);
	$end_date = str_replace (" ", "", $end_date);
	$end_time = str_replace (" ", "", $end_time);
	$start_time = str_replace (" ", "", $start_time);
	//$start_time = substr_replace($start_time,'-',3,3);
	//$end_time = substr_replace($end_time,'-',3,3);
	
    update_google_calendar($event_name, $start_date, $start_time, $end_date, $end_time, $location, $description, $category);
	//return $query;

}
?>
