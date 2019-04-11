<?php
	include('dbconnect.php');
	session_start();
	if(!isset($_SESSION['uid'])){
		header('Location:index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ceramika</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/datatable.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Ceramika</a>
			</div>


			<ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart'><a id="carticon" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">2</span>	</a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3"><strong>S. No.</strong></div>
									<div class="col-md-3"><strong>Product Image</strong></div>
									<div class="col-md-3"><strong>Product Name</strong></div>
									<div class="col-md-3"><strong>Price in ₹</strong></div>
								</div>
								<hr>
								<div id="cartmenu">
								<!--<div class="row">
									<div class="col-md-3">S. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $</div>
								</div>-->
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Hello, <?php echo $_SESSION['uname']; ?></a>
				<ul class="dropdown-menu">
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart-large"></span> Cart</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>

				</li>

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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="col-md-12"><h2 class="text-center">Order History<br><br></h2><br></div>
				<div class="">
					<table id="item_table" class="display" style="width:100%">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>Order Id</th>
			                <th>Product Title</th>
			                <th>Price</th>
			                <th>Qty.</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php
			        	$sql = 'SELECT * FROM `customer_order` WHERE `uid`="'.$_SESSION['uid'].'"';
			        	$res = mysqli_query($conn,$sql);
			        	$i = 1;
			        	while($row = mysqli_fetch_array($res))
			        	{
			        		echo '<tr>';
			        		echo '<td>'.$i.'</td>';
			        		echo '<td>'.$row['tr_id'].'</td>';
			        		echo '<td>'.$row['p_name'].'</td>';
			        		echo '<td>'.$row['p_price'].'</td>';
			        		echo '<td>'.$row['p_qty'].'</td>';
			        		echo '</tr>';
			        		$i++;
			        	}
			        	?>
			        </tbody>
			    </table>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
<?php
	if(isset($_SESSION['succ']) && $_SESSION['succ'] != '')
	{
		echo '<script type="text/javascript">alert("'.$_SESSION['succ'].'");</script>';
		$_SESSION['succ'] = '';
	}
	if(isset($_SESSION['fail']) && $_SESSION['fail'] != '')
	{
		echo '<script type="text/javascript">alert("'.$_SESSION['fail'].'");</script>';
		$_SESSION['fail'] = '';
	}
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="assets/datatable.js"></script>
	<script src="main.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#item_table').DataTable();
		});
	</script>
</body>
<div class="foot"><footer>
<p> Brought To You By <a href="http://www.gecbh.cteguj.in/" target="_blank">GEC Bhavnagar</a></p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>
