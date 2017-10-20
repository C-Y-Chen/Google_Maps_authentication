var map;
var ismarked = 3;
var marker;
var circle;
var latitude,longtitude;
var page;
var test;

function initialize() {

	map = new google.maps.Map(document.getElementById('googleMap'), {
		zoom: 2,
		center: {lat: -33, lng: 151},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  // [END region_getplaces]

	if(ismarked == 3){
			document.getElementById("btn").type = "hidden";
	}
	google.maps.event.addListener(map, 'click' , function(event){
		document.getElementById("btn").type = "button";
		if(ismarked == 1){
			marker.setMap(null);
			ismarked = 0;
		}
		else if(ismarked == 2){
			marker.setMap(null);
			circle.setMap(null);
			ismarked = 0;
		}
		ismarked = placeMarker(event.latLng);
	});


}

function placeMarker(location){

	page = setaction();
	marker = new google.maps.Marker({
		position:location,
		map:map,
	});

	latitude = location.lat();
	longtitude = location.lng();

	var infowindow = new google.maps.InfoWindow({
		content:'Long : ' + longtitude + '<br />' + 'Lat : ' + latitude
	});
	infowindow.open(map,marker);

	var result = page.split(" ");

	if(result[0] == "R"){
		ismarked = 1;
	}
	else if(result[0] == "L"){
		R = "L";
			if(result[1] == "1"){
				var rad = 10000;
			}
			else if(result[1] == "2"){
				var rad = 1000;
			}
			else if(result[1] == "3"){
				var rad = 100;
			}
			else if(result[1] == "4"){
				var rad = 10;
			}
		circle = new google.maps.Circle({
		map:map,
		center:location,
		radius:rad,
		fillColor: '#0066FF',
		strokeColor: '#0044BB',
		clickable: false,
		});
		ismarked = 2;
	}
	else{
		alert("Error");
	}
	
	$(document).ready(function(){
        	$("#long").val(longtitude);
	});
	$(document).ready(function(){
        	$("#lat").val(latitude);
	});
	

	return ismarked ;
}

function setaction(){
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
    if(queryString["page"]=="reg"){
        	form.action = "Register.php" + "?user=" + encodeURIComponent(queryString["user"]);
        	p = "R";
        	return "R";
        }
        else if(queryString["page"] == "log"){
        	//form.action = "Login.php" + "?user=" + encodeURIComponent(queryString["user"]) + "&level=" + queryString["level"];
        	p = "L";
        	return "L " + queryString["level"];
        }
        else{
        	alert("Error");
        }
}

// send form
function sign(){
	var lat = document.getElementById("lat").getAttribute("value");
	var long = document.getElementById("long").getAttribute("value");
	var queryString = new Array();
	$(function () {
    //  split url
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
	if(queryString["page"] == "reg"){
		document.getElementById("form").submit();
	}
	else if(queryString["page"] == "log"){
		var decrypt = CryptoJS.AES.decrypt(queryString["user"], "Secret Passphrase");

    	$.post("query.php", {username:decrypt.toString(CryptoJS.enc.Utf8),lat:lat,long:long,level:queryString["level"]},
    	function(data){
    		if(data == "登入成功"){
    			alert(data);
    			window.location = "home.php";
		    }
		    else{
				alert(data);
		    }
    	});
	}
}

function back(){


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

	if(queryString["page"] == "reg")
		window.location = "Register.php";
	else if(queryString["page"] == "log") 
		window.location = "Login.php";

}
//google.maps.event.addDomListener(window, "load" , initialize);

