<!DOCTYPE html>
<?php 
	require("connMysql.php");
	@session_start();
?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>花蓮棒壘會</title>
		<link rel="Shortcut Icon" type="image/x-icon" href="img/icon.ico" />
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/index.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/tab.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse ">
			<div class="container-fluid" >

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">花蓮棒壘會</a>
				</div>
				

				<div class="collapse navbar-collapse" id="menuNavBar" >
					<ul class="nav navbar-nav nav-tabs">
						<li class="active"><a href="#news">最新消息</a></li>
						<li><a href="#orga">組織</a></li>
						<li><a href="#rules">棒壘規則</a></li>
						<li><a href="#ranks">歷年勁旅</a></li>
						<li><a href="#HoF">名人堂</a></li>
						<li><a href="#pic">活動影像</a></li>
						<li><a href="#link">友站連結</a></li>
						<li><a href="#pos">球場位置</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container tab-content">
			<div id="news" class="tab-pane fade in active panel panel-dafult">
				<img src="img/news.gif" height="57" width="702" class="img-responsive">
				<table class="table table-hover">
					<?php  
						$result = mysqli_query($connect,"SELECT `id` , `user` , `title` , `filename` FROM `soft_ball`");
						$data_num = mysqli_num_rows($result);

						echo "<tr> <th>ID</th>	<th>title</th>	<th>time</th>	<th>popularity</th>	</tr>";
						$per_page = 5;
						$pages = ceil($data_num/$per_page);
						if(!isset($_GET['page']))
							$page = 1;
						else
							$page = $_GET['page'];
						$start = (($page -1) * $per_page) > 0 ? ($page -1) * $per_page: 0;
						$result = mysqli_query($connect,"SELECT `id` , `title` , `text` , `time`, `popularity` , `filename` FROM `soft_ball`  ORDER BY `id` DESC  LIMIT " . $start . ',' . $per_page) or die("Error");
						while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
							echo "<tr>	
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
								</tr>";
						}
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

				 <div>
					<img src="img/support.gif" height="58" width="701" class="img-responsive panel panel-dafult">
					<div class="row">
						<ul class="list-group supimg col-lg-4 col-sm-4">	
							<li href="img/ball.gif" class="list-group-item">縣議員李秋旺服務處</li>
							<li href="img/ball.gif" class="list-group-item">縣議員笛布斯服務處</li>
							<li href="img/ball.gif" class="list-group-item">縣議員魏嘉賢服務處</li>
							<li href="img/ball.gif" class="list-group-item">紅不讓體育用品社</li>
						</ul>
						<ul class="list-group supimg col-lg-4 col-sm-4">
							<li href="img/ball.gif" class="list-group-item">亞拉機油花蓮總經銷</li>
							<li href="img/ball.gif" class="list-group-item">更生日報</li>
							<li href="img/ball.gif" class="list-group-item">東方報</li>
						</ul>
					</div>
				</div>
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html" target="_blank"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>

			</div>
			
			<div id="orga" class="tab-pane fade">
				<img src="img/organize.gif" height="57" width="702" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="rules" class="tab-pane fade">
				<img src="img/rules.gif" height="55" width="701" class="img-responsive">
				<ul class="list-group" id="rulesList">
					<li class="list-group-item"><a href="#"><b>一.名詞解釋 </b></a></li>
					<li class="list-group-item"><a href="#"><b>二.比賽場地</b></a> </li>
					<li class="list-group-item"><a href="#"><b>三.用具及裝備</b></a> </li>
					<li class="list-group-item"><a href="#"><b>四.球員及替補規則</b></a></li>
					<li class="list-group-item"><a href="#"><b>五.比賽</b></a></li>
					<li class="list-group-item"><a href="#"><b>六.投手規定</b></a></li>
					<li class="list-group-item"><a href="#"><b>七.打擊</b></a></li>
					<li class="list-group-item"><a href="#"><b>八.擊跑員和跑壘員</b></a></li>
					<li class="list-group-item"><a href="#"><b>九.死球與活球</b></a></li>
					<li class="list-group-item"><a href="#"><b>十.裁判員</b></a></li>
					<li class="list-group-item"><a href="#"><b>十一.抗議</b></a></li>
					<li class="list-group-item"><a href="#"><b>十二.記錄與統計</b></a></li>
				</ul>
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="ranks" class="tab-pane fade">
				<img src="img/ranks.gif" height="70" width="701" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="HoF" class="tab-pane fade">
				<img src="img/person.gif" height="66" width="701" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="pic" class="tab-pane fade">
				<img src="img/photo.gif" height="64" width="701" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="link" class="tab-pane fade">
				<img src="img/link.gif" height="64" width="701" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
			<div id="pos" class="tab-pane fade">
				<img src="img/position.gif" height="55" width="701" class="img-responsive">
				<footer>
					<hr>
					<p>This website is only for practicing
					<a href="~Maps/index.html"><img src="img/ball.gif" height="33" width="33" alt=""></a></p>
				</footer>
			</div>
		</div>
	</body>
</html>