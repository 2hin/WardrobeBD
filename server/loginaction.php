		<?php
		session_start();
		include '../db/dbaccess.php' ;
		$xml = $_SESSION['xml'];
		///echo $xml;
		$xml = simplexml_load_string($xml);
		$email= (string)$xml->email;
		$password = (string) $xml->password;
		$em=$email;
		$pass=$password;
		echo $em;
		echo $pass;
		$ret = checklogin($em,$pass);
		echo $ret;
		session_destroy();
		if( $ret==1 )
		{
			session_start();
			$_SESSION['email']=$em;
			$_SESSION['password']=$pass;
			$_SESSION['status']=1;
			header('Location: ../client/home.php');
		}
		else
		{
			session_start();
			$_SESSION['status']=0;
			header('Location: ../client/Login.php');
		}		
		?>