<?php
/*CSS COMPRESS*/
$css = '';
if($enableCompressionCss){
	if(!file_exists("compress/compressed.css")){
		$handle = fopen("compress/compressed.css",'w');	
		$compressedCss = '';
		foreach ($cssFiles as $cssFile) {
	  		$compressedCss .= file_get_contents($cssFile);
		}
		$compressedCss = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $compressedCss);// Remove comments
		$compressedCss = str_replace(': ', ':', $compressedCss);// Remove space after colons
		$compressedCss = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $compressedCss);// Remove whitespace
		fwrite($handle,$compressedCss);
	}
	$css = '<link rel="stylesheet" type="text/css" href="compress/compressed.css" />';
}else{
	foreach($cssFiles as $cssFile){
		$css .= '<link rel="stylesheet" type="text/css" href="'.$cssFile.'" />';
	}
}
/*JAVASCRIPT COMPRESS*/
$js = '';
if($enableCompressionJs){
	if(!file_exists("compress/compressed.js")){
		$handle = fopen("compress/compressed.js",'w');	
		$compressedJs = '';
		foreach ($jsFiles as $jsFile) {
	  		$compressedJs .= file_get_contents($jsFile)."\n";
		}
		$compressedJs = JSMinPlus::minify($compressedJs);
		fwrite($handle,$compressedJs);	
	}
	$js = '<script type="text/javascript" src="compress/compressed.js" /></script>';
}else{
	foreach($jsFiles as $jsFile){
		$js .= '<script type="text/javascript" src="'.$jsFile.'" /></script>';
	}
}
?>