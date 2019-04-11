<?php
	session_start();
	include('dbconnect.php');
	if(isset($_GET['id']) && isset($_SESSION['smid']))
	{
		$sql = 'SELECT * FROM `products` WHERE `product_id`="'.$_GET['id'].'" AND `sm_id`="'.$_SESSION['smid'].'"';
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) == 1)
		{
			$sql = 'DELETE FROM `products` WHERE `product_id`="'.$_GET['id'].'"';
			if(mysqli_query($conn,$sql))
				$_SESSION['succ'] = 'Product deleted Successfully';
			else
				$_SESSION['fail'] = 'Sorry try again';

		}
	}
	header('location:manage-product.php');
?>