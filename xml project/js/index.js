
function load(){
    
    //取出URL裡的區名
    var queryString = new Array();
    $(function () {
          if (queryString.length == 0) {
              if (window.location.search.split('?').length > 1) {
                  var params = window.location.search.split('?')[1];
                  
                      var key = params.split('=')[0];
                      var value = decodeURIComponent(params.split('=')[1]);
                      queryString[key] = value;//放入名稱;key->"n"
              }
          }
    });
    
    //XAMPP打開xml file("DownLoad.xml")
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            myFunction(xhttp);
        }
    };
    xhttp.open("GET", "DownLoad.xml", true);
    xhttp.send();


    //Read XML File
    function myFunction(xml) {
        var xmlDoc = xml.responseXML;
        var d = document.getElementById('t');
        for (var i = 0; i <291 ;i++) {
            
            //區分地區
            var xxx = xmlDoc.getElementsByTagName("Add")[i].childNodes[0].nodeValue.split("市")[1];

            if(xxx != null){

                var yyy = xxx.split("區")[0];
                qqq = queryString["n"].split("區")[0];
                
                //呼叫各區相關資料
                if(qqq == yyy){

                    var li = document.createElement('li');//列出景點
                    d.appendChild(li);

                    var a = document.createElement('a');//點擊進去show出資訊
                    a.href = "content.html?n="+i;
                    li.appendChild(a);

                    var div = document.createElement('div');//各區照片放入
                    div.className = "Img imgLiquid_bgSize imgLiquid_ready";
                    div.style.cssText = "width:151px;background-image: url(" + xmlDoc.getElementsByTagName("Picture1")[i].childNodes[0].nodeValue + ");background-size: cover; background-position: center center; background-repeat: no-repeat;";
                    a.appendChild(div);

                    var n = document.createElement('h1');
                    n.style.cssText ="width:151px;"
                    n.id = "h"+i;
                    a.appendChild(n);
                    document.getElementById(n.id).innerHTML = 
                        xmlDoc.getElementsByTagName("Name")[i].childNodes[0].nodeValue;
                }
            }
        }
    }
}



