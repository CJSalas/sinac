<?php
	class Conac {
		
		private $id_conac= "";
		private $nombre_conac = "";
		private $idMiembro = 0;
		private $idCorac = 0;
		private $sql;
		
		public function __construct($id_conac, $nombre_conac, $idMiembro, $idCorac){
			$this->id_conac= $id_conac;
			$this->nombre_conac= $nombre_conac;
			$this->idMiembro= $idMiembro;
			$this->idCorac= $idCorac;
		}

		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdConac(Conac $id_conac){
			$this->id_conac= $id_conac;
		}
		
		public function getIdConac() {
			return $this->id_conac;
		}
		
		public function setNombreconac(Conac $nombre_conac){
			$this->nombre_conac= $nombre_conac;
		}
		
		public function getIdNombresconac() {
			return $this->nombre_conac;
		}
		
		public function setMiembro(Conac $idMiembro){
			$this->idMiembro= $idMiembro;
		}
		
		public function getMiembro() {
			return $this->idMiembro;
		}
		
		public function setCorac(Conac $idCorac){
			$this->idCorac= $idCorac;
		}
		
		public function getCorac() {
			return $this->idCorac;
		}
		
		public function setSQL(Conac $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addSector(){
			$this->execStmnt($sql);
		}

		public function searchConacs($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			echo("<script>console.log('PHP: ENTRO2');</script>");
			$connection = ConnectionDB::class;
			$start_from_page = ($page - 1) * $record_per_page;
			$sql = "SELECT idCONAC, nombre_org FROM conac";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}
	}
?>