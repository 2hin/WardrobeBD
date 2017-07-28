		<?php
		include '../db/dbaccess.php' ;
		$pin = $_GET['pin'];
		$email = $_GET['email'];
		if($pin==0)
		{
			$pin=1;
		}
		///echo $pin;
		///echo $email;
		//$ret=checkpin(20734,"2hin@gmail.com");
		$ret=checkpin($pin,$email);
		echo $ret;
		if($ret==1)
		{
			session_start();
			$_SESSION['pin']=$pin;
			$_SESSION['email']=$email;
			header('Location: ../client/passwordconfirmation.php');
		}
		else
		{
			session_start();
			$_SESSION['status']=6;
			header('Location: ../client/Login.php');
		}
		?>