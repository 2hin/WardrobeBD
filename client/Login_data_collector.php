		<?php
		
			session_start();
			$uemail = $_POST['email'];
			$upassword = $_POST['password'];
			$xml=<<<XML
			<user>
			<email>$uemail</email>
			<password>$upassword</password>
			</user>
XML;
		
		$_SESSION['xml'] = $xml;
		echo $xml;
		header('Location: ../server/loginaction.php'); 
		
		?>