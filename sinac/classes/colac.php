<?php
	class Colac {
		
		private $id_colac= 0;
		private $id_corac= 0;
		private $id_conac= 0;
		private $nombre_colac = "";
		private $sql;
		
		public function __construct($id_colac, $nombre_colac, $id_corac, $id_conac){
			$this->id_colac= $id_colac;
			$this->nombre_colac= $nombre_colac;
			$this->id_corac = $id_corac;
			$this->id_conac = $id_conac;
		}

		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdColac(Colac $id_colac){
			$this->id_colac= $id_colac;
		}
		
		public function getIdColac() {
			return $this->id_colac;
		}
		
		public function setNombrecolac(Colac $nombre_colac){
			$this->nombre_colac= $nombre_colac;
		}
		
		public function getIdNombrescolac() {
			return $this->nombre_colac;
		}

		public function setIdCorac(Colac $id_corac){
			$this->id_corac= $id_corac;
		}
		
		public function getIdCorac() {
			return $this->id_corac;
		}

		public function setIdConac(Colac $id_conac){
			$this->id_conac= $id_conac;
		}
		
		public function getIdConac() {
			return $this->id_conac;
		}

		public function setSQL(Colac $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addColac(){
			require_once("../manager/connectionDB.php");
			echo("<script>console.log('PHP: addColac()".$this->id_corac." ".$this->id_conac." ".$this->nombre_colac."');</script>");
			$connection = ConnectionDB::class;
			$sql = "INSERT INTO colac (CORAC_idCORAC, CORAC_CONAC_idCONAC, nombre_colac) VALUES ($this->id_corac, $this->id_conac,'$this->nombre_colac')";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function updateColac(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "UPDATE colac SET CORAC_idCORAC=$this->id_corac, nombre_colac='$this->nombre_colac' WHERE idCOLAC=$this->id_colac";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function deleteColac(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "DELETE FROM colac WHERE idCOLAC=$this->id_colac";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idCOLAC, CORAC_idCORAC, CORAC_CONAC_idCONAC, nombre_colac FROM colac ORDER BY idCOLAC";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}

		public function searchColacs($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			if($page === "" || $record_per_page === ""){
				$sql = "SELECT idCOLAC, nombre_colac FROM colac ORDER BY idCOLAC ";
			}elseif($page != null || $record_per_page != null){
				$start_from_page = ($page - 1) * $record_per_page;
				$sql = "SELECT colac.idCOLAC, colac.CORAC_idCORAC, colac.nombre_colac, corac.nombre_corac FROM colac INNER JOIN corac ON colac.CORAC_idCORAC = corac.idCORAC ORDER BY colac.CORAC_idCORAC LIMIT $start_from_page, $record_per_page";
			}
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}
	}
?>