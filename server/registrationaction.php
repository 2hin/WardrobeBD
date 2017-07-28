		<?php
		include '../db/dbaccess.php' ;
		session_start();
		$xml = $_SESSION['xml'];
		///echo $xml;
		$xml = simplexml_load_string($xml);
		$em= $xml->email;
		$pass = $xml->password;
		$nm = $xml->name;
		$addr = $xml->address;
		$gend = $xml->gender;
		$email=$em;
		$password=$pass;
		$name=$nm;
		$address=$addr;
		$gender=$gend;
		///$ret=register('2hin@gmail.com','147','Tuhin','Dhaka','Male');
		register($email,$password,$name,$address,$gender);
		///******sent a email with ret *****/////
		$_SESSION['status']=2;
		header('Location: ../client/Login.php');		
		?>