		<?php
		
			session_start();
			$uemail = $_POST['email'];
			$xml=<<<XML
			<user>
			<email>$uemail</email>
			</user>
XML;
		
		$_SESSION['xml'] = $xml;
		echo $xml;
		header('Location: ../server/passwordresetaction.php'); 
		
		?>