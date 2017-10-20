<?php
	include_once("connMysql.php");
	// $files = glob('FTP/*'); // get all file names
	if(isset($_POST['id']))
    	$result = mysqli_query($connect,"DELETE FROM `soft_ball` WHERE `id` = ".$_POST['id']);
    if($result)
    	echo "1";
   //  if($file == "FTP/".$filename)
			// unlink($file);
?>  