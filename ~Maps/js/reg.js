var c = 0;
var url = window.location;
function initialize(){
	document.getElementById("sign").style.visibility = "hidden";
	if(url.search.split("?") != null){
		var queryString = new Array();
		$(function () {
	        if (queryString.length == 0) {
	            if (window.location.search.split('?').length > 1) {
	                var params = window.location.search.split('?')[1].split('&');
		                for (var i = 0; i < params.length; i++) {
		                    var key = params[i].split('=')[0];
		                    var value = decodeURIComponent(params[i].split('=')[1]);
		                    queryString[key] = value;
		                }
	            }
	        }
		});
		if(queryString["user"] != null){
			var decrypt = CryptoJS.AES.decrypt(queryString["user"], "Secret Passphrase");
			document.getElementById("email").value = decrypt.toString(CryptoJS.enc.Utf8);
			if(!checkreg()){
				document.getElementById("sign").style.visibility = "visible";	
			}
			else{
				//document.getElementById("sign").style.visibility = "visible";	
				$('#email').css('border', '2px #77FF00 solid');  
				$('#cross').hide();  
				$('#tick').fadeIn(); 
				$('#box').removeClass("glyphicon glyphicon-remove");
				$('#box').addClass("glyphicon glyphicon-ok");
			}
			
		}
	}

}


function sign_in(){
	var lat = document.getElementById("lat").getAttribute("value");
	var long = document.getElementById("long").getAttribute("value");
	var userNM = document.getElementById("email").value;
	if(document.getElementById("email").value == ""){
		alert("請輸入電子郵件");
	}
	else{
			$.post("insert.php", {username:userNM,lat:lat,long:long},
	    	function(data){	
	    		alert(data);
	    		window.location = "Login.php"
	    	});

	}
}

function check(){
	if(!c){
		alert("Please enter the Email or Email Address in invalid format");
	}
	else{
		sign_in();
	}
}

function toMap(){
	var url = window.location;
	var reg = "reg";
	if(url.search.split("?")!=null){
		var user = CryptoJS.AES.encrypt(document.getElementById("email").value,"Secret Passphrase");
		var url = "Maps.html?page=" + encodeURIComponent(reg) + "&user="+ encodeURIComponent(user) ;
	}
	else{
		var url = "Maps.html?page=" + encodeURIComponent(reg);
	}
	javascript:location.href = url;
}


// email Validation

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
			   url: "IDValidate.php",  
			   data: 'username='+ username,  
			   cache: false,  
			   success: function(response){  
			   //console.log("response = " + response);
					if(response == 1){  
					//INvalidation  
					    $('#email').css('border', '2px #FF3333 solid');   
					    $('#tick').hide();  
					    $('#cross').fadeIn();  
					    $('#box').removeClass("glyphicon glyphicon-ok");
					    $('#box').addClass("glyphicon glyphicon-remove");
					    c = 0;
				    }
					else{  
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
		return c;
}