<?php 
	
	include('dbconnect.php');
	
	$f_name=$_POST['f_name'];
	$l_name=$_POST['l_name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$mobile=$_POST['mobile'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[6-9]{1}[0-9]{9}$/";


	if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($mobile) || empty($address1) || empty($address2)){
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Please fill all the fields!</div>";
		exit(0);
	}
	else{
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
		exit();
		}

		if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
		";
		exit();
		}

		if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
		}

		if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
		}

		if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
		}

		if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
		}

		//check for available user-details
		$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
		$check_query = mysqli_query($conn,$sql);
		$count_email = mysqli_num_rows($check_query);

		if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
		}

		else {
					$sql="INSERT INTO user_info (first_name, last_name, email, password, mobile, address1, address2) VALUES ('$f_name','$l_name','$email','$password','$mobile','$address1','$address2')";
					$run_query=mysqli_query($conn,$sql);
					if($run_query){
						require_once('PHPMailer/class.phpmailer.php');
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

			$mail             = new PHPMailer();

			/*$body             = file_get_contents('contents.html');
			$body             = eregi_replace("[\]",'',$body);*/
			$body = "Dear " .$f_name." Welcome to Ceramika Click here to view <a href='http://google.com/'>Ceramika.com</a>";
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
			$mail->AddAddress($email);

			$mail->Subject    = "Welcome to Ceramika";
			//$mail->Body = "";
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

			$mail->MsgHTML($body);

			if(!$mail->Send()) {
			  	$_SESSION['fail'] = 'Sorry try again.';
			} 
						echo "
								<div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									Click <b><a href='index.php'>here</a></b> to login.
								</div>
						";
					}
			}
		}
	

	

	
 ?>