<?php 
	include('dbconnect.php');
	session_start();

	if(isset($_POST['signup'])){

		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$pwd=md5($_POST['pwd']);
		$sql="SELECT * FROM sales_manager WHERE email='$email' AND password='$pwd'";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);

		if($count==1){
				$row=mysqli_fetch_array($run_query);
				$_SESSION['smid']=$row['id'];
				$_SESSION['smname']=$row['name'];
				header('location:manage-product.php');
		}
			
	}
	header('location:sm_login.php');

 ?>