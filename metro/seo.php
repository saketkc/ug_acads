<?php
/*SEO OPTIMIZATION */
if(isset($_GET['_escaped_fragment_'])){ /* If Google is crawling our pages */
    $bot = true; /* The bot is here! */
	$js = ''; // Mr. Google doesnt like Javascript
    $pages = explode("&",$_GET['_escaped_fragment_']);$page = str_replace("_"," ",$pages[0]); /* Get the page he wants from the url */
	
	/*Fake our menu for crawling*/
	$links = '<a href="#!">Home</a> | ';
	foreach($pageLink as $i => $name){
		$links .= "<a href=#!".str_replace(" ","_",$i).">".$i."</a> | ";
	}
	/* Please leave the following line, you get this framework, for free, and I worked 100's of hours on it and give support, 
	   and nobody will see this url..., only donators may remove this! */
	$links .= "<a href='http://metro-webdesign.info'>Free Metro UI templating framework</a>";
}else{$bot = false;}
?>