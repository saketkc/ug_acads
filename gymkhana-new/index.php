<?php
require_once("functions.php");
?>
<?php
$posters= fetch_all_posters();
$all_calendar = '<iframe src="https://www.google.com/calendar/embed?title=All%20Events&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=kq47jpfc8ell2b240i5evuqlio%40group.calendar.google.com&amp;color=%23B1440E&amp;src=ml8manl0cc1lp2d6r867fu74tk%40group.calendar.google.com&amp;color=%23B1365F&amp;src=3903h5a6o85l9l84lveg61dvbo%40group.calendar.google.com&amp;color=%236B3304&amp;src=4d0c12953h02ur7rkuumhuktu8%40group.calendar.google.com&amp;color=%235229A3&amp;src=qcisaissdqkbgteubkr0ibgvoc%40group.calendar.google.com&amp;color=%23333333&amp;src=ugacads.iitb%40gmail.com&amp;color=%232F6309&amp;src=%23contacts%40group.v.calendar.google.com&amp;color=%23875509&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';

$acads_calendar = '<iframe src="https://www.google.com/calendar/embed?title=Academics&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=kq47jpfc8ell2b240i5evuqlio%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';

$cult_calendar = '<iframe src="https://www.google.com/calendar/embed?title=Cultural&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=ml8manl0cc1lp2d6r867fu74tk%40group.calendar.google.com&amp;color=%23B1365F&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';

$hostel_calendar = '<iframe src="https://www.google.com/calendar/embed?title=Hostel&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=3903h5a6o85l9l84lveg61dvbo%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';

$tech_calendar = '<iframe src="https://www.google.com/calendar/embed?title=Tech&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=qcisaissdqkbgteubkr0ibgvoc%40group.calendar.google.com&amp;color=%23333333&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';

$sports_calendar = '<iframe src="https://www.google.com/calendar/embed?title=Sports&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=300&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=4d0c12953h02ur7rkuumhuktu8%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=Asia%2FCalcutta" style=" border:solid 1px #777 " width="250" height="250" frameborder="0" scrolling="no"></iframe>';
$event_names = array();
$poster_locations = array();
$event_category = array();
$poster_id = array();
for ($i=0;$i<count($posters);$i++){
	$start_time = $posters[$i]["event_start_date"];//." ".$posters[$i]["event_start_time"];
	$end_time = "now";//$posters[$i]["event_end_date"]." ".$posters[$i]["event_end_time"];
	$datetime1 = date_create($start_time);
	$datetime2 = date_create($end_time);
	$interval = date_diff($datetime2, $datetime1);
	$days = $interval->format('%R%a');
	
	if ($days<=7 && $days>=0)
	{
		array_push($poster_id, $posters[$i][0]);
		array_push($event_names , $posters[$i]["event_name"]." at ".$start_time.",".$posters[$i]["event_start_time"]);
		array_push($poster_locations, $posters[$i]["event_poster_location"]);
		array_push($event_category, $posters[$i]["event_category"]);
	 }

}


?>

<?
	$all ="<div id=\"all-carousel\" style=\"\">";
	$all_count =0;
	for($i=0;$i<count($event_names);$i++){
		
		
					
			$all = $all."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\"	 title=\"$event_names[$i]\"/></a>";
			$all_count=$all_count+1;
		
	}
	if ($all_count <= 0){
		$all = "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
	}
	$all =$all."</div>";
?>


<?
	$sports ="<div id=\"sports-carousel\" style=\"width:570px; height:384px;overflow:scroll;\">";
	$sports_count =0;
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "sports"){
					
			$sports = $sports."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\" title=\"$event_names[$i]\"/></a>";
			$sports_count=$sports_count+1;
			//echo $sports;
		}
	}
	if ($sports_count<=0){
		$sports =  "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
		
	}
	$sports =$sports."</div>";
?>

<?
	$tech ="<div id=\"tech-carousel\" style=\"width:570px; height:384px;\">";
	$tech_count = 0;
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "tech"){
					
			$tech =$tech."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\" title=\"$event_names[$i]\"/></a>";
			$tech_count = $tech_count+1;
		}
	}
	if ($tech_count<=0){
		$tech = "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
	}
	$tech =$tech."</div>";
?>

<?
	$cult ="<div id=\"cult-carousel\" style=\"width:570px; height:384px;\">";
	$cult_count = 0;
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "cult"){
					
			$cult =$cult."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\" title=\"$event_names[$i]\"/></a>";
			$cult_count = $cult_count+1;
		}
	}
	if ($cult_count<=0){
		$cult = "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
	}
	$cult =$cult."</div>";
