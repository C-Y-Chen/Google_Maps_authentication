<?php
	header("Content-Type: text/html; charset=utf-8");
	require("connMysql.php");

	if(isset($_POST['email'])){

		$query = "SELECT `id` FROM `maps_authentication` WHERE `id` = '".isset($_POST['email']."'";

		if(mysql_query($query)){
			
		}


	}



?>