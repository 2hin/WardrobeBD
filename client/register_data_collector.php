		<?php
		
			session_start();
			$uname = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			
			if (strlen($password)==0 || strlen($uname)==0 || strlen($email)==0 )
			{
				header('Location: ../client/register.php');
			}
			$address = $_POST['address'];
			//$gender = $_POST['male'];
			//$female = $_POST['female'];			
			
			if ($_POST['gender'] == 'male')
				$gender = "male";
			else if($_POST['gender'] == 'female')
				$gender = "female";		
			
			$xml=<<<XML
			<user>
			<name>$uname</name>
			<email>$email</email>
			<address>$address</address>
			<password>$password</password>
			<gender>$gender</gender>
			</user>
XML;
		echo $xml;
		$_SESSION['xml'] = $xml;
		
		header('Location: ../server/registrationaction.php'); 
		
		?>