?>

<?
	$hostel ="<div id=\"hostel-carousel\" style=\"width:570px; height:384px;\">";
	$hostel_count = 0;
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "hostel"){
					
			$hostel = $hostel."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\" title=\"$event_names[$i]\"/></a>";
			$hostel_count = $hostel_count+1;
			//echo $sports;
		}
	}
	if ($hostel_count<=0){
		$hostel = "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
	}
	$hostel = $hostel."</div>";
?>

<?
	$acads ="<div id=\"acads-carousel\" style=\"width:570px; height:384px;\">";
	$acads_count = 0;
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "acads"){
					
			$acads = $acads."<a class=\"notice\" href=\"$poster_locations[$i]\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"$poster_locations[$i]\" width=\"128\" height=\"164\" title=\"$event_names[$i]\"/></a>";
			$acads_count = $acads_count+1;
			//echo $sports;
		}
	}
	if ($acads_count<=0){
		$acads = "<div id=\"no-poster\"><a class=\"notice\" href=\"uploads/no-image.jpg\" rel=\"lightbox\" id=\"notice\"><img class=\"cloudcarousel\" src=\"uploads/no-image.jpg\" width=\"128\" height=\"164\" title=\"No Event\"/></a> ";
	}
	$acads = $acads."</div>";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gymkhana, IIT Bombay </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Amit" >

   <!--  Le styles-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/flip.css" rel="stylesheet">
    <link href="css/html5.css" rel="stylesheet">
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
	 
	 
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.js"></script>
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.pack.js"></script>
	 <script type="text/javaScript" src="static/js/jquery.mousewheel.js"></script>
	 <script type="text/javaScript" src="static/js/slimbox2.js"></script>
	 <script type="text/javaScript" src="static/js/cloud-carousel.1.0.5.js"></script>
	 <script type="text/javaScript" src="js/jquery.flip.js"></script>
	 
	<script type="text/javaScript" src="js/bootstrap-dropdown.js"></script>
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<link href="static/css/fancybox.css" rel="stylesheet" type="text/css" />	
	<link rel="apple-touch-icon-precomposed" href="">
	<link href="css/main.css" rel="stylesheet">

	<script type="text/javascript">

	$(document).ready(function(){
		
		$("#sub-submit").click(function(){
			var email = $("#sub-email").val();
			var password = $("#sub-password").val();
			$.ajax({
				type: "POST",
				url: "authenticate.php",
				data : {"email":email , "password":password},
			}).done(function(msg){
				$("#data").html();
				$("a#single_image").trigger("click");
				
			
		});
	});
		
	    $('.dropdown-toggle').dropdown();	
		$("a.notice").fancybox();
		$("#notices-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,
			titleBox: $('#notice-title'),
			altBox: $('#alt-box'),
			buttonLeft: $('#but1'),
			buttonRight: $('#but2'),
			yRadius:40,
			xPos: 400,
			yPos: 80,
			speed:0.15,			
					autoRotate:'left',
									autoRotateDelay:2400,
			
		});
		
			
			
	});
	</script>
 
    
    
    <script type="text/javascript">
		$(function(){
			
			$(".clickers").bind("click",function(){
				var id = (this).id;
				var cal = "";
				var colors = "";
				var contents = "";
				
				switch(id){
					case "acads":
						cal = '<?php echo $acads_calendar; ?>';
						colors = "#FFFFFF";
						
						contents = '<?php echo $acads;?>';
						break;
					case "hostel":
						cal = '<?php echo $hostel_calendar; ?>';
						colors = "#FFFFFF";
						contents = '<?php echo $hostel;?>';
						break;
					case "tech":
						cal = '<?php echo $tech_calendar; ?>';
						colors = "#FFFFFF";
						contents = '<?php echo $tech;?>';
						break;
					case "sports":
						cal = '<?php echo $sports_calendar; ?>';
						colors = "#FFFFFF";
						contents = '<?php echo $sports;?>';
						break;
					case "cult":
						cal = '<?php echo $cult_calendar; ?>';
						colors = "#FFFFFF";
						contents = '<?php echo $cult;?>';
						break;
					case "all":
						cal = '<?php echo $all_calendar; ?>';
						colors = " #FFFFFF";
						contents = '<?php echo $all;?>';
						break;
					
					
						
					
					
					
					
				}
				console.log(contents);
						$("#flipbox").flip({
							direction: "lr",
							color: colors,
							content: contents,//(new Date()).getTime(),
							onEnd: function(){
								$("a.notice").fancybox();
								console.log("ENDED")
								$("#"+id+"-carousel").CloudCarousel( { 
									reflHeight: 56,
									reflGap:2,		
									yRadius:40,
									xPos: 400,
									yPos: 80,
									titleBox: $('#notice-title'),
									altBox: $('#da-vinci-alt'),
									speed:0.15,
									autoRotate:'left',
									autoRotateDelay:1400,
			
							});
				$("#notice-carousel").CloudCarousel( { 
									reflHeight: 56,
									reflGap:2,		
									yRadius:40,
									xPos: 400,
									yPos: 80,
									titleBox: $('#notice-title'),
									altBox: $('#da-vinci-alt'),
									speed:0.15,
									autoRotate:'left',
									autoRotateDelay:1400,
			
							});
						
							}
					
					
					
				});
					$("#cal2").fadeOut("slow");
     				$("#cal2").html(cal);
     				$("#cal2").fadeIn("slow");
			});
				
			
		});
	</script>		
  
