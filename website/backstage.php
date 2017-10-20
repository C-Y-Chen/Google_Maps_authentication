<?php
	require_once("connMysql.php");
	// if(!isset($_SESSION["name"]) && $_SESSION["name"] == null)
	// 	header( "Location:~Maps/Login.php" ); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>後台管理者頁面</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/upload_btn.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/backstage.js"></script>
	</head>
	<body>
		<div class="container">

			
			<a href="#" data-toggle='modal' data-target='#createModal'>
				<button type='button' class='btn btn-success' style="font-size:17px" >
					<span class='glyphicon glyphicon-plus' aria-hidden="true"></span>新增
				</button>
			</a>

			<!-- news createModal -->
			<div class='modal fade' id='createModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<form action="create.php" method="post" enctype="multipart/form-data" role="form">
						<div class='modal-content'>
							<div class='modal-header'>
								<div class='input-group'>
									<span class='input-group-addon'><b style="font-size: 17px;">標題</b></span>
							        <input type='text' class='form-control' id='title' name='title'>
								</div>
							</div>
							<div class='modal-body'>
								<div class="input-group">
									 <span class="input-group-addon glyphicon glyphicon-pencil"></span>
							        <textarea class="form-control" rows="5" id="content" name="content" require></textarea>
								</div>
							</div>
							<div class='modal-footer'>
								 <div class="input-group">
								 		<input class="form-control" id="subfile" name="text" type="text" />
								 		<span class="input-group-btn">
									 		<a class="btn btn-success" onclick="$('#pdffile').click();">選擇檔案</a>
									 		<input class="btn btn-primary" style="margin-left: -1px;" value="上傳" type="submit" name="submit" >
								 		</span>
								 		<input id="pdffile" style="display: none;" name="file" type="file" />
								</div> 
								<script type="text/javascript">
									$('#pdffile').change(function(){
										var s = $(this).val();
										console.log(s);
										var s2 = s.split("\\");
									     $('#subfile').val(s2[2]);
									});
								</script>
							</div>
						</div>
					</form>
				</div>
			</div>

			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>標題</th>
					<th>時間</th>
					<th>人氣</th>
				</tr>
				<?php  
					$result = mysqli_query($connect,"SELECT * FROM `soft_ball`");
					$data_num = mysqli_num_rows($result);

					$per_page = 10;
					$pages = ceil($data_num/$per_page);
					if(!isset($_GET['page']))
						$page = 1;
					else
						$page = $_GET['page'];

					$start = (($page -1) * $per_page) > 0 ? ($page -1) * $per_page: 0;

					$result = mysqli_query($connect,"SELECT `id` , `title`,`text` , `time`, `popularity` , `filename` FROM `soft_ball`  ORDER BY `id` DESC LIMIT " . $start. ',' . $per_page) or die("Error");
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
						$temp = explode(".", $row['filename']);
						echo "
						<tr id = '". $row['id'] ."'>	
							<td>".$row['id']."</td> 
							<td>".
								// title link & Modal
								"<a href='#' data-toggle='modal' data-target='#contentModal" .$row['id']. "'>".$row['title']."</a>

								<div class='modal fade' id='contentModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
									<div class='modal-dialog'>
										<div class='modal-content container-fluid'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h3 class='modal-title'>" . $row['title'] . "</h3>
											</div>
											<div class='modal-body'>
												<p>" . $row['text'] . " </p>
											</div>
											<div class='modal-footer row'>";
											if($row['filename'] != ""){
												echo
												"<div class='col-lg-12 text-left'>
													<p>".$row['filename']." <a href='FTP/" .$row['filename']."''><span class='glyphicon glyphicon-file'></span></a></p>
												</div>";
											}
											echo 
											"</div>
										</div>
									</div>
								</div>

							</td>   
							<td>".$row['time']."</td>
							<td>".$row['popularity']."</td>
							<td>";

								// update link & Modal 
								echo "
								<a href='#' data-toggle='modal' data-target='#updateModal" . $row['id'] . "'><span class='glyphicon glyphicon-pencil'></span>Edit</a>|
			
								<div class='modal fade' id='updateModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
									<div class='modal-dialog'>
										<form action='update.php' method='post' enctype='multipart/form-data' role='form'>
											<div class='modal-content'>
												<div class='modal-header'>
													<div class='input-group'>
														<span class='input-group-addon'><label for='name' style='font-size:16px'>標題</label></span>
												        <input type='text' class='form-control' id='title' name='title' value='".$row['title']."'>
													</div>
												</div>
												<div class='modal-body'>
													<div class='input-group'>
														 <span class='input-group-addon'><i class='glyphicon glyphicon-pencil'></i></span>
												        <textarea class='form-control' rows='5' id='content' name='content'require >".$row['text']."</textarea>
													</div>
												</div>
												<div class='modal-footer'>
													<input type='text' value='".$row['id']."' name='id' style='display:none'>
													<p class='text-left'>".$row['filename']."
													<input class='btn btn-success' style='height:30px' value='更新' type='submit' name='submit' ></p>";
													//   <div class='text-left '><input class='' id='subfile' name='text' type='text' />
													//  		<a class='btn btn-success' style='height:30px' onclick='$('#pdffile').click();'>選擇檔案</a>
													 echo "";
													// </div> 
													// <input id='pdffile' style='visibility: hidden;' name='file' type='file' />
													
													// <script type='text/javascript'>
													// 	$('#pdffile').change(function(){
													// 		var s = $(this).val();
													// 		console.log(s);
													// 		var s2 = s.split('\\');
													// 	     $('#subfile').val(s2[2]);
													// 	});
													// </script>
													echo "
												</div>
											</div>
										</form>
									</div>
								</div>";

								// delete link & Modal 
								echo "
								<a href='#' data-toggle='modal' data-target='#deleteModal" . $row['id'] . "'><span class='glyphicon glyphicon-trash'></span></a>
								
								<div class='modal fade' id='deleteModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
									<div class='modal-dialog'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal'>&times;</button>
												<h4 class='modal-title'>刪除 ID : " . $row['id'] . "</h4>
											</div>
											<div class='modal-body'>
												<p>你確定要刪除 " . $row['title'] . " ?</p>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-default' data-dismiss='modal'>取消</button>
												<button type='button' class='btn btn-danger' data-dismiss='modal' onclick='Delete(". $row['id'] .")'>刪除</button>
											</div>
										</div>
									</div>
								</div>
	          				</td>
						</tr>";
					} // end while
				?>
			</table>
				<?php 
					$currpage = isset($_GET['page']) ? $_GET['page']:1;
					echo "<nav style='height:40px'>";
						echo "<ul class='pagination' >"; 
							echo "<li><a href='?page=".((($currpage-1) > 0) ? ($currpage-1):1)."'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
							for($i = 1; $i <= $pages; $i++){
								echo "<li><a href='?page=" . $i ."'>" . $i . "</a></li>";
							}
							echo "<li><a href='?page=".((($currpage+1) <= $pages) ? ($currpage+1):1)."'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";
						echo "</ul>";
					echo "<nav>";
				 ?>
		</div>
	</body>
</html>