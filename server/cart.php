		<?php
		include '../db/dbaccess.php';
		
		function makecart()
		{
			$ret = maxcart();
			$row = $ret->fetch_assoc();
			$rt=(int)$row["cartid"];
			$rt = $rt+1;
			return $rt;
		}
		function addcart($cid,$pid)
		{
			updateorder($cid,$pid);
		}
		addcart(1,2);
		?>