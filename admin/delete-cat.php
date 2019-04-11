<?php
	session_start();
	include('../dbconnect.php');
	if(isset($_GET['id']) && isset($_SESSION['adid']))
	{
		$sql = 'SELECT * FROM `categories` WHERE `cat_id`="'.$_GET['id'].'"';
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) == 1)
		{
			$sql = 'DELETE FROM `categories` WHERE `cat_id`="'.$_GET['id'].'"';
			if(mysqli_query($conn,$sql))
				$_SESSION['succ'] = 'Category deleted Successfully.';
			else
				$_SESSION['fail'] = 'Sorry try again.';

		}
	}
	header('location:view-cat.php');
?>