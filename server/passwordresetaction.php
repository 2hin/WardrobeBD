		<?php
		session_start();
		include '../db/dbaccess.php' ;
		$xml = $_SESSION['xml'];
		///echo $xml;
		$xml = simplexml_load_string($xml);
		$email= $xml->email;
		$em=$email;
		echo $em;
		$ret = updatepin($email);
		///*****sent email *****///
		
		$_SESSION['status']=5;
		echo 'ok';
		header('Location: ../client/Login.php');	
		
		?>