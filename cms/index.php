<html>


<head>
    <title>CMS For UG Acads</title>
    <?php
require_once("functions.php");
$alldepartments = DepartmentFindAll();
if(isset($_POST['submit'])){
$ldap_id = $_POST['ldap'];
$password = $_POST['ldap_password'];
$type_of_request = $_POST['type-of-request'];
$query = $_POST['query'];
$department = $_POST['department'];
if (ldap_auth($ldap_id,$password)){
     $id = insert_into_database($ldap_id,$type_of_request,$request_text,$department);
     $message = "Your request has been recorded";
     $info = ldap_find_all('uid',$ldap_id);
     $fullname = $info[0]["cn"][0];
     $url = "http://ugacads-iitb.appspot.com/mail?ldap_id="+$ldap_id+"&request_id=UG"+$id+"&query_text="+$request_text+"&department="+$department+"&fullname="+$fullname+"&request_type="+$request_type;
     $ch = curl_init(); 
     curl_setopt($ch, CURLOPT_URL, $url); 
     curl_setopt($ch, CURLOPT_GET, 1); 
     curl_setopt($ch, CURLOPT_GETFIELDS, "");
     echo curl_exec ($ch); 
     curl_close ($ch); 
     
}
else {
    $message = "Login Failed";
    
}
}
?>
</head>
<body>
    <?php echo $message; ?>
<form method="POST">
    <table>
    <tr>
    <td><label>LDAP ID</label></td><td><input type='text' name='ldap' id='ldap'></td>
    </tr>
    <tr>
    <td><label>Password</label></td><td><input type='password' name='password' id='password'></td>
    </tr>
    
    <tr>
    <td><label>Department</label></td><td>
<?php
    foreach ($alldepartments as $key=>$value){
    
        echo "<option value='" . $value['value']. "'>".$value['department']."</option>";

    }
?>

    </td>
    </tr>
    <tr><td><label>Request Type</label></td><td><select name='type-of-request'><option value="registration">Registration</option><option value="others">Others</option></select></td></tr>
    <tr><td><label>Query</label></td><td><textarea name='query'></textarea></td></tr>
    </table>

</form>
</body>
</html>
