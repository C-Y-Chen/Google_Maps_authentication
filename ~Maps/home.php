<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>James C.N. Yang</title>
	</head>
	<body>
		<?php
		if (session_status() == PHP_SESSION_NONE) {
			@session_start();
			if($_SESSION["level"] == 4){
			//$str2 = "/~Maps/pdf/Papers/folder 4(10m)/";
			echo "你的登入等級為 4";
		}
		else if($_SESSION["level"] == 3){
			//$str2 = "/~Maps/pdf/Papers/folder 3(100m)/";
			echo "你的登入等級為 3";
		}
		else if($_SESSION["level"] == 2){
			//$str2 = "/~Maps/pdf/Papers/folder 2(1km)/";
			echo "你的登入等級為 2";
		}
		else if($_SESSION["level"] == 1){
			//$str2 = "/~Maps/pdf/Papers/folder 1(10km)/";
			echo "你的登入等級為 1";
		}
		}else{
			echo "<a href='jc434a.com.tw/~Maps'>請登入</a>";
		}
				// connect and login to FTP server
		// $ftp_server = "cislab.tw";
		// $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
		// $login = ftp_login($ftp_conn, 410121005, 10121005);
		// if($_SESSION["level"] == 4){
		// 	//$str2 = "/~Maps/pdf/Papers/folder 4(10m)/";
		// 	echo "你的登入等級為 4";
		// }
		// else if($_SESSION["level"] == 3){
		// 	//$str2 = "/~Maps/pdf/Papers/folder 3(100m)/";
		// 	echo "你的登入等級為 3";
		// }
		// else if($_SESSION["level"] == 2){
		// 	//$str2 = "/~Maps/pdf/Papers/folder 2(1km)/";
		// 	echo "你的登入等級為 2";
		// }
		// else if($_SESSION["level"] == 1){
		// 	//$str2 = "/~Maps/pdf/Papers/folder 1(10km)/";
		// 	echo "你的登入等級為 1";
		// }
		// get file list of current directory
		//$file_list = ftp_nlist($ftp_conn, $str2);
		//print_r($file_list);
		/*
		for ($i=0; $file_list[$i] !=null ; $i++) { 
				echo "<a href='" . "http://cislab.tw/~Maps/pdf/Papers/" . $file_list[$i]. " '> " . $file_list[$i] . "<br />";
				//"<p id='long'" . "value='" . $long . "'>經度: " . $long . "</p>";
		}*/
		/*
		$year = $_SESSION["level"] + 1; 
		echo "你的等級是Level " . $_SESSION["level"] . "，能下載201" . $year . "年前之論文。" ;
		if(condition){
     		echo "<br />";
		}
		for ($i=count($file_list)-1; $i>=0 ; $i--) { 
				$str = explode(".",$file_list[$i]);
				echo "<a href='" . $str2 . $file_list[$i] . " '> " . $file_list[$i] . "<br />";
				//"<p id='long'" . "value='" . $long . "'>經度: " . $long . "</p>";
		}
		*/

		// close connection
		//ftp_close($ftp_conn);
		?>
	</body>
</html>