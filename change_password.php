<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ceramika</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Ceramika</a>
			</div>


		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="err_msg"></div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Change Password</div>
					<div class="panel-body">
				<form method="post" action="change_pwd.php" onsubmit="return validate(this);">
					<div class="row">
						<div class="col-md-12">
							<label for="new_pwd">New Password</label>
							<input type="password" id="new_pwd" name="new_pwd" class="form-control">
							<span class="err_class" id="new_pwd_error"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<label for="con_pwd">Confirm Password</label>
							<input type="password" id="con_pwd" name="con_pwd" class="form-control">
							<span class="err_class" id="con_pwd_error"></span>
						</div>
					</div>
					<br><br>
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary" value="Submit" name="signup" id="sign_btn">
					</div>

					</div>
					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<script type="text/javascript">
		function validate(form)
		{
			$('.err_class').text('');
			var pwd = $('#new_pwd').val();
			var conpwd = $('#con_pwd').val();
			var flag = true;
			if(pwd.length == 0)
			{
				$('#new_pwd_error').text('New Password is Required');
				flag = false;
			}
			if(conpwd.length == 0)
			{
				$('#con_pwd_error').text('Confirm Password is Required');
				flag = false;
			}
			if(conpwd != pwd)
			{
				$('#con_pwd_error').text('Password does not Match');
				flag = false;
			}
			return flag;
		}
	</script>
</body>
<div class="foot"><footer>
<p> Brought To You By <a href="http://www.gecbh.cteguj.in/" target="_blank">GEC Bhavnagar</a></p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
