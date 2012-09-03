<?php
/* METRO UI TEMPLATE v2.1.3
/* Copyright 2012 Thomas Verelst, http://metro-webdesign.info
/* Do not redistribute or sell this template, nor claim this is your own work. 
/* For commercial use, please think about donating. */

require_once('config.php');
require_once('jsminplus.php');

/* FILES*/
$cssFiles = array( /* Add your css files to this array */
	'css/main.css',
	'css/tiles.css',
	'css/misc.css',
	'css/bootstrap.css'
);
$jsFiles = array( /* Add your js files to this array */
	'js/plugins.js',
	'js/config.js',
	'js/tiles.js',
	'js/functions.js',
	'js/main.js'
);

require_once("compress.php");
require_once("seo.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:<?php echo $backgroundColor?>;">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="<?php echo $siteDescription;?>"/>
    <meta name="keywords" content="<?php echo $siteKeywords;?>"/>
	<title><?php echo $siteTitle;?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'><!-- Include a nicce font -->
	<?php echo $css//include css lines?>  
    <!--[if lte IE 8]>
	<style>
    #leftArrow{filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);}
    </style>
	<![endif]-->
    <script>
	siteTitle = "<?php echo $siteTitle;?>";
	siteTitleHome = "<?php echo $siteTitleHome;?>";
	</script>
    
    <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
    <?php echo $js;//include js lines?>
    
    <?php if($enableBackgroundImg):?> <!-- stretch a background image to cover the whole page -->
		<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
		<script type="text/javascript">$.backstretch("<?php echo $backgroundImg?>");</script>
    <?php endif; ?>
</head>
<body>
<div id="catchScroll"></div>
<div id="wrapper">
	<div id="header">
		<h1 style='margin-top:0px;display: inline;'><a id="siteTitle" href="#"><?php echo $siteName?></a></h1>
        <div id="nav"></div>
   		<div id="navStripe"></div>
	</div>
   	<div id="content">
		<!--You can place here some content that will be seen by non-javascript users-->
		<?php
		if($bot){
			echo "<br/><br/>".$links;
			if($page == "" || $page == "home"){
				/* You can echo here a description of your site too for better SEO. It is recommend to add the content of your tiles here. (because google won't see your tiles, as it's javascript)
				   Example: echo "This is the demo of the Metro UI templating framework."*/
			}else{
				if(isset($pageLink[$page]) && file_exists("pages/".$pageLink[$page])){
					include("pages/".$pageLink[$page]);
				}	
			}
			
		}
		?>
	</div>
	<a id="footer" href="http://metro-webdesign.info" alt="Free Metro UI template" title="Create with Metro UI template"><!--Please leave this link, only donators may remove this! --><?php echo $siteFooter?></a>
</div>
</body>
</html>
