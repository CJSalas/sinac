<?php
	class Corac {
		
		private $id_corac= "";
		private $nombre_corac = "";
		private $idConac = 0;
		private $sql;
		
		public function __construct($id_corac, $nombre_corac, $idConac){
			$this->id_corac= $id_corac;
			$this->nombre_corac= $nombre_corac;
			$this->idConac= $idConac;
		}
		
		public static function create() {
			$instance = new self();
			return $instance;
		}

		public function setIdCorac(Corac $id_corac){
			$this->id_corac= $id_corac;
		}
		
		public function getIdCorac() {
			return $this->id_corac;
		}
		
		public function setNombreCorac(Corac $nombre_corac){
			$this->nombre_corac= $nombre_corac;
		}
		
		public function getIdNombrecorac() {
			return $this->nombre_corac;
		}
		
		public function setConac(Corac $idConac){
			$this->idConac= $idConac;
		}
		
		public function getConac() {
			return $this->idConac;
		}
		
		public function setSQL(Corac $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addCorac(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "INSERT INTO corac (CONAC_idCONAC, nombre_corac) VALUES ($this->idConac,'$this->nombre_corac')";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function updateCorac(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "UPDATE corac SET nombre_corac='$this->nombre_corac' WHERE idCORAC=$this->id_corac";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function deleteCorac(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "DELETE FROM corac WHERE idCORAC=$this->id_corac";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idCORAC, CONAC_idCONAC, nombre_corac FROM corac ORDER BY idCORAC";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = ConnectionDB::class;
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}

		public function searchCoracs($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			if($page === "" || $record_per_page === ""){
				$sql = "SELECT idCORAC, CONAC_idCONAC, nombre_corac FROM corac ORDER BY idCORAC";
			}else if($page != null || $record_per_page != null){
				$start_from_page = ($page - 1) * $record_per_page;
				$sql = "SELECT idCORAC, CONAC_idCONAC, nombre_corac FROM corac ORDER BY idCORAC ASC LIMIT $start_from_page, $record_per_page";
			}
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}
	}
?>