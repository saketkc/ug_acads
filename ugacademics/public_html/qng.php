
<?php
require_once("ug_acads/cms/functions.php");
$alldepartments = DepartmentFindAll();
$message="";
if(isset($_POST['submit'])){
$ldap_id = $_POST['ldap'];
$password = $_POST['password'];
$type_of_request = $_POST['type-of-request'];
$query = $_POST['query'];
$department = $_POST['department'];
if (ldap_auth($ldap_id,$password)){
     $id = insert_into_database($ldap_id,$type_of_request,$query,$department);
     $message = "Your request has been recorded";
     $info = ldap_find_all('uid',$ldap_id);
     $fullname = $info[0]["cn"][0];
     $year = explode('/',$info[0]["mailmessagestore"][0]);
     $year_of_study = 2013 - $year[2];
   $roll_no = $year[4];

     $url = "http://ugacads-iit.appspot.com/mail?ldap_id=".urlencode($ldap_id)."&request_id=UG$id&query_text=".urlencode($query)."&department=$department&fullname=".urlencode($fullname)."&request_type=$type_of_request&roll_no=$roll_no&year_of_study=$year_of_study";
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
else {
    $message = "Login Failed";
    
}
}
?>
<?php include 'include/header.php' ?>
	<div id="content" class="bgnavcolor">
        <?php include 'include/sidebar.php' ?>
        <div id="main_content" class="white" width="760">
        	<h1>Query & Grievence Portal</h1>
            <div class="content_text">
<fieldset>
<center>

<strong>    <?php 
echo $message; ?></strong>
<form method="POST">
    <table>
    <tr>
    <td><label><strong>LDAP ID:</strong></label></td><td><input type='text' name='ldap' id='ldap'></td>
    </tr>
    <tr>
    <td><label><strong>Password:</strong></label></td><td><input type='password' name='password' id='password'></td>
    </tr>
    
    <tr>
    <td><label><strong>Department:</strong></label></td><td><select name="department" id="department">
<?php
    foreach ($alldepartments as $key=>$value){
    
      echo "<option value='" . $value['value']. "'>".$value['department']."</option>";

   }
?>

    </select></td>
    </tr>
    <tr><td><label><strong>Request Type:</strong></label></td><td><select name='type-of-request'><option value="registration">Registration</option><option value="others">Others</option></select></td></tr>
    <tr><td><label><strong>Query:</strong></label></td><td><textarea  rows="10" cols="60" name='query'></textarea></td></tr>
<tr><td><td><input type="submit" name="submit" value="Submit"></td></td></tr>	
    </table>

</form></center></fieldset>
            </div>
        </div>
    </div>
<?php include 'include/footer.php' ?>
