<?php
	session_start();
	include('dbconnect.php');
	if(isset($_POST['signup']) && isset($_POST['new_pwd']) && isset($_POST['con_pwd']))
	{
		extract($_POST);
		$sql = 'UPDATE `user_info` SET `password`="'.md5($new_pwd).'" WHERE `user_id`='.$_SESSION['uid'];
		if(mysqli_query($conn,$sql))
		{
			$_SESSION['succ'] = 'Password is update successfully';
		}
		else
		{
			$_SESSION['fail'] = 'Sorry try again later';
		}
	}
	header('location:profile.php');
?>