<?php

	class Instituciones {
		
		private $idinstitucion = 0;
		private $idSector = "";
		private $nombre_institucion = "";
		private $presupuesto_anno= "";
		private $funcion_institucion= "";
		private $objetivo_redd= "";
		private $sql;
		
		public function __construct($id_institucion, $idSector, $nombre_institucion, $presupuesto_anno, $funcion_institucion, $objetivo_redd){
			$this->id_institucion = $id_institucion;
			$this->idSector = $idSector;
			$this->nombre_institucion = $nombre_institucion;
			$this->presupuesto_anno = $presupuesto_anno;
			$this->funcion_institucion = $funcion_institucion;
			$this->objetivo_redd = $objetivo_redd;
		}
		
		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdinstitucion(Instituciones $id_institucion){
			$this->id_institucion = $id_institucion;
		}
		
		public function getIdinstitucion() {
			return $this->id_institucion;
		}
		
		public function setIdSector(Instituciones $idSector){
			$this->idSector= $idSector;
		}
		
		public function getIdSector() {
			return $this->idSector;
		}
		
		public function setNombreinsti(Instituciones $nombre_institucion){
			$this->nombre_institucion = $nombre_institucion;
		}
		
		public function getNombreinsti() {
			return $this->nombre_institucion;
		}
		
		public function setPresupuestoanno(Instituciones $presupuesto_anno){
			$this->presupuesto_anno = $presupuesto_anno;
		}
		
		public function getPresupuestoanno() {
			return $this->presupuesto_anno;
		}

		public function setFuncioninstitcion(Instituciones $funcion_institucion){
			$this->funcion_institucion = $funcion_institucion;
		}
		
		public function getFuncioninstitcion() {
			return $this->funcion_institucion;
		}

		public function setObjetivoRedd(Instituciones $objetivo_redd){
			$this->objetivo_redd = $objetivo_redd;
		}
		
		public function getObjetivoRedd() {
			return $this->objetivo_redd;
		}

		public function setSQL(Sectores $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addInstitution(){
			$this->execStmnt($sql);
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idInstitucion, nombre_institucion, presupuesto_anno, id_Sector, funcion_institucion, objetivo_redd FROM institucion ORDER BY idInstitucion";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = ConnectionDB::class;
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}

		public function searchInstitutions($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$start_from_page = ($page - 1) * $record_per_page;
			$sql = "SELECT idInstitucion, nombre_institucion, presupuesto_anno, id_Sector, funcion_institucion, objetivo_redd FROM institucion ORDER BY idInstitucion ASC LIMIT $start_from_page, $record_per_page";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}
	}
?>