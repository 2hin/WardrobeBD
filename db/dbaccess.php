		<?php
		
		include 'dbhandler.php';
		
		function checklogin( $email , $password )
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$db = new dbhandler($servername,$username,$dbpassword,$dbname);
			$ret=$db->get_row("customer","status",array("email","password"),array($email,$password),array("s","s"));	
			if(	$ret==1	)
			{
					return 1;
			}
			else return 0;
		}
		function register($email,$password,$name,$address,$gender)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$rand=rand();
			while($rand==0)
			{
				$rand=rand();
			}
			$db = new dbhandler($servername,$username,$dbpassword,$dbname);
			$db->insert_row('customer',array('email','password','name','address','gender','pin'),array($email,$password,$name,$address,$gender,$rand),array('s','s','s','s','s','n'));
			return $rand;
		}
		function checkpin($pin,$email)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$db = new dbhandler($servername,$username,$dbpassword,$dbname);
			$ret=$db->get_row("customer","pin",array("email","pin"),array($email,$pin),array("s","n"));	
			if(	$ret==$pin	)
			{
				$ret=$db->update_row("customer",array("status"),array(1),array("n"),array("email","pin"),array($email,$pin),array("s","n"));
				return 1;
			}
			else return 0;
		}
		function updatepin($email)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$rand=rand();
			while($rand==0)
			{
				$rand=rand();
			}
			$db = new dbhandler($servername,$username,$dbpassword,$dbname);
			$ret=$db->update_row("customer",array("pin"),array($rand),array("n"),array("email"),array($email),array("s"));
			return $rand;
		}
		function updatepassword($email,$password)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$db = new dbhandler($servername,$username,$dbpassword,$dbname);
			$ret=$db->update_row("customer",array("password"),array($password),array("s"),array("email"),array($email),array("s"));
		}
		function get_home_probucts()
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM product ORDER BY sold DESC LIMIT 10";
			$result = $conn->query($sql);
			return $result;
		}
		function get_men_probucts()
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM pro_cat where catagoryid = 1 ";
			$result = $conn->query($sql);
			return $result;
		}
		function get_women_probucts()
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM pro_cat where catagoryid = 2 ";
			$result = $conn->query($sql);
			return $result;
		}
		function get_product($productid)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM product where productid = ".$productid ;
			$result = $conn->query($sql);
			return $result;
		}
		function get_products()
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM product ";
			$result = $conn->query($sql);
			return $result;
		}
		function search_products($str)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * from product Where name LIKE '".$str."%'";
			///echo $sql;
			$result = $conn->query($sql);
			return $result;
		}
		function maxcart()
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT * FROM `order` ORDER BY cartid DESC LIMIT 1";
			$result = $conn->query($sql);
			return $result;
		}
		function updateorder($cid,$pid)
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="INSERT INTO order (productid, cartid) values (".$pid.",".$cid.")";
			$sql="INSERT INTO `order`(`productid`, `cartid`) VALUES (".$pid.",".$cid.")";
			echo $sql;
			$result = $conn->query($sql);
		}
		function cart( $cid )
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="SELECT `productid` FROM `order` WHERE `cartid` = ".$cid ;
			$result = $conn->query($sql);
			return $result;
		}
		function buycart( $cid ,$email )
		{
			$servername = "localhost";
			$username = "root";
			$dbpassword = "";
			$dbname = "wardrobe";
			$conn = mysqli_connect( $servername, $username, $dbpassword, $dbname);
			$sql="INSERT INTO `cart`(`cartid` `email`) VALUES (".$cid.",".$email.")";
			$result = $conn->query($sql);
		}
		
		
		
		?>