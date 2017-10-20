<?php

	require("connMysql.php");
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	echo "UPDATE `soft_ball` SET `title` = ".$title." `text`=".$content." WHERE title=".$_POST['id'];
	$result = mysqli_query($connect,"UPDATE `soft_ball` SET`title`='".$title."',`text`='".$content. "' WHERE `id`=".$_POST['id']);
	header( "Location:backstage.php" ); 
?>