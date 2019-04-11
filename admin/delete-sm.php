<?php
	session_start();
	include('../dbconnect.php');
	if(isset($_GET['id']) && isset($_SESSION['adid']))
	{
		$sql = 'SELECT * FROM `sales_manager` WHERE `id`="'.$_GET['id'].'"';
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) == 1)
		{
			$sql = 'DELETE FROM `sales_manager` WHERE `id`="'.$_GET['id'].'"';
			if(mysqli_query($conn,$sql))
				$_SESSION['succ'] = 'Sales Manager deleted Successfully';
			else
				$_SESSION['fail'] = 'Sorry try again';

		}
	}
	header('location:view-sm.php');
?>