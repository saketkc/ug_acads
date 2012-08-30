<?php
session_start();
if (!isset($_SESSION['username'])){
		header("location: index.php");

}
if (isset($_POST['poster-submit'])){
	$start = $_POST['start'];
	$end = $_POST['end'];
	$location = $_POST['location'];
	$s_times = explode(" @ ",$start);
	$start_date = $s_times[0];
	$start_time = $s_times[1];
	$e_times = explode("@",$end);
	$end_date = $e_times[0];
	$end_time = $e_times[1];
	echo "DDD".$start_date,$start_time;
	
	add_poster($_SESSION['username'],$start_date,$start_time,$end_date,$end_time,$location,"poster_location",$category);
	
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
	<script>
	$(document).ready(function(){
		$('#start').datetimepicker({
			timeFormat: 'h:m',
			separator: ' @ ',
			dateFormat : 'dd-mm-yy',
			hour: 18
			
			
		});
		
		$('#end').datetimepicker({
			timeFormat: 'h:m',
			separator: ' @ ',
			dateFormat : 'dd-mm-yy',
			hour: 20
		});

		});
	</script>
</head>
<body>
	<fieldset>
		<form method="POST" action="">
			<label> Start Time </label>
			<div><input type="text" id="start" name="start"></div>
			<label> End Time</label>
			<div><input type="text" id="end" name="end"></div>
			<label> Location</label>
			<div><input type="text" id="location" name="location"></div>
			<label>Upload Poster </label>
			<div><input type="file" id="file" name="file"></div>
			<label>Category</label>
			<option value = "0" selected = "selected">
												Choose a category
											</option>
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
									</td>
			
			
			<input type="submit" value="Submit" name="poster-submit">
		</form>
	</fieldset>
		
</body>
</html>
