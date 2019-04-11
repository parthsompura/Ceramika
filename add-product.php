<?php
	include('dbconnect.php');
	session_start();
	if(!isset($_SESSION['smid'])){
		header('Location:index.php');
	}

	if(isset($_POST['sub_btn']) && isset($_POST['pro_cat']) && $_POST['pro_cat'] != '')
	{
		
		extract($_POST);
		if(isset($_FILES['pro_img']['name']) && $_FILES['pro_img']['name'] != ''){
			$filename = $_FILES['pro_img']['name'];
			$allow=array('png','jpeg','jpg','gif');
			$ext=pathinfo($filename, PATHINFO_EXTENSION);
			$new_file = rand(00000000,99999999).'.'.$ext;
			$path = 'assets/prod_images/'.$new_file;
			if (!in_array($ext, $allow)) {
				$_SESSION['fail'] = 'Only image files are allowed!';
			}
			elseif (!move_uploaded_file($_FILES['pro_img']['tmp_name'], $path)) {
				$_SESSION['fail'] = 'Please try to upload image again!';
			}
			$sql = 'INSERT INTO `products`(`product_cat`, `sm_id`, `product_brand`, `product_title`, `product_price`,`pro_qty` `product_desc`, `product_image`, `product_keywords`) VALUES ("'.$pro_cat.'","'.$_SESSION['smid'].'","0","'.$pro_name.'","'.$pro_price.'","'.$pro_qty.'","'.$pro_desc.'","'.$new_file.'","'.$pro_key.'")';
			if(mysqli_query($conn,$sql))
				$_SESSION['succ'] = 'New Product is added successfully!';
			header('location:manage-product.php');

		}
	}

	if(isset($_POST['upt_btn']) && isset($_POST['pro_cat']) && $_POST['pro_cat'] != '')
	{
		extract($_POST);
		if(isset($_FILES['pro_img']['name']) && $_FILES['pro_img']['name'] != ''){
			$filename = $_FILES['pro_img']['name'];
			$allow=array('png','jpeg','jpg','gif');
			$ext=pathinfo($filename, PATHINFO_EXTENSION);
			$new_file = rand(00000000,99999999).'.'.$ext;
			$path = 'assets/prod_images/'.$new_file;
			if (!in_array($ext, $allow)) {
				$_SESSION['fail'] = 'Only image files are allowed!';
			}
			elseif (!move_uploaded_file($_FILES['pro_img']['tmp_name'], $path)) {
				$_SESSION['fail'] = 'Please try to upload image again!';
			}
			$sql = 'UPDATE `products` SET `product_cat`="'.$pro_cat.'",`product_title`="'.$pro_name.'",`product_price`="'.$pro_price.'",`pro_qty`="'.$pro_qty.'",`product_desc`="'.$pro_desc.'",`product_image`="'.$new_file.'",`product_keywords`="'.$pro_key.'" WHERE `product_id`='.$pid;
		}
		else
		{
			$sql = 'UPDATE `products` SET `product_cat`="'.$pro_cat.'",`product_title`="'.$pro_name.'",`product_price`="'.$pro_price.'",`pro_qty`="'.$pro_qty.'",`product_desc`="'.$pro_desc.'",`product_keywords`="'.$pro_key.'" WHERE `product_id`='.$pid;
		}
		echo $sql;
		die();
		if(mysqli_query($conn,$sql))
			$_SESSION['succ'] = 'New Product is added successfully!';
		header('location:manage-product.php');
	}
	if(isset($_GET['id']))
	{
		$sql = 'SELECT * FROM `products` WHERE `product_id`="'.$_GET['id'].'" AND `sm_id`="'.$_SESSION['smid'].'"';
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ceramika</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/datatable.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="col-md-3"><a href="index.php" class="navbar-brand">Ceramika</a></div>
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
			<div class="col-md-6 col-md-offset-3 card card-1">
				<?php
				if(isset($row['product_id']))
					echo '<div class="col-md-12 text-center"><h2>Update Product</h2></div>';
				else
					'<div class="col-md-12 text-center"><h2>Add New Product</h2></div>'
				?>
				<form method="post" enctype="multipart/form-data" action="">
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<input type="hidden" name="pid" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
						<label for='pro_name'>Product Name:</label>
					</div>
					<div class="col-md-7">
						<input type="text" name="pro_name" id="pro_name" class="form-control" placeholder="Enter Product Name" value="<?php if(isset($row['product_title'])) echo $row['product_title']; ?>">
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_cat'>Product Category:</label>
					</div>
					<div class="col-md-7">
						<select class="form-control" name="pro_cat" id="pro_cat">
							<option value="">Select</option>
							<?php 
							$sql = 'SELECT * FROM `categories`';
							$res = mysqli_query($conn,$sql);
							while($row1 = mysqli_fetch_array($res))
							{
								echo "<option value='".$row1['cat_id']."'";
								if(isset($row['product_cat']) && $row['product_cat'] == $row1['cat_id'])
									echo "selected";
								echo ">".$row1['cat_title']."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_price'>Product Price:</label>
					</div>
					<div class="col-md-7">
						<input type="number" name="pro_price" id="pro_price" class="form-control" placeholder="Enter Product Price" value="<?php if(isset($row['product_price'])) echo $row['product_price']; ?>">
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_qty'>Total Qty. :</label>
					</div>
					<div class="col-md-7">
						<textarea name="pro_qty" id="pro_qty" class="form-control" placeholder="Enter Product Description"><?php if(isset($row['pro_qty'])) echo $row['pro_qty']; ?></textarea>
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_desc'>Product Desc. :</label>
					</div>
					<div class="col-md-7">
						<textarea name="pro_desc" id="pro_desc" class="form-control" placeholder="Enter Product Description"><?php if(isset($row['product_desc'])) echo $row['product_desc']; ?></textarea>
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_key'>Product Keywords :</label>
					</div>
					<div class="col-md-7">
						<textarea name="pro_key" id="pro_key" class="form-control" placeholder="Enter Product Keywords"><?php if(isset($row['product_keywords'])) echo $row['product_keywords']; ?></textarea>
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-5">
						<label for='pro_key'>Product Image :</label>
					</div>
					<div class="col-md-7">
						<input type="file" name="pro_img" id="pro_img" class="form-control" accept="image/jpeg,image/png,image/jpg">
					</div>
				</div>
				<div class="col-md-12 form-group">
					<div class="col-md-12">
						<?php
						if(isset($row['product_id']))
							echo '<input type="submit" name="upt_btn" class="btn btn-primary" id="upt_btn" value="Update">';
						else
							echo '<input type="submit" name="sub_btn" class="btn btn-primary" id="sub_btn" value="Submit">';

						?>
					</div>
				</div>
			</form>
			</div>
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
<style> .foot{text-align: center;margin-top: 45px;}
</style>
</html>
