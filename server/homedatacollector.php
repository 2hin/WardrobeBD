		<?php
		
		include "../db/dbaccess.php";
				
		function home_data( )
		{
			$xml = new SimpleXMLElement('<xml/>');
			
			
			
			$result=get_home_probucts();
			if ( $result->num_rows > 0) 
			{
				$ret =  array();
				while($row = $result->fetch_assoc()) 
				{
					$product = $xml -> addChild('product');
					$product->addChild('productid',(int)$row["productid"]);
					$product->addChild('name', (string)$row["name"]);
					$product->addChild('price',(int) $row["Price"]);
					$product->addChild('im',(string) $row["image"]);
					$product->addChild('description',(string) $row["Description"]);
					$product->addChild('quantity',(int) $row["quantity"]);
					$product->addChild('sold',(int) $row["sold"]);
				}
			}
			///Header('Content-type: text/xml');
			$xml=$xml->saveXML();
			
			echo $xml;
			
			return $xml;
		}
		home_data();
		
		?>