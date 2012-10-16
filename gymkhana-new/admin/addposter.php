<?php
session_start();
require_once("functions.php");
if (!isset($_SESSION['username'])){
		header("location: index.php");

}
if (isset($_POST['poster-submit'])){
	$start = $_POST['start'];
	$end = $_POST['end'];
	$event_name = $_POST['event-name'];
	$location = $_POST['location'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$s_times = explode("@",$start);
	$start_date = $s_times[0];
	$start_time = $s_times[1];
	$e_times = explode("@",$end);
	$end_date = $e_times[0];
	$end_time = $e_times[1];
	
	$upload_dir = "/var/www/ug_acads/gymkhana-new/uploads";
	//echo "DDD".$start_date,$start_time;
	$username = $_SESSION['username'];
	$tf = $upload_dir.'/'.md5(rand()).".test";
$f = @fopen($tf, "w");
if ($f == false) 
    die("Fatal error! {$upload_dir} is not writable. Set 'chmod 777 {$upload_dir}'
        or something like this");
fclose($f);
unlink($tf);

	 if (isset($_FILES['file']))  // file was send from browser
    {
		
        if ($_FILES['file']['error'] == UPLOAD_ERR_OK)  // no error
        {
			
			
	        $filename = $_FILES['file']['name']; // file name 
	        
            $extension=pathinfo($filename, PATHINFO_EXTENSION);
            $event_n = str_replace (" ","_",$event_name);
	        $filename = "$category"."_"."$event_n"."_"."$start_date"."_"."."."$extension";            
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.'/'.$filename);            
            $result = 'Ev';
            
        }
     elseif ($_FILES['file']['error'] == UPLOAD_ERR_INI_SIZE)
        $result_msg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
     else 
      $result_msg = 'Unknown error';

    }
    $poster_location =  "uploads/".$filename;
	add_poster($username,$event_name,$start_date,$start_time,$end_date,$end_time,$location,$poster_location,$category,$description);
	mail_subscription($category);
	$message = "Event Updated successfully";
	//$db = new PDO("mysql:dbname=ugacademics;host=localhost", "root", "fedora" );
	//$created_at =date("Y-m-d H:i:s");
	//$sql = "INSERT INTO ug_acads_gymkhana_posters(uploaded_by,event_name,event_start_date,event_start_time,event_end_date,event_end_time,event_location,event_poster_location,event_category) VALUES(?,?,?,?,?,?,?,?,?)";
	
	//$query = $db->prepare($sql);
	
	//$query->execute(array("username","event_name","start_date","start_time","end_date","end_time","location","poster_location","category"));
	

	
}

?>
<!doctype html>
<html>
<head>
	<title>Gymkhana Admin | Add poster </title>
	<link rel="stylesheet" href="../static/css/jquery-ui.css">
	<script type="text/javascript" src="../static/js/jquery.min.js"> </script>
	<script type="text/javascript" src="../static/js/jquery-ui.min.js"> </script>
	<script type="text/javascript" src="../static/js/jquery-ui-timepicker-addon.js"> </script>

	 <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javaScript" src="../js/bootstrap-dropdown.js"></script>
	<link href="../static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<link rel="apple-touch-icon-precomposed" href="">
	<link href="../css/main.css" rel="stylesheet">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/flip.css" rel="stylesheet">
    <link href="css/html5.css" rel="stylesheet">

	<script>
	$(document).ready(function(){
		$('#start').datetimepicker({
			timeFormat: 'h-m',
			separator: ' @ ',
			dateFormat : 'dd-mm-yy',
			hour: 18,
			minute: 010,
			
			
		});
		
		$('#end').datetimepicker({
			timeFormat: 'h-m',
			separator: ' @ ',
			dateFormat : 'dd-mm-yy',
			hour: 20,
			minute : 010,
		});

		});
	</script>
</head>
<body>
  <?php 
include('../menu.php');
?>
<div id="uploadbox">
	<fieldset>
		<form method="POST" action="" enctype="multipart/form-data">
			<label> Event Name </label>
			<div><input type="text" id="event" name="event-name"></div>
			<label> Start Time </label>
			<div><input type="text" id="start" name="start"></div>
			<label> End Time</label>
			<div><input type="text" id="end" name="end"></div>
			<label> Location</label>
			<div><input type="text" id="location" name="location"></div>
			<label> Description</label>
			<div><textarea rows=4 col=20 id="description" name="description"></textarea></div>
			
			<label>Upload Poster </label>
			<div><input type="file" id="file" name="file"></div>
			<label>Category</label>
			<select name="category">
											<option value = "acads">
												Academics
											</option>
											<option value = "cult">
												Cultural
											</option>
											<option value = "sports">
												Sports
											</option>
											<option value = "tech">
												Technical
											</option>
											<option value = "hostel">
												Hostel
											</option>
											
											<option value = "general">
												General
											</option>
										</select>
									
			
<br>			
			<input type="submit" class="btn-large" value="Submit" name="poster-submit">
		</form>
	</fieldset>
</div>		
</body>
</html>
