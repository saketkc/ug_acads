$(document).ready(function(){
	$("#tabsize").keyup(function(){
		if($(this).val() == ''){
			$(this).val() =4;
		}
		$("#editText").css("-moz-tab-size",$(this).val())
		.css("-o-tab-size",$(this).val())
		.css("-webkit-tab-size",$(this).val())
		.css("-ms-tab-size",$(this).val())
		.css("tab-size",$(this).val())
	});
	$("#saveButton").click(function(){
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		$.post('ajax_saveFile.php',
		{content:$("#editText").val(),file:file},
		function(data){
			if(data=='yes') {
				var currentTime = new Date()
				var hour = currentTime.getHours()
				var minute = currentTime.getMinutes()
	           	$("#msgbox").fadeTo(300,0.1,function(){
	               	$(this).html('Saved @ '+hour+':'+minute).addClass('messageboxok').fadeTo(900,1);
	           	});
	       	}else{
	            $("#msgbox").fadeTo(300,0.1,function(){
	           	    $(this).html(data).addClass('messageboxerror').fadeTo(900,1);
	       	    });
	       	}
		});	
	});
	$("#deleteButton").click(function(){
		if(confirm("Are you sure you want to delete this file? For safety reasons, the file will be moved to /admin/trash/ ")){
			$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
			$.post('ajax_deleteFile.php',
			{file:file},
			function(data){
				if(data=='yes') {
		           	$("#msgbox").fadeTo(300,0.1,function(){
		               	$(this).html('Deleted!').addClass('messageboxok').fadeTo(900,1);
						alert("File moved to /admin/trash/ ");
						window.location.href="home.php";
		           	});
		       	}else{
		            $("#msgbox").fadeTo(300,0.1,function(){
		           	    $(this).html(data).addClass('messageboxerror').fadeTo(900,1);
		       	    });
		       	}
			});	
		}
	});
});
logout = function(){if(confirm("Are you sure you want to log out?")){window.location.href="logout.php";};}
