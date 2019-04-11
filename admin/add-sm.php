<?php
	include('../dbconnect.php');
	session_start();
	if(!isset($_SESSION['adid'])){
		header('Location:login.php');
	}

	if(isset($_POST['add_sm']))
	{
		extract($_POST);
		$sql = 'INSERT INTO `sales_manager`(`email`, `password`, `name`) VALUES ("'.$email.'","'.md5($pwd).'","'.$smname.'")';
		if(mysqli_query($conn,$sql))
			$_SESSION['succ'] = 'Sales Manager Added Successfully';
		else
			$_SESSION['fail'] = 'Sorry try again';

		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ceramika</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Ceramika</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="view-sm.php">View Sales Manager</a></li>
				<li><a href="view-cat.php">View Category</a></li>
				<li><a href="../logout.php">Logout</a></li>
			</ul>
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
					<div class="panel-heading">Add Sales Manager</div>
					<div class="panel-body">
						<form method="post" action="" onsubmit="return validate(this);">
							<div class="row">
								<div class="col-md-12">
									<label for="smname">Name</label>
									<input type="text" id="smname" name="smname" class="form-control">
									<span class="err_class" id="email_error"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" name="email" class="form-control">
									<span class="err_class" id="email_error"></span>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label for="pwd">Password</label>
									<input type="password" id="pwd" name="pwd" class="form-control">
									<span class="err_class" id="pwd_error"></span>
								</div>
							</div>
							<br><br>
							<div class="col-md-12">
								<input type="submit" class="btn btn-primary" value="Add" name="add_sm" id="sign_btn">
							</div>

							</form>
					</div>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="../main.js"></script>
	<script type="text/javascript">
		function validate(form)
		{
			$('.err_class').text('');
			var email = $('#email').val();
			var pwd = $('#pwd').val();
			var email_patt = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/;
			var flag = true;
			if(pwd.length == 0)
			{
				$('#pwd_error').text('Password is Required');
				flag = false;
			}
			if(email.length == 0)
			{
				$('#email_error').text('Email is Required');
				flag = false;
			}
			else if(!email_patt.test(email))
			{
				$('#email_error').text('Email is Invalid');
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
