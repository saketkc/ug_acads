<?php
session_start();
	require_once("functions.php");
	if (!(isset($_SESSION['ldap_id']))){
		header("location: index.php");
	}
	$is_registered=0;
	if(is_registered($_SESSIOn['ldap_id'])){
		$is_registered=1;
	}
    $info = ldap_find_all('uid',$_SESSION['ldap_id']);
	$fullname = $info[0]["cn"][0];
	$username=$info[0]['uid'][0];
	$dep = explode(",",$info[0]["dn"]);
	$alldepartment = explode("=",$dep[2]);
	$alldepartments =  DepartmentFindAll();
	$mydepartment=$alldepartment[1];
	$email=$info[0]["mail"][0];
	$alternate_email=$info[0]['mailforwardingaddress'][0];
	$year = explode('/',$info[0]["mailmessagestore"][0]);
	$year_of_study=2012-$year[2];
	//$all_projects=get_department_projects($mydepartment);
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<html>
	<head>
	<title>ISPA Apply</title>
	<script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui-1.8.18.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" />

    <script>
    $(document).ready(function(){
		$("#info-new").hide();
		var department = '<?php echo $mydepartment; ?>';
		var username = '<?php echo $_SESSION['ldap_id'];?>';
		
		$("#check").click(function(){
	
		var count_1=0;
		var count_2=0;
		var count_3=0;
		var err=0;
		
		var preference_1="preference-1";
		var preference_2="preference-2";
		var preference_3="preference-3";
		
		
		$(".preference").each(function(i){
			val = $(this).val();
			
			
			if (val==1){
				preference_1=$(this).attr('name');
				
				count_1+=1;
			}
			if (val==2){
				preference_2=$(this).attr('name');
				count_2+=1;
			}
			if (val==3){
				preference_3=$(this).attr('name');
				count_3+=1;
			}
			
			
		});
	
		if (count_1<=0){
		 alert("Please choose  Preference 1 ");
		 err=1;
		 
		}
		else if (count_1>1){
			alert("Preference 1 is selected more than once");
			err=1;
			}
		/*else if (count_2<=0){
		 alert("Please choose  Preference 2 ");
		 err=1;
		 
		}*/
		else if (count_2>1){
			alert("Preference 2 is selected more than once");
			err=1;
			}
		/*else if (count_3<=0){
		 alert("Please choose  Preference 3 ");
		 err=1;
		 
		}*/
		else if (count_3>1){
			alert("Preference 3 is selected more than once");
			err=1;
			}
		else if (count_2<=0 && count_3>1){
			alert("Preference 2 not specified");
			err=1;
		}
			
	 if (err==0){
		 $.ajax({
			type: "POST",
			url: "savedata.php",
			data: "user="+username+"&department="+department+"&preference_1="+preference_1+"&preference_2="+preference_2+"&preference_3="+preference_3
			}).done(function( msg ) {
				alert( "Data Saved: " + msg );
			});
	 }
		
	
	});
		
		
		
		jQuery("#toolbar").jqGrid({
			url:'projects.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth: true,
			colNames:['Prof. Name','Title ', 'Description','Eligibility','Apply'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:65, sorttype:'text'},
					{name:'title',index:'title', width:50, sorttype: 'text'},
					{name:'description',index:'description', width:100},
					{name:'eligibility',index:'eligibility', width:100},
					{name:'apply',index:'apply', width:10,formatter:format}
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
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			
	
	caption: "ISPA Projects"	
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
		$("#info-new").show();
        $("#info").hide("");
        jQuery("#toolbar2").jqGrid({
			url:'projects.php?department='+department,
			datatype: "json",
			height: 455,
			width: 700,
			autowidth:true,
			colNames:['Prof. Name','Title ', 'Description','Eligibility','Apply'],
			colModel:[
					
					{name:'prof_name',index:'prof_name', width:65, sorttype:'text'},
					{name:'title',index:'title', width:50, sorttype: 'text'},
					{name:'description',index:'description', width:100},
					{name:'eligibility',index:'eligibility', width:100},
					{name:'apply',index:'apply', width:10,formatter:format}
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
			sortname: 'prof_name',
			viewrecords: true,
			sortorder: "asc",
			
	
	caption: "ISPA Projects"	
});

jQuery("#toolbar2").jqGrid('navGrid','#ptoolbar2',{del:false,add:false,edit:false,search:false});
jQuery("#toolbar2").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
    }
	function format(cellvalue, options, rowObject){
		rowid=options['rowId'];
		if(cellvalue=='1'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' selected='selected'>1</option><option value='2'>2</option><option value='3'>3</option></select>";
	}
	if(cellvalue=='2'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1' >1</option><option value='2' selected='selected'>2</option><option value='3'>3</option></select>";
	}
	if(cellvalue=='3'){
		return "<select name='projectid-"+rowid+"' class='preference'><option value='0' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  selected='selected'>3</option></select>";
	}
		
		else
		{
			return "<select name='projectid-"+rowid+"' class='preference'><option value='0' selected='selected' ></option><option value='1'>1</option><option value='2'>2</option><option value='3'  >3</option></select>";
		}
		
		//alert(rowObject[0]);
	}
	
	
    </script>
    </head>


<?php
session_start();
require_once("functions.php");
if (isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(ldap_auth($username,$password)){
	$_SESSION['ldap_id']=$username;
	header("location: apply.php");
}
}

	
?>


<body id="body1">


    <div class="container-fluid">
	      <div class="page-header">
		  <h1>ISPA</h1>
		  <span style="display:inline; margin-left:2%; font-size:200%;">Institute Summer Project Allocation</span>
		  </div>
		  <ul class="nav nav-pills">
		  <li><a href="index.php">Home</a></li>
		   <li class="active"><a href="login.php">Apply</a></li>
		  <li><a href="updates.html">Updates/Results</a></li>
		  <li><a href="">FAQs</a></li>
		  <li><a href="contact.html">Contact</a></li>
		  </ul>
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
<div id="info-new">
<table id="toolbar2"></table>
<div id="ptoolbar2" ></div>
</div>


		 <input type='button' id='check' value='submit'>
		</div>
		
    
</body>
</html>


