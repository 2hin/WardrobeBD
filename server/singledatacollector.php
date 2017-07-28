		<?php
		
		include "../db/dbaccess.php";
				
		function single_data( $pid )
		{
			$xml = new SimpleXMLElement('<xml/>');
			$result = get_product($pid);
			if ( $result->num_rows > 0) 
			{
				$ret =  array();
				while($row = $result->fetch_assoc()) 
				{
					$res=get_product($row["productid"]);
					$rw=$res->fetch_assoc();
					$product = $xml -> addChild('product');
					$product->addChild('productid',(int)$rw["productid"]);
					$product->addChild('name', (string)$rw["name"]);
					$product->addChild('price',(int) $rw["Price"]);
					$product->addChild('im',(string) $rw["image"]);
					$product->addChild('description',(string) $rw["Description"]);
					$product->addChild('quantity',(int) $rw["quantity"]);
					$product->addChild('sold',(int) $rw["sold"]);
				}
			}
			///Header('Content-type: text/xml');
			$xml=$xml->saveXML();
			
			echo $xml;
			
			return $xml;
		}
		single_data(3);
		
		?>