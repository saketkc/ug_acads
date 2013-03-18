<?php
session_start();
if (!(isset($_SESSION['id']))){
	header("location: index.php");
}
require_once 'connect.php';
    require_once 'functions.php';


        $rno=$_POST['searchrno'];
        $db = new PDO("mysql:dbname=fine;host=localhost","root","fedora13" );

        $query = $db->prepare("SELECT * FROM fine ORDER BY sno DESC ");
        $query->execute(array());



if(isset($_POST['change']) && isset($_POST['chno']))
{
    mark($_POST['chno']);
    
    header("Location: main.php");
    echo "Change To Paid";
    
}



if(isset($_GET['logout'])){
	
	session_destroy();
header("Location: index.php");

        
}


?>
<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Student Fine Portal, IIT Bombay </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Amit" >

   <!--  Le styles-->
    <link href="css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      } 
    </style> 
  

	 <script type="text/javascript" src="js/jquery.js"></script>
	 
	 
	 
	<script type="text/javaScript" src="js/bootstrap-dropdown.js"></script>
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="css/main.css" rel="stylesheet">
<script type="text/javascript">
	    $('.dropdown-toggle').dropdown();
</script>

</head>
<body>
<?php 
include('menu.php');
?>
<div class="container-fluid">
		<div class="row-fluid">
<span id="heading"><h2>Search</h2></span>
<hr>


  
    <form class="form-search" method="post" action="search.php">
    <input type="text" class="input-emedium search-query" placeholder="Roll Number" name="searchrno">  
    <button type="submit" class="btn">Search</button>
    </form>

<hr>
<span id="heading"><h2>All Entries</h2></span>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Roll No. </th>
                <th>Name</th>
                <th>Hostel</th>
                <th>Room No.</th>
                <th>Matter</th>
                <th>Fine</th>
                <th>Date</th>
                <th>Paid</th>
                <th>Change Status</th>
            </tr>
        </thead>
        <tbody>
       
           <?php  
          // echo $sresult;
         //  while ($row = mysql_fetch_assoc($sresult)) {
           // echo $row;
         //   echo $row['sno'];
//  echo 1;    
            while($row = $query->fetch())
        {
	      echo "<tr>";   
            echo "<td>" .$row['sno'] ."</td>";
            echo "<td>" .$row['rno'] ."</td>";
            echo "<td>" .$row['name'] ."</td>";
            echo "<td>" .$row['hostel'] ."</td>";
            echo "<td>" .$row['room'] ."</td>";
            echo "<td>" .$row['matter'] ."</td>";
            echo "<td>" .$row['fine'] ."</td>";
            echo "<td>" .$row['date'] ."</td>";
if ($row['flag']==0){

            echo "<td>" ."Unpaid"."</td>";
}
else{
echo "<td>". "Paid"."</td>";
}
if ($row['flag']==0){

          ?>
<td><form class="form-search" method="post" action="viewall.php">
        
          
                     <input type="hidden" name="chno" value="<?php echo $row['sno']; ?>">   
                      <input type="submit" name ="change" value="Change Status" class="btn btn-primary"> 
              
    </form>
</td>
  <?php 
}
            echo "</tr>";
            
           }
            ?>
        
        </tbody>
    </table>

</body>
</html> 
 

