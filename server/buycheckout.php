		<?php
		include '../db/dbaccess.php';
		
		function buy()
		{
			///$cid=$_SESSION['cid'];
			///$email=$_SESSION['email'];
			$cid=3;
			$email='2hin';
			$ret = buycart($cid,$email);
		}
		buy();
		?>