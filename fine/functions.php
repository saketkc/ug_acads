<?php
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
	$db=new PDO("mysql:dbname=fine;host=loclahost","root","fedora13" );
	$date=date("Y:m:d H:i:s");
	$query=$db->prepare("INSERT INTO fine (rno,hostel,room,matter,fine,flag,date) VALUES (?,?,?,?,?,?,?)");
	$query->execute(array($rno,$name,$hostel,$room,$matter,$fine,$flag,$date));
}
function search($rno)
{
	  $db = new PDO("mysql:dbname=fine;host=localhost", "root", "fedora13" );

        $query = $db->prepare("SELECT * FROM fine WHERE rno=? ");
        $query->execute(array($rno));
        $result = $query->fetchAll();
        $db=null;
        return $result;

}
function mark($sno)
{
	  $db = new PDO("mysql:dbname=fine;host=localhost", "root", "fedora13" );

        $query = $db->prepare("UPDATE fine SET flag=1 WHERE sno=? ");
        $query->execute(array(sno));
        $result = $query->fetchAll();
        $db=null;
}






?>
