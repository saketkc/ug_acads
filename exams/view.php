<?php
session_start();
require_once("functions.php");
	if (!(isset($_SESSION['ldap_id']))){
		header("location: index.php");
	}
	
	$info = ldap_find_all('uid',$_SESSION['ldap_id']);
	
	$dep = explode(",",$info[0]["dn"]);
	$alldepartment = explode("=",$dep[2]);
	$alldepartments =  DepartmentFindAll();
	$mydepartment=$alldepartment[1];
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<html>
	<head>
	<title>View</title>
	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    <script>
    $(document).ready(function(){
		 var department ='<?php echo $mydepartment;?>';
	$("a#single_image").fancybox();
		
		$("#check").click(function(){
	
	   
	
	 
		
	
	});
		
		
		
		jQuery("#toolbar").jqGrid({
			url:'alldata.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name', 'Course Code','Type','Year','Download'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:35, sorttype:'text'},
					{name:'course_code',index:'course_code', width:50, sorttype: 'text'},
					{name:'type',index:'type', width:100},
					{name:'year',index:'year', width:100},
					{name:'download',index:'download', width:25,formatter:format}
				],
			rowNum:50,
			rowTotal: 2000,
			rowList : [20,30,50],
			loadonce:true,
			mtype: "GET",
			ignoreCase:true,
			gridview: true,
			pager: '#ptoolbar',
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			onSelectRow: function(id){
		$.ajax({
  url: 'expanded.php?id='+id,
  success: function(data) {
   
    $("#data").html(data);
    $("#hidden-href").hide();
    
    $("a#single_image").trigger('click');
    
  }
});
	},
			
	
	caption: "All Papers"	
});

jQuery("#toolbar").jqGrid('navGrid','#ptoolbar',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

$("#choose-dep").change(function(){
			department=$(this).val();
			//jQuery("#toolbar").jqGrid().setGridParam({url : 'projects.php?department='+department}).trigger("reloadGrid");
			gridSearch(department);
			
		
			});

	});
	function gridSearch(department)
    {
	    $('#toolbar').jqGrid('GridUnload');	
        
        $('#toolbar').trigger("reloadGrid");
       jQuery("#toolbar").jqGrid({
			url:'alldata?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name', 'Course Code','Type','Year','Download'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:35, sorttype:'text'},
					{name:'course_code',index:'course_code', width:50, sorttype: 'text'},
					{name:'type',index:'type', width:100},
					{name:'year',index:'year', width:100},
					{name:'download',index:'download', width:25,formatter:format}
				],
			rowNum:50,
			rowTotal: 2000,
			rowList : [20,30,50],
			loadonce:true,
			mtype: "GET",
			ignoreCase:true,
			gridview: true,
			pager: '#ptoolbar',
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			onSelectRow: function(id){
		$.ajax({
  url: 'expanded.php?id='+id,
  success: function(data) {

    
    $("#data").html(data);
    $("#hidden-href").hide();
    
    $("a#single_image").trigger('click');
    
  }
});
	},
			
	
	caption: "ISPA Projects(CLick on a row to expand)"	
});

$("#toolbar").trigger("reloadGrid");
jQuery("#toolbar").jqGrid('navGrid','#ptoolbar2',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
 
 
    }
	function format(cellvalue, options, rowObject){
		rowid=options['rowId'];
		alert(rowid);
		return "<input type='button' name='file-"+rowid+"' value='Download' class ='download' onClick='download(" + rowid + ")'>";
	}
	
	function download(rowid){
			 $.ajax({
			type: "GET",
			url: "download.php",
			data: "id="+rowid
			}).done(function( msg ) {
				alert( "Data Saved: " + msg );
			});
	}
	
    </script>
    </head>




<body>


    	  
         <?php 
        // $alldepartments = DepartmentFindAll();
         
         echo "<select name='department' id='choose-dep'>";
         foreach ($alldepartments as $key=>$value){
	if ($value['value']!=$mydepartment){
		
	echo "<option value='" . $value['value']. "'>".$value['department']."</option>";
	}
	else {
		echo "<option value='" . $value['value']. "' selected='selected'>".$value['department']."</option>";}
	
		
}
echo "</select>";

         ?>
       
<div id="info">
<table id="toolbar"></table>
<div id="ptoolbar" ></div>
</div>

<a id="single_image" href="#data"></a>

<div id="hidden-href">
<div id="data"></div>

</div>
		
    
</body>
</html>



		

