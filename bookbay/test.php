	<html>
	<head>
	<link rel="stylesheet" type="text/css" media="screen" href="themes/redmond/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="themes/ui.multiselect.css" />\
    <link rel="stylesheet" href="themes/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script>
    $(document).ready(function(){
		$("a#single_image").fancybox();
		jQuery("#toolbar").jqGrid({
   	url:'localset.php',
	datatype: "json",
	height: 255,
	width: 600,
   	colNames:['Index','Name', 'Code'],
   	colModel:[
   		{name:'item_id',index:'item_id', width:65, sorttype:'int'},
   		{name:'item',index:'item', width:150, sorttype: 'text'},
   		{name:'item_cd',index:'item_cd', width:100}
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
  url: 'related_stuff.php?id='+id,
  success: function(data) {
    //$('.result').html(data);
    //alert(
    $("#data").html(data);
    $("#hidden-href").hide();
    //alert(data);
    $("a#single_image").trigger('click');
    
  }
});
	},
	
	caption: "Toolbar Searching"	
});

jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#toolbar").showCol('subgrid');


	});
    </script>
    </head>
<body>
<table id="toolbar"></table>
<div id="ptoolbar" ></div>
<a id="single_image" href="#data">10</a>

<div id="hidden-href">
<div id="data"></div>
</div>
</body>
</html>
