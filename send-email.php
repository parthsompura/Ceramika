<?php
	session_start();
	include('dbconnect.php');
	if(isset($_POST['email']) && isset($_POST['send']))
	{
		$sql = 'SELECT * FROM `user_info` WHERE `email`="'.$_POST['email'].'"';
		//echo $sql;
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res) == 1)
		{
			$pwd = bin2hex(openssl_random_pseudo_bytes(4));
			/*echo $pwd;
			die();*/
			$row = mysqli_fetch_array($res);
			require_once('PHPMailer/class.phpmailer.php');
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

			$mail             = new PHPMailer();

			/*$body             = file_get_contents('contents.html');
			$body             = eregi_replace("[\]",'',$body);*/
			$body = "Dear ".$row['first_name'].", <br> Your Password is : <b>".$pwd."</b>. <br>This is system generated password. Please do not share it.";
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "smtp.gmail.com"; // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
			                                           // 1 = errors and messages
			                                           // 2 = messages only
			$mail->SMTPAuth   = true;
		    $mail->SMTPSecure = "ssl";                // enable SMTP authentication
			$mail->Host       = "smtp.gmail.com"; // sets the SMTP server
			$mail->Port       = 465;                    // set the SMTP port for the GMAIL server 465 587
			$mail->IsHTML(true);
			$mail->Mailer= "smtp";
			$mail->Username   = "sompuraparth7@gmail.com"; // SMTP account username
			$mail->Password   = "Gatu@1999";        // SMTP account password

			$mail->SetFrom('sompuraparth7@gmail.com', 'Ceramika');
			$mail->AddAddress($_POST['email']);

			$mail->Subject    = "Recover Your Password";
			//$mail->Body = "";
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

			$mail->MsgHTML($body);

			if(!$mail->Send()) {
			  	$_SESSION['fail'] = 'Sorry try again.';
			} else {
			  	$new_pwd = md5($pwd);
			  	$sql = 'UPDATE `user_info` SET `password`="'.$new_pwd.'" WHERE `email`="'.$_POST['email'].'"';
			  	if(mysqli_query($conn,$sql))
			  	{
			  		$_SESSION['succ'] = 'Password Send Successfully.';
			  	}
			  	else
			  	{
			  		$_SESSION['fail'] = 'Sorry try again.';
			  	}
			}
		}
		else
		{
			$_SESSION['fail'] = 'No Record Found';
		}
	}
	header('location:index.php');
?>