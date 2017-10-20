<!DOCTYPE html>
<?php 
	require("connMysql.php");
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>哈囉</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<table class="table table-hover">
			<?php  
				//error_reporting(E_ERROR | E_PARSE);
				$result = mysqli_query($connect,"SELECT `id` , `user` , `title` FROM `soft_ball`");
				$data_num = mysqli_num_rows($result);

				echo "<tr> <th>ID</th>	<th>user</th>	<th>title</th>	</tr>";
				$per_page = 10;
				$pages = ceil($data_num/$per_page);
				if(!isset($_GET['page']))
					$page = 1;
				else
					$page = $_GET['page'];
				$start = (($page -1) * $per_page) > 0 ? ($page -1) * $per_page: 0;
				$result = mysqli_query($connect,"SELECT `id` , `user` , `title` FROM `soft_ball`  ORDER BY `id` DESC  LIMIT " . $start . ',' . $per_page) or die("Error");
				while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					echo "<tr>	<td>".$row['id']."</td> <td>".$row['user']."</td>  <td>".$row['title']."</td>	</tr>";
				}
			?>
		</table>
	</body>
</html>