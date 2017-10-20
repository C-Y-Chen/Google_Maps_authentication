<?php
	$connect = mysqli_connect("localhost","near0928","ibhedc0");//IP/ID/passwd
	if(!$connect) die("connect fail".mysqli_error($connect));
	$db = mysqli_select_db($connect,'410121005');
	if(!$db) die ("DB select fail".mysqli_error($connect));
?>