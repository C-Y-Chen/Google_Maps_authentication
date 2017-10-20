<?php
    require("connMysql.php");

    header("Content-Type: text/html; charset=utf-8");
    date_default_timezone_set("Asia/Taipei");
    $current_date = date('Y/m/d H:i:s');

    $allowedExts = array("gif", "jpeg", "jpg", "png","mp4","docx","doc");

    //處理檔名
    $temp = explode(".", $_FILES["file"]["name"]);  
    //echo $_FILES["file"]["name"];
    $extension = end($temp); 
    //echo $extension;
    $file_name = iconv('utf-8','big5', $_FILES["file"]["name"]); // 解決move_uploaded_file不能用中文檔名上傳
    if ((
         ($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png")
      || ($_FILES["file"]["type"] == "application/msword")
      || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
      && ($_FILES["file"]["size"] < 2000000000)
      && in_array($extension, $allowedExts)) {

          if ($_FILES["file"]["error"] > 0) {
              echo "Return Code: " . $_FILES["file"]["error"] . "";
          } 
          else {
              echo "Upload: " . $_FILES["file"]["name"] . "<br />";
              echo "Type: " . $_FILES["file"]["type"] . "<br />";
              echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br />";
              echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
              if (file_exists("FTP/" . $_FILES["file"]["name"])) {
                  echo $_FILES["file"]["name"] . " already exists. <br />";
              } 
              else {
                 move_uploaded_file($_FILES['file']['tmp_name'], 'FTP/'. $file_name);
                  echo "Stored in: " . "FTP/" . $_FILES["file"]["name"]."<br />";
                  
              }
          }
    } 
    else { echo "Invalid file" ; header( "Location:backstage.php" ); }

    $title = $_POST["title"] ;
    $content = $_POST["content"]; // $_FILES["file"]["name"] xxx.xxx
    $filename = $_FILES["file"]["name"];

    $sql = "INSERT INTO `soft_ball` (`user`,`title`,`text`,`time`,`filename`) VALUES ( 'admin','".$title."', '".$content."', '".$current_date."','".$filename."')" ;
    if (!mysqli_query($connect,$sql)) die("insert fail" .mysql_error());
     header( "Location:backstage.php" ); 
?>