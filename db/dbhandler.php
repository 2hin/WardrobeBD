		<?php

		class dbHandler
		{
			protected $conn;
			public function __construct ( $host=NULL, $user=NULL, $pass=NULL, $dbName=NULL )
			{
				$this->conn = mysqli_connect( $host, $user, $pass, $dbName);
			}

			public function __destruct(){
				if( ! mysqli_close($this->conn) ){
					echo 'Error While Closing Connection to DB: '.mysqli_error( $this->conn );
				}
			}

			public function get_row($table, $retKey, $searchKey, $searchVal, $searchType)
			{
				if(sizeof($searchKey) != sizeof($searchVal) || sizeof($searchVal) != sizeof($searchType))
				{
					echo "Wrong Search Parameter";
					return NULL;
				}

				$sql = "SELECT * FROM $table Where ";
				for($i=0; $i<sizeof($searchKey); $i++)
				{
					$sql = $sql . "$searchKey[$i] = ";
					if($searchType[$i] == "s")
					{
						$sql = $sql . "'" . $searchVal[$i] . "'";
					}
					else $sql = $sql . $searchVal[$i];
					if( $i+1 != sizeof($searchKey) )$sql = $sql." and  ";
				}
				///echo "$sql<br/>";
				$result = $this->conn->query($sql);
				echo $this->conn->error;

				if ($result->num_rows == 1) {
					$ret = $result->fetch_assoc()[$retKey];
					return $ret;
				} else{
					//if ($result->num_rows == 0) echo "sql returned NULL<br/>";
					//else echo "sql returned more than 1 rows<br/>";
					return NULL;
				}
			}

			public function get_rows($table, $retKey, $searchKey, $searchVal, $searchType)
			{
				if(sizeof($searchKey) != sizeof($searchVal) || sizeof($searchVal) != sizeof($searchType))
				{
					echo "Wrong Search Parameter<br/>";
					return NULL;
				}
				if(sizeof($searchKey))
				$sql = "SELECT * FROM $table Where ";
				else $sql = "SELECT * FROM $table";
				for($i=0; $i<sizeof($searchKey); $i++){
					$sql = $sql . "$searchKey[$i] = ";
					if($searchType[$i] == "s"){
						$sql = $sql . "'" . $searchVal[$i] . "'";
					}
					else $sql = $sql . $searchVal[$i];
					if( $i+1 != sizeof($searchKey)) $sql.", ";
				}
				echo "$sql<br/>";
				$result = $this->conn->query($sql);
				echo $this->conn->error;

				if ($result->num_rows > 0) {
					$ret =  array();
					while($row = $result->fetch_assoc()) {
						array_push($ret, $row[$retKey]);
					}
					return $ret;
				} else{
					echo "sql returned NULL<br/>";
					return NULL;
				}
			}
			public function insert_row($table, $searchKey, $searchVal, $searchType)
			{
				if(sizeof($searchKey) != sizeof($searchVal) || sizeof($searchVal) != sizeof($searchType)){
					echo "Wrong Search Parameter<br/>";
					return NULL;
				}

				$sql = "INSERT INTO $table (";
				for($i=0; $i<sizeof($searchKey); $i++)
				{
					$sql = $sql . "$searchKey[$i]";
					if( $i+1 != sizeof($searchKey) ) $sql=$sql.", ";
				}
				$sql=$sql.") values ( ";
				for($i=0; $i<sizeof($searchKey); $i++)
				{
					if($searchType[$i] == "s"){
						$sql = $sql . "'" . $searchVal[$i] . "'";
					}
					else $sql = $sql . $searchVal[$i];
					if( $i+1 != sizeof($searchKey) ) $sql=$sql.", ";
				}
				$sql=$sql.")";
				echo "$sql<br/>";
				if( $result = $this->conn->query($sql) )
				return 1;
				else return 0;
			}
			public function delete_row($table, $searchKey, $searchVal, $searchType)
			{
				if(sizeof($searchKey) != sizeof($searchVal) || sizeof($searchVal) != sizeof($searchType)){
					echo "Wrong Search Parameter<br/>";
					return NULL;
				}

				$sql = "delete from $table where ";
				for($i=0; $i<sizeof($searchKey); $i++)
				{
					$sql = $sql . "$searchKey[$i] = ";
					if($searchType[$i] == "s"){
						$sql = $sql . "'" . $searchVal[$i] . "'";
					}
					else $sql = $sql . $searchVal[$i];
					if($i+1 != sizeof($searchKey)) $sql." and ";
				}
				echo "$sql<br/>";
				if( $result = $this->conn->query($sql) )
				return 1;
				else return 0;
			}
			public function update_row($table,$insertKey ,$insertVal,$insertType,$searchKey, $searchVal, $searchType)
			{
				if(sizeof($searchKey) != sizeof($searchVal) || sizeof($searchVal) != sizeof($searchType)){
					echo "Wrong Search Parameter<br/>";
					return NULL;
				}

				$sql = "update $table set ";
				for($i=0; $i<sizeof($insertKey); $i++)
				{
					$sql = $sql . "$insertKey[$i] = ";
					if($insertType[$i] == "s"){
						$sql = $sql . "'" . $insertVal[$i] . "'";
					}
					else $sql = $sql . $insertVal[$i];
					if($i+1 != sizeof($insertKey))$sql = $sql." , ";
				}
				$sql=$sql.' where ';
				for($i=0; $i<sizeof($searchKey); $i++)
				{
					$sql = $sql . "$searchKey[$i] = ";
					if($searchType[$i] == "s"){
						$sql = $sql . "'" . $searchVal[$i] . "'";
					}
					else $sql = $sql . $searchVal[$i];
					if($i+1 != sizeof($searchKey))$sql = $sql." and ";
				}
				if( $result = $this->conn->query($sql) )
				return 1;
				else return 0;
			}
		}
		?>