</head>



<body>
     <?php 
include('menu.php');
?>
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3" id="lbar">
				<div id="cal1">
					<?php echo $all_calendar; ?>
				</div>
				<div id="sidetilespace">
				</div>
				<div id ="cal2">
					<?php echo $all_calendar; ?>
				</div>
			</div><!--/span-->  
        
			<div class="row-fluid">
				<div id="hidden-href">
					<div id="data"></div>

				</div>

				<a id="single_image" href="#data"></a>
				<div class="well sidebar-nav" id="tbar">
					<ul class="nav nav-list">
						<a href="#all" class="clickers"  id="all"><div id="sidetileo">   <div id="sidetile" style="background-color:#00AEDB;"> <h2>All</h2></div></div></a>
						<a href="#acads" class="clickers" id="acads" ><div id="sidetileo">   <div id="sidetile" style="background-color:#FFC425;"><h2>Academics</h2></div></div></a>
						<a href="#cult" class="clickers" id="cult" ><div id="sidetileo">   <div id="sidetile" style="background-color:#00B159;"><h2>Cultural</h2></div></div></a>
						<a href="#sports" class="clickers" id="sports"><div id="sidetileo">   <div id="sidetile" style="background-color:#F37735;"><h2>Sports</h2></div></div>	
						<a href="#tech" class="clickers"  id="tech"><div id="sidetileo">   <div id="sidetile" style="background-color:#EC098C;"><h2>Technical</h2></div></div></a>
						<a href="#hostel" class="clickers"  id="hostel"><div id="sidetileo">   <div id="sidetile" style="background-color:#7C4199;"><h2>Hostel</h2></div></div></a>
					</ul>
				</div><!--/.well -->
			</div><!--/row-fluid-->  		
        
        
			<div class="span10" id="flipcont">
				<div id="notice-title">
				</div>					
				<div  id="flipbox" class="hero-unit">
					<div id="flipboxerr">
						
							<!--	<div id="but2" class="carouselRight" >Clickem </div> -->     
 	
         
						<div id="notices-carousel" style="width:870px; height:384px;">
							
							<?
								if (count($event_names) >0){
									for($i=0;$i<count($event_names);$i++){
									
			
										echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='196' title='$event_names[$i]'/></a> ";
									
									}
								}
								else{
										echo "<a class='notice' href='uploads/no-image.jpg' rel='lightbox' id='notice'><img class='cloudcarousel' src='uploads/no-image.jpg' width='328' title='No Event'/></a> ";
										echo "<a class='notice' href='uploads/no-image.jpg' rel='lightbox' id='notice'><img class='cloudcarousel' src='uploads/no-image.jpg' width='328' title='No Event32'/></a> ";
									}
								?>
						</div>
					</div>					
				</div>			
				
			</div>
					<div id="but2" class="carouselLeft">
						<img src="static/images/prev.png">
						</div>	
					<div id="but1" class="carouselLeft">
						<img src="static/images/next.png">
						</div>						
			<div id="subscribe">
               <div class="form-inline">
    				<input type="text" id="sub-email" class="input-small" placeholder="Email">
					<input type="password" id="sub-password" class="input-small" placeholder="Password">
  				    <input type="submit" class="btn" id="sub-submit" value="Subscribe">
  			   </div>
			</div>
		</div><!--/span-->     
	</div><!--/row-->


	<!--<div id="footer">

		<div id="infifooter">
			<span id="footertext">Copyright UG Academics Team | IIT Bombay</span> 
		</div>
	</div>
</body>

</html>
