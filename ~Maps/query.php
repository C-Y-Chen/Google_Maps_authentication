<?php
	header("Content-Type: text/html; charset=utf-8");
	require("connMysql.php");
	$latitude ;
	$longitude;
	session_start();
	// $_POST['username'] = "justin928501@gmail.com";
	// $_POST['level'] = "1";
	// $_POST['lat'] = "23.45652795002859";
	// $_POST['long'] = "121.31835926324129";
	//$xtime = $_POST['xtime'];
	/*if($xtime == "1"){
		$q = mysql_query("SELECT `login_time`  FROM `maps_authentication` WHERE `username` = '".$_POST['username']."' ");
		$time = $q;
	}
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s", time());*/
	//
		if(isset($_POST['username']) && isset($_POST['level']) && isset($_POST['lat']) && isset($_POST['long'])){
			$username = $_POST['username'];
			$level = $_POST['level'];
			$latitude = $_POST['lat'];
			$longitude = $_POST['long'];
			$array = array();
			$test = array();

			$result = mysqli_query($connect,"SELECT `long` , `lat`  FROM `maps_authentication` WHERE `id` = '".$username."' ");
			$row = mysqli_fetch_assoc($result);

			$array = $row ; 
			$tempx = pow(($array['long'] - $longitude), 2);
			$tempy = pow(($array['lat'] - $latitude), 2);
			$finalTD = sqrt($tempx+$tempy)*111.1 ; //M
			$test['level'] = $level;
			$test['tempx'] = $tempx;
			$test['tempy'] = $tempy;
			//$test['time'] = $time;
			$test['finalTD'] = $finalTD;
			if($level == 4 && $finalTD*1000 <=10){
				//$test['check'] = "1";
				$_SESSION["level"] = 4;
				echo "登入成功";
			}
			else if ($level == 3 && $finalTD*1000 <= 100) {
				//$test['check'] = "1";
				$_SESSION["level"] = 3;
				echo "登入成功";
			}
			else if ($level == 2 && $finalTD*1000 <= 1000) {
				//$test['check'] = "1";
				$_SESSION["level"] = 2;
				echo "登入成功";
			}
			else if ($level == 1 && $finalTD*1000 <= 10000) {
				//$test['check'] = "1";
				$_SESSION["level"] = 1;
				echo "登入成功";
			}
			else{
				//$test['check'] = "0";
				echo "辨識點錯誤，登入失敗";
			}
		}
		else{
			echo "請確定輸入電子郵件和選擇經緯度";
		}
		
		
	
	
	/*$sql = " UPDATE `maps_authentication` SET `login_time` =  '$date' WHERE `username` = '".$_POST['username']."'";
	if (!mysql_query($sql)) die("insert fail" .mysql_error());*/
	
	
	/*echo $array['long'] . " " ;
	echo $array['lat'];*/
	//print( json_encode($test));

?>