<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GMA - 註冊</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    	<script src="js/reg2.js"></script>
    	<script src="js/aes.js"></script>
	</head>

	<body onload="initialize()">
		<div class="container">
			<div id="signupbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3">  
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title text-center">註冊</div>
					</div>
					<div class="panel-body">
						<form action="insert.php" method="POST" onkeypress="return event.keyCode != 13;">
							<label>電子郵件</label>
							<div style="margin-bottom: 10px" class="input-group">
								<span class="input-group-addon">
                        			<i class="glyphicon glyphicon-user"></i>
                        		</span>
								<input type="text" class="form-control" id="email" name="email" placeholder="電子郵件">
								<span id="msg_user_name" class="input-group-addon">
									<i id="box" class="glyphicon glyphicon-remove"></i>
								</span>
							</div>
							<div >
								<?php
									if(isset($_POST["long"]) && isset($_POST['lat'])){
										$long = $_POST["long"];
										$lat = $_POST['lat'];
										echo "<p id='long'" . "value='" . $long . "'>經度: " . $long . "</p>";
										echo "<p id='lat'" . "value='" . $lat . "'>緯度: " . $lat . "</p>";
									}
								?>
							</div>
							<div style="margin-bottom:10px">
								<button type="button" onclick="toMap()" class="btn btn-info">
									<span>
                            			<i class="glyphicon glyphicon-map-marker"></i>
                            		</span>
								地圖
								</button>
								<button type="button" onclick="check()" id="sign" class="btn btn-info">註冊</button>
							</div>
						</form>
						<div style="border-top: 1px solid#888; padding-top:15px;" >
									已經有帳號，請點 <a href="Login.php">登入</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>