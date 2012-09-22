<?php
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gymkhana, IIT Bombay </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="WebTeam UG Academic Council" >

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
  
     <script src="js/jquery.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="static/js/showhide.js"></script>
<script type="text/JavaScript" src="static/js/jquery.mousewheel.js"></script>
<script type="text/JavaScript" src="static/js/slimbox-2.03/js/slimbox2.js"></script>
<script type="text/JavaScript" src="static/js/cloud-carousel.1.0.5.js"></script>
     <script src="js/jquery.flip.js"></script>
     
  <!--    Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico"/>
    <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
  <link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
    <link rel="apple-touch-icon-precomposed" href="">
     <link href="css/main.css" rel="stylesheet">
<script type="text/javascript">

$(document).ready(function(){
		
	$("#da-vinci-carousel").CloudCarousel( { 
		reflHeight: 56,
		reflGap:2,
		autoRotate:'left',
		autoRotateDelay: 1200,
		titleBox: $('#da-vinci-title'),
		altBox: $('#da-vinci-alt'),
		buttonLeft: $('#but1'),
		buttonRight: $('#but2'),
		yRadius:40,
		xPos: 285,
		yPos: 120,
		speed:0.15,
		mouseWheel:true
	});
	
	$("#carousel2").CloudCarousel({			
		xPos:280,
		yPos:80,
		buttonLeft: $('#but3'),
		buttonRight: $('#but4'),				
		FPS:30,
		autoRotate: 'left',
		autoRotateDelay: 1200,
		speed:0.2,
		mouseWheel:true,
		bringToFront:true
	});	
		
});
</script>
 
    
    
    <script type="text/javascript">
			$(function(){
				
				$("#flipPad a:not(.revert)").bind("click",function(){
					var $this = $(this);
					$("#flipbox").flip({
						direction: $this.attr("rel"),
						color: $this.attr("rev"),
						content: $this.attr("title"),//(new Date()).getTime(),
						onBefore: function(){$(".revert").show()}
					})
					return false;
				});
				
				$(".ug").bind("click",function(){
										$("#flipbox").flip({
						direction: "tb",
						color: "red",
						content: "jkj",//(new Date()).getTime(),
						onBefore: function(){$(".revert").show()}
					})
					return false;
					
				});
				

				
			});
		</script>		
    
  </head>




<!-- InstanceBeginEditable name="documentready2" -->

<!--<script type="text/JavaScript" src="static/js/jquery.mousewheel.js"></script>
<script type="text/JavaScript" src="static/js/slimbox-2.03/js/slimbox2.js"></script>
<script type="text/JavaScript" src="static/js/cloud-carousel.1.0.5.js"></script>-->


<title> Online Notice Board Demo </title>
</head>

 <?php
 $posters= fetch_all_posters("");
 


$event_names = array();
$poster_locations = array();
$event_category = array();

 for ($i=0;$i<count($posters);$i++){
	 print_r($posters[$i]);
	 $start_time = $posters[$i]["event_start_date"]." ".$posters[$i]["event_start_time"];
	 
	 $end_time = "now";//$posters[$i]["event_end_date"]." ".$posters[$i]["event_end_time"];
	 $diff = abs(strtotime($start_time) - strtotime($end_time));	 
	 $years = floor($diff / (365*60*60*24));
	 $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	 $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	 //printf("%d years, %d months, %d days\n", $diff, $months, $days);
	 if ($days>=7){
		 array_push($event_names , $posters[$i]["event_name"]);
		 array_push($locations, $posters[$i]["event_poster_location"]);
		 array_push($event_category, $posters[$i]["event_category"]);
		 
		 
	 }

	 
 }
 
 
 ?>
<body>
<div id="midground">
	<div id="foreground">
		<div id='container'>
  
  
  <div id="content-container" >
    <div id='maincontent' >
       <h1>Test Poster</h1>
  
  
	

<div id="da-vinci-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
	          
              
        <a href="#" rel='lightbox' title="Leonardo Da Vinci"><img class="cloudcarousel" src="static/images/carousel/test9.png" width="128" height="164" alt="Test1" title="Leonardo Da Vinci" /></a>  
        <a href="#" rel='lightbox' title="Leonardo Da Vinci"><img class="cloudcarousel" src="static/images/carousel/test9.png" width="128" height="164" alt="Test1" title="Leonardo Da Vinci" /></a>  

          
          

            <div id="da-vinci-title"  ></div>
      		<div id="da-vinci-alt" ></div>
          
<div id="but1" class="carouselLeft" style="position:absolute;top:20px;right:64px;"></div>
	<div id="but2" class="carouselRight" style="position:absolute;top:20px;right:20px;"></div>      
 	</div>
