<html>
<?php

$host = "localhost";
$userr = "root";
$pass = "RectumSempra";
$db = "test";
$r = mysql_connect($host, $userr, $pass);

if (!$r)
{
echo "Could not connect to server</br>";
trigger_error(mysql_error(), E_USER_ERROR);
}

mysql_select_db($db) or die(mysql_error());

mysql_query("CREATE TABLE credentials(id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), user VARCHAR(30), pass VARCHAR(10), club VARCHAR(20)") or die(mysql_error());

$club[0]="Fourth Wall";
$club[1]="Vaani";
$club[2]="Saaz & Stacatto";
$club[3]="Rang";
$club[4]="Speakers club";


echo "</br></br><b>Table Created</b>";
for($i=11,$j=0;$i<16;$i+=1,$j+=1){
	$c=$club[$j];
	$u="user".$i;
	$num=$i*2;
	$p="passwordis".$num;
	
   mysql_query("INSERT INTO credentials (user,pass,club) VALUES ('$u','$p','$c')") or die(mysql_error());
}

echo "</br></br></br><b>Data successfully entered</b>";

mysql_close();

?>

</html>