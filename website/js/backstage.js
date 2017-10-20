
function Delete(id){
	jQuery.ajax({  
		   type: "POST",  
		   url: "delete.php",  
		   data: 'id='+ id,  
		   cache: false,  
		   success: function(response){  
		   		if(response == 1){
		   			console.log(123);
		   			location.reload();
		   		}
			}  
	});  
}


