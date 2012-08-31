/* METRO UI TEMPLATE v2.0.0
/* Copyright 2012 Thomas Verelst, http://metro-webdesign.info

/*GENERAL SETTINGS VARS */
scale = 135; //Size of tiles 
tileSpace = 10; //Space between tiles
tileGroupSpace = 800 //Space between the first elements of groups of tiles on the homepage.
tileGroupTitles = new Array('Home','Some tiles','Another group');
hideMenu = true; //hide menu when going to the tile page (after a page had been visited, for coding reasons), if you want to show always (so also in the beginning, remove the css line in main.css "display:none;" from element #nav (line 126),    this is mostly only handy if you set all the groupTitles in the menu, so it is like a group selector menu

hideSpeed = 400; //how fast should the content fade out when switching pages

jQuery.fx.interval=25; // Smoothness of effects, higher = less smooth & less CPU utilization. Too low can be choppy!

/*PAGES information: EVERY page on your site that must be opened with the framework must be included here, see tutorial for more information */
pageLink= new Array(); /* the index of pageLink MUST be the pagename (like it will be shown in the titlebar)*/
pageLink['A new page to test'] = 'mypage.php';
pageLink['Testing slides'] = 'testslides.html';
pageLink['Other content to test'] = 'othercontent.php';

/* MENU BAR Information: The index of this array is the name like it will be shown in the menu, 
the value of the array is the pageLink where it should go to, case-insensitive 
OR the absolute link, like http://google.com*/
menuLink = new Array(); 
menuLink['Home'] = "";
menuLink['A new Page'] = "A new page to test";
menuLink['Test tile group'] = "&Another Group";// this will go immediatly to the tile group 'Another Group'
menuLink['Testing slides'] =  "Testing slides";
menuLink['Google'] =  "external:http://google.com";

menuColor = new Array();
menuColor['Home'] = "#5FB404";
menuColor['A new Page'] = "#FF8000";
menuColor['Test tile group'] = "#FE2E64";
menuColor['Testing slides'] =  "#5FB404";
menuColor['Google'] =  "#FF8000";
