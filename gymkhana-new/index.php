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
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	 
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.js"></script>
	 <script type="text/javascript" src="static/js/jquery.fancybox-1.3.4.pack.js"></script>
	 <script type="text/javaScript" src="static/js/jquery.mousewheel.js"></script>
	 <script type="text/javaScript" src="static/js/slimbox2.js"></script>
	 <script type="text/javaScript" src="static/js/cloud-carousel.1.0.5.js"></script>
	 <script type="text/javaScript"src="js/jquery.flip.js"></script>
	 
 <script type="text/javaScript" src="js/bootstrap-dropdown.js"></script>
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
			xPos: 400,
			yPos: 80,
			speed:0.05,
			mouseWheel:false,
			autoRotate: 'left',
		autoRotateDelay: 1200,
		});
		
		$("#ug-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,		
			yRadius:40,
			
			titleBox: $('#da-vinci-title'),
			altBox: $('#da-vinci-alt'),
			xPos: 400,
			yPos: 80,
			speed:0.15,
			mouseWheel:true,
			autoRotate: 'left',
			autoRotateDelay: 1200,
		});
		
		
		$("#sports-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,		
			yRadius:40,
			xPos: 400,
			yPos: 80,
			speed:0.15,
			mouseWheel:true,
			autoRotate: 'left',
		autoRotateDelay: 1200,
		});
		
		
		$("#tech-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,		
			yRadius:40,
			xPos: 400,
			yPos: 80,
			speed:0.15,
			mouseWheel:true,
			autoRotate: 'left',
		autoRotateDelay: 1200,
		});
		
		
		$("#cult-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,		
			yRadius:40,
			xPos: 400,
			yPos: 80,
			speed:0.15,
			mouseWheel:true,
			autoRotate: 'left',
		autoRotateDelay: 1200,
		});
		
		
		$("#hostel-carousel").CloudCarousel( { 
			reflHeight: 56,
			reflGap:2,		
			yRadius:40,
		xPos: 400,
			yPos: 80,
			speed:0.15,
			mouseWheel:true,
			autoRotate: 'left',
		autoRotateDelay: 1200,
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
				
     				content = $("#ug-notices").clone(true,true).contents();
     				alert(content);     				
     				console.log(content);
     				$(".hero-unit").css("background-color","#00AEDB");
     				
					$("#flipbox").flip({
					direction: "tb",
					color: "#00AEDB",
					
					content: content,//(new Date()).getTime(),
					
				})
				return false;
				
			});
			
				$("#hostel").bind("click",function(){
				
     				hcontent = $("#hostel-notices").contents();
     				console.log(hcontent);
     				$("flipbox").html("");
     				$(".hero-unit").css("background-color","#7C4199");
					$("#flipbox").flip({
					direction: "tb",
					color: "#7C4199",
					content: hcontent,//(new hostel-noticesDate()).getTime(),
					onBefore: function(){$("#flipbox").html("")}
				})
				return false;
				
			});
			
				$("#sports").bind("click",function(){
					
     				content = '<?php echo $sports;?>';
     				console.log(content);
     				$(".hero-unit").css("background-color","#F37735");
					$("#flipbox").flip({
					direction: "tb",
					color: "#F37735",
					content: content,//(new Date()).getTime(),
					onBefore: function(){$("#flipbox").html("")}
					
				})
				return false;
				
			});
			
				$("#tech").bind("click",function(){
				
     				content = $("#tech-notices").contents();
     				console.log(content);
     				$(".hero-unit").css("background-color","#EC098C");
					$("#flipbox").flip({
					direction: "tb",
					color: "#EC098C",
					content: content,//(new Date()).getTime(),
					
				})
				return false;
				
			});
				$("#cult").bind("click",function(){
				
     				content = $("#cult-notices").contents();
     				console.log(content);
     				$(".hero-unit").css("background-color","#00B159");
					$("#flipbox").flip({
					direction: "tb",
					color: "#00B159",
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
			
					

					
					<div id="flipbox">
						<div id="notices-carousel" style="width:870px; height:384px; background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
						<?
	for($i=0;$i<count($event_names);$i++){
		{
			
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>
	</div>
				
				
			
				<div id ="ug-notices" style="display:none;">
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
	
<div id ="sports-notices" style="display:none;">
		<div id="sports-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
	<?
	$sports ="";
	for($i=0;$i<count($event_names);$i++){
		
		if ($event_category[$i] == "sports"){
					
			$sports = $sports."<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
			echo $sports;
		}
	}
	?>
	</div>

</div>
<div id ="cult-notices" style="display:none;">
	<div id="cult-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
	<?
	for($i=0;$i<count($event_names);$i++){
		if ($event_category[$i] == "cult"){
			
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>
	</div>

</div> 


<div id ="hostel-notices" style="display:none;">
	<div id="hostel-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
	<?
	for($i=0;$i<count($event_names);$i++){
		if ($event_category[$i] == "hostel"){
			
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>
	</div>

</div> 
<div id ="tech-notices" style="display:none;">
	<div id="tech-carousel" style="width:570px; height:384px;background: url(/static/images/carousel/bg.jpg);overflow:scroll;">
	<?
	for($i=0;$i<count($event_names);$i++){
		if ($event_category[$i] == "tech"){
			
			echo "<a class='notice' href='$poster_locations[$i]' rel='lightbox' id='notice'><img class='cloudcarousel' src='$poster_locations[$i]' width='128' height='164' title='$event_names[$i]'/></a> ";
		}
	}
	?>
	</div>

</div> 

<!---->




	
					</div>
		</div>				
           
           <div id="subscribe">
               <form class="form-inline">
    <input type="text" class="input-small" placeholder="Email">
    <input type="password" class="input-small" placeholder="Password">
    <label class="checkbox">
    <input type="checkbox"> Remember me
    </label>
    <button type="submit" class="btn">Subscribe</button>
    </form>
           
           
           </div>
          </div>
          
          
        </div><!--/span-->
       	
        <div class="span3">
          <div class="well sidebar-nav" id="rsidebar">
            <ul class="nav nav-list">

         <a href="#" id="ug"><div id="sidetileo" >   <div id="sidetile" style="background-color:#00AEDB;"> <h2>UG Academics</h2></div></div></a>
            <div id="sidetilespace"></div>
   <a href="#cult" id="cult" ><div id="sidetileo">   <div id="sidetile" style="background-color:#00B159;"><h2>Cultural</h2></div></div></a>

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



    <script type="text/javaScript" src="js/bootstrap.js"></script>
    <script type="text/javaScript" src="js/bootstrap-transition.js"></script>
    <script type="text/javaScript" src="js/bootstrap-alert.js"></script>
    <script type="text/javaScript" src="js/bootstrap-modal.js"></script>
   
    <script type="text/javaScript" src="js/bootstrap-scrollspy.js"></script>
    <script type="text/javaScript" src="js/bootstrap-tab.js"></script>
    <script type="text/javaScript" src="js/bootstrap-tooltip.js"></script>
    <script type="text/javaScript" src="js/bootstrap-popover.js"></script>
    <script type="text/javaScript" src="js/bootstrap-button.js"></script>
    <script type="text/javaScript" src="js/bootstrap-collapse.js"></script>
    <script type="text/javaScript" src="js/bootstrap-carousel.js"></script>
    <script type="text/javaScript" src="js/bootstrap-typeahead.js"></script>
    
  </body>

</html>
