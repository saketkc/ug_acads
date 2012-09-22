<?php
require_once("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="static/js/showhide.js"></script>
<!-- InstanceBeginEditable name="documentready2" -->

<script type="text/JavaScript" src="static/js/jquery.mousewheel.js"></script>
<script type="text/JavaScript" src="static/js/slimbox-2.03/js/slimbox2.js"></script>
<script type="text/JavaScript" src="static/js/cloud-carousel.1.0.5.js"></script>
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


<title> Online Notice Board Demo </title>
</head>
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

          
      
      
          
          <!-- ************************* -->
           
<!-- ************************ -->
          

            <div id="da-vinci-title"  ></div>
      		<div id="da-vinci-alt" ></div>
          
<div id="but1" class="carouselLeft" style="position:absolute;top:20px;right:64px;"></div>
	<div id="but2" class="carouselRight" style="position:absolute;top:20px;right:20px;"></div>      
 	</div>
 <?php
 $posters= fetch_all_posters("category");
 
 for ($i=0;$i<count($posters);$i++){
	 print_r( $posters[$i]);
	 
 }
 
 ?>
         
