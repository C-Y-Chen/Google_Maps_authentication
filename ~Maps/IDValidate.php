<?php
	include_once("connMysql.php");

		//$username = trim(strtolower("justin928501@gmail.com"));
		// $_POST['username'] = "heih@cos.co";
		// echo $_POST['username'];
		$username = trim(strtolower($_POST['username']));  
		// 防SQL injection
		$username = mysqli_real_escape_string($connect,$username);  
		  
		if (preg_match("/^[^\s]+@[^\s]+\.[^\s]{2,3}$/",$username)) {   
		    //email通过检查  
		    $query = "SELECT id FROM maps_authentication WHERE id = '$username' LIMIT 1";  
		    $result = mysqli_query($connect,$query );  
		    $num = mysqli_num_rows($result);  
		      
		    echo $num;  
		}   
		else{  
			echo "1";//不能注册
		}  
?>  