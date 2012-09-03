/* METRO UI TEMPLATE
/* Copyright 2012 Thomas Verelst, http://metro-webdesign.info

/*Will be called if we want to show the homepage with tile-pages */
prepareShowHome=function(){ /*do the fades*/
	if(hideMenu){
		$("#nav, #navStripe").stop().fadeOut(hideSpeed)
	}else{
		$("#navStripe").stop().fadeOut(hideSpeed)
	};
	$("#content").fadeOut(hideSpeed,function(){
		currentPage = "home";
		showHome();
	});	
}

/*Show the homepage with tiles */
showHome = function(){
	if(hideMenu){
		$("#nav, #navStripe").hide() // be sure it's gone
	}else{
		curMenu();
		if (!$(".navItemActive")[0]){
			$("#navIA9M8home").addClass("navItemActive");
		}
		$("#navStripe").hide()
	}
	$("html").css("overflow-x","hidden");
	$("#catchScroll").mousedown(function(e){if(e.button==1)return false}); // do not enable middlemouse scroll cause it's uglyyy
	
	var splitHash1 = window.location.hash.split("&")[1];
	if(typeof splitHash1=='undefined' || (currentTileGroup = inArray(tileGroupTitles,splitHash1.addSpaces())) == -1){
		currentTileGroup = 0;
	}
	document.title = siteTitle+' | '+siteTitleHome;
	
	$("#content").width('auto').css('margin-left',-tileGroupSpace*currentTileGroup).css('margin-top',70).html(tileContent).fadeIn(300);// place our new content and be sure it will be shown
	afterTilesInject();
	
	 $(window).resize(); // check the scrollbars now, for the first time
	
	$(".tile").show(700);
	setTimeout(function(){; /*wait with the arrows till the tiles are shown */
			 placeArrows(400); // must ALWAYS happen after ALL tiles are showed! (in this case, tiles after 700ms, arrows after 350+800 ms
			 $(window).resize(); // check the scrollbars now, same as ^
			 afterTilesShow();
	},701);
	
	$(document).keyup(function (e) { /* Keyboard press to move tilepages */
		switch(e.keyCode) {
			case 37:goToLeft();e.preventDefault();
	    	break;
			case 39:goToRight();e.preventDefault();
       		break;
	  	}
	}).keydown(function(e){ // prevent that the page moves weird when doing longpress
		switch(e.keyCode) {
			case 37:
			case 39:e.preventDefault();
       		break;
	  	}
	});
}

/*Will be called when NOT the homepage will be shown */
showPage = function(){
	$("html").css("overflow-x","auto");
	$content = $("#content");
	$content.css('margin-left',0).css("margin-top",30).width($("#wrapper").width()).html("<img src='img/loader.gif' height='24' width='24'/>").fadeIn(1000);
	var page = currentHash.addSpaces().replace("#","");
	if((page = realArrayIndex(pageLink,page)) == -1){
		document.title = siteTitle+" | Page not Found";
		$content.html("<h2 style='margin-top:0px;'>We're sorry :(</h2>the page you're looking for is not found.").show(400); // show with nice animation :)
	}else{	
		document.title = siteTitle+" | "+page;
		$.get("pages/"+pageLink[page],function(newContent,textStatus){
			if(textStatus == 'error'){ // if error
				$content.html("<h2 style='margin-top:0px;'>We're sorry :(</h2>the page you're looking for is not found."); // show with nice animation :)
			}
			$content.stop().fadeOut(50,function(){
				$content.html(newContent);
				makeMenu();
				$("#navStripe, #nav").stop().fadeIn(450);
				curMenu();
					
				if(window.location.hash.indexOf("&show_all") != -1){
					$("div.sliderContent").show();
					$("img.sliderImage").css("filter","progid:DXImageTransform.Microsoft.BasicImage(rotation=1)")
					.css("transform","rotate(90deg)")
	    			.css("-moz-transform","rotate(90deg)")
			    	.css("-webkit-transform","rotate(90deg)")
			    	.css("-o-transform","rotate(90deg)")
					$("a#show_all").html("Hide All").attr("href",$("a#show_all").attr("href").replace("&show_all",""));
				}else{
					$("div.sliderContent").css("display","none");	
					$("#header").css("margin-top",0); // trick for IE9 etc, otherwise blank page		   
				}		
				$content.show(500);
				afterSubPageLoad();
			});
		});
	}
	$(window).resize(); // check the scrollbars now
	$(document).unbind("keydown").unbind("keyup"); // let the keyboard work normal
	$("#catchScroll").unbind("mousedown"); // we may scroll with the mouse here
}

/*If the window hash changes, we must call another page */
$(window).hashchange(function(){
	hash =  window.location.hash.replace("!","").replace("#","");
	var splitHash = hash.split("&"); 
	currentHash = splitHash[0] //get the hash for the page
	if(currentHash == '' && typeof splitHash[1] != 'undefined' &&  currentPage != '' &&  currentPage == 'home'){ //was it just a tilegroup switching?
		var requestedTileGroup = inArray(tileGroupTitles,splitHash[1].addSpaces()); // which tilegroup do you want to go?
		if(requestedTileGroup == currentTileGroup){ // ohw, we are already on that tilegroup, but we'll reload it to not confuse the visitor
			prepareShowHome();
		}else{
			if(!hideMenu){curMenu()};
			goTileGroup(requestedTileGroup);
		}
	}else{		
		if(currentHash == "home" || !currentHash || currentHash == ""){ // if user wants to go home		
			prepareShowHome();
		}else{
			$("#content").fadeOut(hideSpeed,function(){
				currentPage = currentHash;
				showPage(currentHash);	
			});
		}
	}
	$(window).resize(); // check the scrollbars now
	onHashChange();
});

/*Everything's done, Start the layouting! */
$(document).ready(function(){
	
	/*Create the tile content */ 
	tileContent = "<img id='leftArrow' src='img/whiteArrow.png'/><img id='rightArrow' src='img/whiteArrow.png'/>";
	tiles(); // get our tiles into the content			
	for(i=0;i<tileGroupCount;i++){ 
		var name = tileGroupTitles[i];
		tileContent += "<a id='subTitle' style='margin-left:"+(i*tileGroupSpace)+"px;' href='#&"+name+"'><h2>"+name+"</h2></a>"; /* Add the group title of tileGroups */
	}
	
	makeMenu();
	
	/*Load the requested page */
	$(window).hashchange();
	
	onSiteLoad();
});