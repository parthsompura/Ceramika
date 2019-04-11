<?php
	session_start();
	include('../dbconnect.php');
	if(isset($_GET['id']) && isset($_SESSION['adid']))
	{
		$sql = 'SELECT * FROM `user_info` WHERE `user_id`="'.$_GET['id'].'"';
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) == 1)
		{
			$sql = 'DELETE FROM `user_info` WHERE `user_id`="'.$_GET['id'].'"';
			if(mysqli_query($conn,$sql))
				$_SESSION['succ'] = 'User deleted Successfully';
			else
				$_SESSION['fail'] = 'Sorry try again';

		}
	}
	header('location:index.php');
?>