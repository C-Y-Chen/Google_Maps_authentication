<?php

	header("Content-Type: text/html; charset=utf-8");
	require("connMysql.php");
	@$user = $_POST['username'];
	@$latitude = $_POST['lat'];
	@$longitude = $_POST['long'];
	$sql = " INSERT INTO `maps_authentication` 
	(`id`, `long`, `lat`) VALUES ('$user', '$longitude', '$latitude')";
	if (!mysqli_query($connect,$sql)) die("insert fail" .mysqli_error($connect));
	echo "註冊成功";
?>  