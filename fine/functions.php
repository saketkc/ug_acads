<?php
require_once 'connect.php';

function authenticate($id,$pass){
 if ($id=="admin" && $pass=="12345")
{
return 1;
}
else{
return 0;
}

}


function add($rno,$name,$hostel,$room,$matter,$fine,$flag)
{
	$db=new PDO("mysql:dbname=fine;host=localhost","root","fedora13" );
       
	$date=date("Y:m:d H:i:s");
	$query=$db->prepare("INSERT INTO fine (rno,name,hostel,room,matter,fine,flag,date) VALUES (?,?,?,?,?,?,?,?)");
         echo "done 2";
	$query->execute(array($rno,$name,$hostel,$room,$matter,$fine,$flag,$date));
}
function search($rno)
{
	  $db = new PDO("mysql:dbname=fine;host=localhost","root","fedora13" );

        $query = $db->prepare("SELECT * FROM fine WHERE rno= :rno ");
        $query->execute(array(':rno' => $rno));
        while($result = $query->fetch())
        {
        echo $result['rno'] ."sd";     
        }
       
        return $result;
        

}

function viewall($rno)
{
	  $db = new PDO("mysql:dbname=fine;host=localhost", "root", "fedora13" );

        $query = $db->prepare("SELECT * FROM fine ORDER BY sno DESC");
        $query->execute(array($rno));
        $result = $query->fetchAll();
        $db=null;
        return $result;

}
function mark($sno)
{
	  $db = new PDO("mysql:dbname=fine;host=localhost", "root", "fedora13" );

        $query = $db->prepare("UPDATE fine SET flag=1 WHERE sno=? ");
        $query->execute(array($sno));
        $result = $query->fetchAll();
        $db=null;
}






?>
