var c = 0;
function initialize(){
	// 	var queryString = new Array();
	// 	$(function () {
	//         if (queryString.length == 0) {
	//             if (window.location.search.split('?').length > 1) {
	//                 var params = window.location.search.split('?')[1].split('&');
	//                 for (var i = 0; i < params.length; i++) {
	//                     var key = params[i].split('=')[0];
	//                     var value = decodeURIComponent(params[i].split('=')[1]);
	//                     queryString[key] = value;
	//                 }
	//             }
	//         }
	//  });
		
	// 	if(!checkreg()){
	// 		}
	// 	else{
	// 		$('#email').css('border', '2px #77FF00 solid');  
	// 		$('#cross').hide();  
	// 		$('#tick').fadeIn(); 
	// 		$('#box').removeClass("glyphicon glyphicon-remove");
	// 		$('#box').addClass("glyphicon glyphicon-ok");
	// 	}
	// if(queryString["user"] != null){
		
	// 	var decrypt = CryptoJS.AES.decrypt(queryString["user"], "Secret Passphrase");
	// 	document.getElementById("email").value = decrypt.toString(CryptoJS.enc.Utf8);
	// 	document.getElementById("level").value = queryString["level"];
		
	// }

}

function check(){
	// var name = document.getElementById("email").value;
	// console.log(checke);
	if(!c){
		alert("Please enter the Email or Email Address in invalid format");
	}
	else{
		toMap();
	}
}

function toMap(){
	var name = document.getElementById("email").value;
		var user = CryptoJS.AES.encrypt(document.getElementById("email").value,"Secret Passphrase");
		//var level = CryptoJS.AES.encrypt(document.getElementById("level").value,"Secret Passphrase");
		var level = document.getElementById("level").value;
		var log = "log";
		var url = "Maps.html?page=" + encodeURIComponent(log) + "&level=" + encodeURIComponent(level) + "&user=" + encodeURIComponent(user);
		javascript:location.href = url;
}

$(document).ready(function(){  
	$('#email').keyup(checkreg);  
});  

function checkreg() {
		var username = $('#email').val();  
		
		if(username == "" || username.length < 4){  
			$('#email').removeAttr("style")
			$('#box').removeClass("glyphicon glyphicon-ok");
			$('#box').addClass("glyphicon glyphicon-remove");
			$('#tick').hide();  
			c = 0;
		}
		else{  
			jQuery.ajax({  
			   type: "POST",  
			   url: "emailValidate.php",  
			   data: 'username='+ username,  
			   cache: false,  
			   success: function(response){  
			   //console.log("response=" + response)
					if(response == 0){  
					//INvalidation  
					    $('#email').css('border', '2px #FF3333 solid');   
					    $('#tick').hide();  
					    $('#cross').fadeIn();  
					    $('#box').removeClass("glyphicon glyphicon-ok");
					    $('#box').addClass("glyphicon glyphicon-remove");
					    c = 0;
					    
				    }
					else if(response == 1){  
					    $('#email').css('border', '2px #77FF00 solid');  
					    $('#cross').hide();  
					   	$('#tick').fadeIn(); 
					   	$('#box').removeClass("glyphicon glyphicon-remove");
					   	$('#box').addClass("glyphicon glyphicon-ok");
					   	c = 1;
					}  
				}  
			});  
		}  
		//console.log(checke);
		return c;
}