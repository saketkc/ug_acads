$(document).ready(function(){
	$("#newPage").click(function(){
		$(this).hide(500);
		$("#newPageWrapper").show(500);
	});
	$("#newPageSubmit").click(function(){
		$("#newPageMsgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		newPageName = $('#newPageName').val();
		$.post('ajax_newPage.php',
		{name:newPageName},
		function(data){
			if(data=='yes') {
	           	$("#newPageMsgbox").fadeTo(300,0.1,function(){
	               	$(this).html('Page created! <a href="edit.php?p=../pages/'+newPageName+'" style="color:#78A800;">Click here to edit it now.</a>').addClass('messageboxok').fadeTo(900,1);
	           	});
	         }else{
	            $("#newPageMsgbox").fadeTo(300,0.1,function(){
	                $(this).html(data).addClass('messageboxerror').fadeTo(900,1);
	           });
	       	}
		});		
	});
	$("#goPathForm").submit(function(){
		window.location.href = "edit.php?p=../"+$("#goPathLink").val();
		return false;
	});
	$("#flushCacheButton").click(function(){
		$("#flushMsgbox").removeClass().addClass('messagebox').text('Flushing...').fadeIn(1000);
		$.post('ajax_flushCache.php',
		function(data){
			if(data=='yes') {
	           	$("#flushMsgbox").fadeTo(300,0.1,function(){
	               	$(this).html('Cache flushed!').addClass('messageboxok').fadeTo(900,1);
	           	});
	         }else{
	            $("#flushMsgbox").fadeTo(300,0.1,function(){
	                $(this).html(data).addClass('messageboxerror').fadeTo(900,1);
	           });
	       	}
		});	
	});
	logout = function(){if(confirm("Are you sure you want to log out?")){window.location.href="logout.php";};}
});