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
    <meta name="author" content="Amit" >

   <!--  Le styles-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/flip.css" rel="stylesheet">
    <link href="css/html5.css" rel="stylesheet">
   <!-- <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      } 
    </style> -->
  

	 <script type="text/javascript" src="js/jquery.js"></script>
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	 <script type="text/javascript" src="static/js/showhide.js"></script>
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.js"></script>
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.pack.js"></script>
	 <script type="text/JavaScript" src="static/js/jquery.mousewheel.js"></script>
	 <script type="text/JavaScript" src="static/js/slimbox-2.03/js/slimbox2.js"></script>
	 <script type="text/JavaScript" src="static/js/cloud-carousel.1.0.5.js"></script>
	 <script src="js/jquery.flip.js"></script>
	 
	
	<link href="css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="static/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
	<link href="static/css/fancybox.css" rel="stylesheet" type="text/css" />	
	<link rel="apple-touch-icon-precomposed" href="">
	<link href="css/main.css" rel="stylesheet">

	<script type="text/javascript">

	$(document).ready(function(){
		$('.dropdown-toggle').dropdown();	
		$("a.notice").fancybox();
		$("#notices-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,
			
			titleBox: $('#da-vinci-title'),
			altBox: $('#da-vinci-alt'),
			
			yRadius:40,
			xPos: 285,
			yPos: 120,
			speed:0.15,
			mouseWheel:true
		});
		
		$("#ug-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,
			
			titleBox: $('#da-vinci-title'),
			altBox: $('#da-vinci-alt'),
			
			yRadius:40,
			xPos: 285,
			yPos: 120,
			speed:0.15,
			mouseWheel:true
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
			
			$("#ug").bind("click",function(){
				
     				content = $("#ug-notices").html();
     				console.log(content);
					$("#flipbox").flip({
					direction: "tb",
					color: "red",
					content: content,//(new Date()).getTime(),
					
				})
				return false;
				
			});
			

			
		});
	</script>		
   
<title> Online Notice Board Demo </title>
</head>

<?php
$posters= fetch_all_posters("");
$event_names = array();
$poster_locations = array();
$event_category = array();
$poster_id = array();
for ($i=0;$i<count($posters);$i++){
	$start_time = $posters[$i]["event_start_date"]." ".$posters[$i]["event_start_time"];
	$end_time = "now";//$posters[$i]["event_end_date"]." ".$posters[$i]["event_end_time"];
	$diff = abs(strtotime($start_time) - strtotime($end_time));	 
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	if ($days<=7)
	{
		array_push($poster_id, $posters[$i][0]);
		array_push($event_names , $posters[$i]["event_name"]);
		array_push($poster_locations, $posters[$i]["event_poster_location"]);
		array_push($event_category, $posters[$i]["event_category"]);
	 }

//print_r($poster_locations);
}


?>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
         <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a> 
          <a class="brand" href="#">Gymkhana, IIT Bombay</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Add a Notice as <a href="#" class="navbar-link">Admin</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li class="dropdown" id="accountmenu">  
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Links<b class="caret"></b></a>  
                        <ul class="dropdown-menu">  
                            <li><a href="#">UG Academics</a></li>  
                            <li><a href="#">PG Academics</a></li>  
                            <li class="divider"></li>  
                            <li><a href="#">Hostel Affairs</a></li>  
                            <li><a href="#">Cultural Affairs</a></li>  
                            <li><a href="#">Sports Affairs</a></li> 
                             <li><a href="#">STAB</a></li> 
                             <li class="divider"></li>  
                             <li><a href="#">Mood Indigo</a></li>  
                            <li><a href="#">Techfest</a></li>  
                            <li><a href="#">E Cell</a></li> 
                                 <li><a href="#">SARC</a></li> 
                                  <li class="divider"></li>  
                             <li><a href="#">Insight</a></li>  
                            <li><a href="#">Aawaaz</a></li>  
                        </ul>  
                    </li>  
              <li><a href="#contact">Complaint Management System</a></li>
              <li><a href="#contact">Points Tally</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

     <div class="container-fluid">
      <div class="row-fluid">
        
        <div class="span9">
          <div class="hero-unit">
           <div class="clearfix">
				<article class="main">
					
					<h3>
						What is Flip?
					</h3>
					<p>
						<strong>Flip</strong> is a <a href="http://www.jquery.com" title="jQuery">jQuery</a> plugin that will flip easily your elements in four directions. Try it
					</p>
					
					<div id="flipbox">Hello! I'm a flip-box! :)</div>
					<div id="flipPad">
						<a href="#" class="left" rel="rl" rev="#39AB3E" title="Change content as <em>you</em> like!">left</a>
						<a href="#" class="top" rel="bt" rev="#B0EB17" title="Ohhh yeah!">top</a>
						<a href="#" class="bottom" rel="tb" rev="#82BD2E" title="Hey oh let's go!">bottom</a>
						<a href="#" class="right" rel="lr" rev="#C8D97E" title="Waiting for css3...">right</a>
						<a href="#" class="revert">revert!</a>
					</div>
		</div>				
           
          </div>
          
          
        </div><!--/span-->
       	
        <div class="span3">
          <div class="well sidebar-nav" id="rsidebar">
            <ul class="nav nav-list">
         <a href="#" class="ug"><div id="sidetileo" >   <div id="sidetile" style="background-color:#00AEDB;"> <h2>UG Academics</h2></div></div></a>
            <div id="sidetilespace"></div>
   <a href="#cult"><div id="sidetileo">   <div id="sidetile" style="background-color:#00B159;"><h2>Cultural</h2></div></div></a>

<div id="sidetilespace"></div>
          <a href="#sports" id="sports"><div id="sidetileo">   <div id="sidetile" style="background-color:#F37735;"><h2>Sports</h2></div></div></a>
<div id="sidetilespace"></div>
           <a href="#tech" id="tech"><div id="sidetileo">   <div id="sidetile" style="background-color:#EC098C;"><h2>Technical</h2></div></div></a>
<div id="sidetilespace"></div>
            <a href="hostel" id="hostel"><div id="sidetileo">   <div id="sidetile" style="background-color:#7C4199;"><h2>Hostel</h2></div></div></a>
<div id="sidetilespace"></div>
           <a href="#pg" id="pg" ><div id="sidetileo">   <div id="sidetile" style="background-color:#FFC425;"><h2>PG Academics</h2></div></div></a>
            
           
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        
        
        
        
      </div><!--/row-->
    </div><!--/.fluid-container-->

 <div id="footer">
      
        
        <div id="footer1" class="span3">
   
        </div>
        <div id ="footer2" class="span3"></div>
     
<div id ="footer3" class="span3"></div>
      </div>

   


    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <div id ="ug-notices" style="visibility:hidden;">
		<div id="ug-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
		<?
			for($i=0;$i<count($event_names);$i++){
				if ($event_category[$i] == "acads"){
					echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
				}
			}
		?>
		</div>
	</div>

<div id ="sports-notices" style="visibility:hidden;">
	<?
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "sports"){
					
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>

</div>
<div id ="cult-notices" style="visibility:hidden;">

	<?
	for($i=0;$i<count($event_names);$i++){
		if ($event_category[$i] == "acads"){
			
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>

</div> 
    
  </body>

</html>
