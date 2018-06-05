<?php
	class Sectores {
		
		private $id_sector= "";
		private $nombre_sector = "";
		private $sql;
		
		public function __construct($id_sector, $nombre_sector){
			$this->id_sector= $id_sector;
			$this->nombre_sector= $nombre_sector;
		}

		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdSector(Sectores $id_sector){
			$this->id_sector= $id_sector;
		}
		
		public function getIdSector() {
			return $this->id_sector;
		}
		
		public function setNombresector(Sectores $nombre_sector){
			$this->nombre_sector= $nombre_sector;
		}
		
		public function getNombresector() {
			return $this->nombre_sector;
		}
		
		public function setSQL(Sectores $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idSector, nombre_sector FROM sector ORDER BY idSector";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = ConnectionDB::class;
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}
		
		public function addSector(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "INSERT INTO sector (nombre_sector) VALUES ('$this->nombre_sector')";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function updateSector(){			
			require_once("../manager/connectionDB.php");
			echo("ENTRO CLASE".$this->nombre_sector);
			$connection = ConnectionDB::class;
			$sql = "UPDATE sector SET nombre_sector='$this->nombre_sector' WHERE idSector=$this->id_sector";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function deleteSector(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "DELETE FROM sector WHERE idSector=$this->id_sector";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
		}

		public function searchSectors($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			if($page === "" || $record_per_page === ""){
				$sql = "SELECT idSector, nombre_sector FROM sector ORDER BY idSector ";
			}else if($page != null || $record_per_page != null){
				$start_from_page = ($page - 1) * $record_per_page;
				$sql = "SELECT idSector, nombre_sector FROM sector ORDER BY idSector ASC LIMIT $start_from_page, $record_per_page";
			}
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}		
	}
?>