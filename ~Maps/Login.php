<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GMA - 登入</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    	<script src="js/log.js"></script>
    	<script src="js/aes.js"></script>
	</head>

	<body onload="initialize()">
		<div class="container">
			<div id="loginbox" style="margin-top:50px;" class="col-md-6 col-md-offset-3">  
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title text-center">登入</div>
					</div>
					<div class="panel-body" >
						<form id="loginform" class="form-horizontal" role="form" onkeypress="return event.keyCode != 13;">
							<label>電子郵件</label>
                            <div style="margin-bottom: 10px" class="input-group">
                            	<span class="input-group-addon">
                            		<i class="glyphicon glyphicon-user"></i>
                            	</span>
                            	<input id="email" type="text" class="form-control" name="email" value="" placeholder="電子郵件">    
                            	<span id="msg_user_name" class="input-group-addon">
									<i id="box" class="glyphicon glyphicon-remove"></i>
								</span>                                    
                            </div>
							<div style="margin-bottom: 15px">
								<label >選擇登入層級</label>
								<select name="level" id="level" class="form-control">
									<option value="1">Level 1(容忍距離  10公里)</option>
									<option value="2">Level 2(容忍距離   1公里)</option>
									<option value="3">Level 3(容忍距離 100公尺)</option>
									<option value="4">Level 4(容忍距離  10公尺)</option>
								</select>
							</div>
							<div>
								<div style="margin-bottom:10px">
									<button id="btn" type="button" onclick="check()" class="btn btn-info">
                            		認證開始
                            		</button>
                            		<a href="accountHelp.php">忘記密碼點?</a>
								</div>
								<div style="border-top: 1px solid#888; padding-top:15px;" >
									還沒有帳號嗎？請點 <a href="Register.php">註冊</a>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>