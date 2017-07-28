		<?php
		include '../db/dbaccess.php' ;
		session_start();
		$pin = $_SESSION['pin'];
		$email = $_SESSION['email'];
		$password = $_POST['password'];
		///echo $password ;
		if($pin==0)
		{
			$pin=1;
		}
		///echo $pin;
		///echo $email;
		//$ret=checkpin(20734,"2hin@gmail.com");
		$ret=checkpin($pin,$email);
		///echo $ret;
		if($ret==1)
		{
			///work to do
			updatepassword($email,$password);
			$_SESSION['status']=7;
			header('Location: ../client/Login.php');
		}
		else
		{
			$_SESSION['status']=6;
			header('Location: ../client/Login.php');
		}
		?>