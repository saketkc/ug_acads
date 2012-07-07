<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}

        
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/png" href="src/favicon.png">
<link rel="image_src" href="src/logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Enter your choices</title>






</head>
<body>
<div class="container-fluid" id="container">
  
    <div class="row-fluid" id="main">
       
        
        <div class="span3" id="content">
                <a href="main.php" title="Home"></a>
            
             
           
            <div id="separation" class="span8"></div>
            <div class="span8" id="search">
                <form class="form-horizontal" name="adduser" action="searchresult.php" method="post">  
        <fieldset>  
          <legend>Enter your Deptt and Year</legend>  
          <p id="r3">Enter your Department and Year below.</p>
          <br>
          <div class="control-group">  
            <label class="control-label" for="select01">Department</label>  
            <div class="controls">  
              <select id="select01" name="dep">  
                 <option>Chemical (B.Tech) 2009 Batch</option>  
                <option>Chemical (DD) 2009 Batch</option>  
   <option>Civil (B.Tech) 2009 Batch</option>  
                <option>CSE 2009 Batch</option>  
                <option>Electrical B.Tech 2009 Batch</option> 
   <option>Electrical DD-CSP 2009 Batch</option>  
                <option>Electrical DD-Micro 2009 Batch</option>  
                
              </select> 
               
            </div>  
          </div>   
            <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Enter</button>  
           <br>
            
          </div>  
        </fieldset>  
</form>  
           
            </div>
            
           
                
            </div>
           
        </div>
        
          
    </div>
    
</div>
</body>
</html>
