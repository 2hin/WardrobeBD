		<?php
		include '../db/dbaccess.php';
		
		function cartdetail()
		{
			$cid=$_SESSION['cid'];
			$cid=3;
			$ret = cart($cid);
			$row = $ret->fetch_assoc();
			$rt=(int)$row["productid"];
			echo $rt;
			return $rt;
		}
		?>