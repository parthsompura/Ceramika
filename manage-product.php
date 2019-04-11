<?php
	include('dbconnect.php');
	session_start();
	if(!isset($_SESSION['smid'])){
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
				<li><a href="add-product.php">Add New Product</a></li>
				<li><a href="logout.php">Logout</a></li>
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
				<div class="col-md-12"><h2 class="text-center">View Products<br><br></h2><br></div>
				<div class="">
					<table id="item_table" class="display" style="width:100%">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>Product Title</th>
			                <th>Price</th>
			                <th>Stock</th>
			                <th>Desc.</th>
			                <th>Image</th>
			                <th>Keywords</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php
			        	$sql = 'SELECT * FROM `products` WHERE `sm_id`="'.$_SESSION['smid'].'"';
			        	$res = mysqli_query($conn,$sql);
			        	$i = 1;
			        	while($row = mysqli_fetch_array($res))
			        	{
			        		echo '<tr>';
			        		echo '<td>'.$i.'</td>';
			        		echo '<td>'.$row['product_title'].'</td>';
			        		echo '<td>'.$row['product_price'].'</td>';
			        		echo '<td>'.$row['pro_qty'].'</td>';
			        		echo '<td>'.$row['product_desc'].'</td>';
			        		echo '<td><img class="img-thumbnail" src="assets/prod_images/'.$row['product_image'].'" style="height:100px;" /></td>';
			        		echo '<td>'.$row['product_keywords'].'</td>';
			        		echo '<td><a href="delete-product.php?id='.$row['product_id'].'" ><i class="fa fa-trash delete_fa"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="add-product.php?id='.$row['product_id'].'" ><i class="fa fa-pencil delete_fa"></i></a></td>';
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
