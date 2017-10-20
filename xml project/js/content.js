
function load(){

    var queryString = new Array();
    $(function () {
          if (queryString.length == 0) {
              if (window.location.search.split('?').length > 1) {
                  var params = window.location.search.split('?')[1];
                  
                      var key = params.split('=')[0];
                      var value = decodeURIComponent(params.split('=')[1]);
                      queryString[key] = value;
              }
          }
    });

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            myFunction(xhttp);
        }
    };

    xhttp.open("GET", "DownLoad.xml", true);
    xhttp.send();
    function myFunction(xml) {
        var xmlDoc = xml.responseXML;
        var d = document.getElementById('t');

        var h = document.createElement('h1');
        h.id = "h"+queryString["n"];
        d.appendChild(h);
        document.getElementById(h.id).innerHTML = xmlDoc.getElementsByTagName("Name")[parseInt(queryString["n"])].childNodes[0].nodeValue;

        var p = document.createElement('p');
        p.id = "p"+queryString["n"];
        d.appendChild(p);
        document.getElementById(p.id).innerHTML = xmlDoc.getElementsByTagName("Description")[parseInt(queryString["n"])].childNodes[0].nodeValue;

        var img = document.createElement('img');
        img.id = "img" + queryString["n"];
        img.src = xmlDoc.getElementsByTagName("Picture1")[parseInt(queryString["n"])].childNodes[0].nodeValue;
        d.appendChild(img);

        var p2 = document.createElement('p');
        p2.id = "p"+queryString["n"]+1;
        p2.className = ".col-md-4"
        d.appendChild(p2);
        
        document.getElementById(p2.id).innerHTML = "開放時間 : " + 
        xmlDoc.getElementsByTagName("Opentime")[parseInt(queryString["n"])].childNodes[0].nodeValue + "</br>" +
        "電話 : " + 
        xmlDoc.getElementsByTagName("Tel")[parseInt(queryString["n"])].childNodes[0].nodeValue + "</br>" +
        "地址 : " +
        xmlDoc.getElementsByTagName("Add")[parseInt(queryString["n"])].childNodes[0].nodeValue;
        
    }
}



