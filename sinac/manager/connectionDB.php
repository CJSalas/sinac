<?php
	
	class ConnectionDB {
	
		private $sql = "";
		private $username = "";
		private $password = "";
		private $hostname = "";
		private $dataConnection = "";
		private $databasename = "";

		public function __construct($sql){
			$this->sql = $sql;
			$this->username = "sinactes_root";//"root";//"sinactes_root";
			$this->password = "!?[hn{&PFt]?";//"";//"!?[hn{&PFt]?";
			$this->hostname = "localhost:3306";//"localhost";//"cpanel.freehosting.com";
			$this->dataConnection = "";
			$this->databasename = "sinactes_mydbsinac";//"mydbsinac";//"sinactes_mydbsinac";
		}

		public function DBLogin()
		{
			$this->dataConnection = mysql_connect($this->hostname,$this->username,$this->password);

			if(!$this->dataConnection)
			{ 
				echo("Database Login failed! Please make sure that the DB login credentials provided are correct");
				return false;
			}
			if(!mysql_select_db($this->databasename, $this->dataConnection))
			{
				echo('Failed to select database: '.$this->databasename.' Please make sure that the database name provided is correct');
				return false;
			}
			if(!mysql_query("SET NAMES 'UTF8'",$this->dataConnection))
			{
				echo('Error setting utf8 encoding');
				return false;
			}
			return true;
		} 

		public function getConnecion(){
			$array = array();
			if(!$this->DBLogin())
			{
				echo("Database login failed!");
				return false;
			} 
			$result = mysql_query($this->sql,$this->dataConnection); 

			if(!$result || mysql_num_rows($result) <= 0)
			{
				echo("There is no data in this query: $this->sql");
				return false;
			}

			while($row = mysql_fetch_assoc($result)) { 
				$array[] = $row; 
			}
			
			return $array;
		}

		public function setConnection(){
			if(!$this->DBLogin())
			{
				echo("Error getting \nquery:$this->sql");
				return false;
			} 
			mysql_query( $this->sql ,$this->dataConnection);
			$last_id = mysql_insert_id();
			return $last_id;
		}

		public function getTotalOfNumbers(){
			$totalofnumbers = 0;

			if(!$this->DBLogin())
			{
				echo("Error getting \nquery:$this->sql");
				return false;
			} 
			$result = mysql_query( $this->sql ,$this->dataConnection);
			$totalofnumbers = mysql_num_rows($result);
			
			return $totalofnumbers;
		}
    }
?>
