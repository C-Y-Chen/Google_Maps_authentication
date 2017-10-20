<?php
	include_once("connMysql.php");
		$username = trim(strtolower($_POST['username']));  
		//$username = mysql_escape_string($username);  
			   
		if (preg_match("/^[^\s]+@[^\s]+\.[^\s]{2,3}$/",$username)) {   
		   
		    // $query = "SELECT id FROM maps_authentication WHERE id = '$username' LIMIT 1";  
		    // $result = mysql_query( $query );  
		    // $num = mysql_num_rows($result);  
		      
		    echo "1";  
		}   
		else {  
		echo "0";//不能注册  
		  
		}  
?>  