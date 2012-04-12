<?php
session_start();
if (!(isset($_SESSION['ldap_id']))){
	header("location: index.php");
}
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">

<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<title>bookBay</title>
<style>

.scroll{
            width:133px;
            height:61px;
            position:fixed;
            bottom:15px;
            left:150px;
            background:#fff url(scroll.png) no-repeat top left;
        }
 .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:0px;
            left:25%;
            background:#fff url(title.png) no-repeat top left;
        }
        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
        }
		
		
		ul#navigation {
    position: fixed;
    margin: 0px;
    padding: 0px;
    top: 10px;
    left: 0px;
    list-style: none;
    z-index:9999;
}
ul#navigation li {
    width: 100px;
}
ul#navigation li a {
    display: block;
    margin-left: -2px;
    width: 100px;
    height: 70px;    
    background-color:#CFCFCF;
    background-repeat:no-repeat;
    background-position:center center;
    border:1px solid #AFAFAF;
    -moz-border-radius:0px 10px 10px 0px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -khtml-border-bottom-right-radius: 10px;
    -khtml-border-top-right-radius: 10px;
    /*-moz-box-shadow: 0px 4px 3px #000;
    -webkit-box-shadow: 0px 4px 3px #000;
    */
    opacity: 0.6;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
ul#navigation .home a{
    background-image: url(img/home.png);
}
ul#navigation .add a      {
    background-image: url(img/add.png);
}
ul#navigation .search a      {
    background-image: url(img/search.png);
}
ul#navigation .delete a      {
    background-image: url(img/delete.png);
}
ul#navigation .logout a   {
    background-image: url(img/logout.png);
}





body{
	background-image:url(img/back.png);
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 13px;
  line-height: 18px;
  color: #333333;
  background-color: #ffffff;
}

#outer{
	
	
	

	overflow:hidden;
	
	padding-left:5%;
}
#toppest{
	fdsfdsfdsfdsfsfdsheight:9px;
	background-image:url(img/1.jpg);
	margin:-10px;
	width:100%
}
#topbar{
	padding:2%;
	background-image:url(img/2.png);
	margin-top:9px;
	margin-left:-10px;
	margin-right:-10px;
	width:100%;
}
#main1{
	padding:6%;
	align:center;
}
#main{
	height:550px;
	width:75%;
	background-color:#FFF;
	margin:auto;
	padding:6%;
	font-size:36px;
	line-height:100px;
	
}
#footbar{
	height:180px;
	background-color:#FFF;
	padding-left:5%;
	padding-top:20px;
	padding-bottom:20px;
	padding-right:20px;
	margin:-10px;
	width:100%;
}
#footer{
	height:30px;
	background-image:url(img/4.png);
	margin:-10px;
	padding-top:20px;
	padding-bottom:20px;
	padding-right:20px;
	padding-left:5%;
	width:100%;
	color:#FFF;
}
#about{
	font:Georgia, "Times New Roman", Times, serif;
	font-size:16px;
	
	width:40%;
	float:left;
}
#list{
	list-style-type:none;
	font-size:24px;

}
#links{
	width:40%;
	float:right;
}
.listing ul li{
	line-height:2;
}
.button{
font-size:36px;
line-height:50px;
}
.formed{
	font-size:75%;
line-height:2em;
}
#descrip{
	font-size:20px;
line-height:.5em;
}
#comment{
color:#666666;
display:block;
font-size:14px;
font-weight:normal;
text-align:right;
width:200px;
}
#label{
	display:block;
	text-align:right;
	float:left;
line-height:.8em;
}
#main input{
float:left;
font-size:24px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:100%;
margin:2px 0 20px 10px;
height:47px;
}
#addbutton{
height:50px;
font-size:20px;
}
</style>
	
	<link rel="stylesheet" type="text/css" media="screen" href="themes/redmond/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.multiselect.css" />
    <link rel="stylesheet" href="themes/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="img/favicon.png">
	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script>
    $(document).ready(function(){
		$("a#single_image").fancybox();
		jQuery("#toolbar").jqGrid({
   	url:'halloffame.php',
	datatype: "json",
	height: 255,
	width: 600,
	autowidth: true,
   	colNames:['User','Book Name','Course','Tags'],
   	colModel:[
   		{name:'user',index:'user', width:100, sorttype:'text'},
   		
   		{name:'book_name',index:'book_name', width:50, sorttype: 'text'},
   		{name:'course',index:'course', width:50, sorttype:'text'},
   		
   		{name:'tags',index:'tags', width:100,sorttype:'text'},
   		
   		
   	],
   	rowNum:50,
	rowTotal: 2000,
	rowList : [20,30,50],
	loadonce:true,
   	mtype: "GET",
	rownumbers: true,
	rownumWidth: 40,
	gridview: true,
   	pager: '#ptoolbar',
   	sortname: 'item_id',
    viewrecords: true,
    sortorder: "asc",
    onSelectRow: function(id){
		$.ajax({
  url: 'user_info.php?id='+id,
  success: function(data) {
    //$('.result').html(data);
    //alert(
    //$("#data").show();
    
    $("#data").html(data);
    $("#hidden-href").hide();
    //alert(data);
    $("a#single_image").trigger('click');
    
  }
});
	},
	
	caption: "ALL Books(Click on a row to view the contact details)"	
});

jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#toolbar").showCol('subgrid');


	});
	
	
    </script>
    </head>
<body>
	
	
</head>

<body>

<div class="container-fluid">
<div class="row-fuid" id="toppest">

</div>
<div class="row-fluid" id="topbar">
<div class="span11" id="outer">
<h1 id="logo"><a href="#"><img src="img/title1.png" /></a></h1>
</div>
</div>
<div id="main1" class="row-fluid">

<table id="toolbar"></table>
<div id="ptoolbar" ></div>
<a id="single_image" href="#data"></a>

<div id="hidden-href">
<div id="data"></div>

</div>




</div>

 <ul id="navigation">
           
           <li class="hall"><a href="hall.php" title="Hall of Fame"></a></li>
            <li class="add"><a href="add.php" title="Add Books"></a></li>
            <li class="search"><a href="view.php" title="Search books"></a></li>
            <li class="delete"><a href="delete.php" title="Delete books"></a></li>
            
            <li class="logout"><a href="index.php?logout=true" title="Log Out"></a></li>
        
        </ul>

       

      



<div class="row-fluid" id="footbar">
<div class="span5" id="about">
<h3>About bookBay</h3>
Buy and sell your old books online with bookBay. You can search the books according to semester as well as according to the book titles as well.
</div>
<div class="listing" id="links">
<a href="http://gymkhana.iitb.ac.in/~ugacademics/"><img src="img/iitb_logo1.jpg"><span id="qwer">  IIT Bombay UG Academics</span></a>
</div>
</div>
<div class="row-fluid" id="footer">
<span class="span8" >
bookBay © 2012. All rights reserved
</span>
</div>
</div>



</body>
</html>
ha
