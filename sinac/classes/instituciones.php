<?php

	class Instituciones {
		
		private $idinstitucion = 0;
		private $idSector = 0;
		private $nombre_institucion = "";
		private $presupuesto_anno= "";
		private $funcion_institucion= "";
		private $objetivo_redd= "";
		private $sql;
		
		public function __construct($idinstitucion, $nombre_institucion, $presupuesto_anno, $idSector, $funcion_institucion, $objetivo_redd){
			$this->idinstitucion = $idinstitucion;
			$this->nombre_institucion = $nombre_institucion;
			$this->presupuesto_anno = $presupuesto_anno;
			$this->idSector = $idSector;
			$this->funcion_institucion = $funcion_institucion;
			$this->objetivo_redd = $objetivo_redd;
		}
		
		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdinstitucion(Instituciones $idinstitucion){
			$this->idinstitucion = $idinstitucion;
		}
		
		public function getIdinstitucion() {
			return $this->idinstitucion;
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
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			
			$sql = "INSERT INTO institucion (nombre_institucion, presupuesto_anno, funcion_institucion, objetivo_redd) VALUES ('$this->nombre_institucion','$this->presupuesto_anno','$this->funcion_institucion','$this->objetivo_redd')";
			$connection = new ConnectionDB($sql);
			$last_id = $connection->setConnection();
			$sql = "INSERT INTO sector_instituciones (idSector, idInstitucion) VALUES ($this->idSector, $last_id)";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function updateInstituciones(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "UPDATE institucion SET nombre_institucion='$this->nombre_institucion',presupuesto_anno='$this->presupuesto_anno',funcion_institucion='$this->funcion_institucion',objetivo_redd='$this->objetivo_redd' WHERE idInstitucion=$this->idinstitucion";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
			$sql = "UPDATE sector_instituciones SET idSector=$this->idSector WHERE idInstitucion=$this->idinstitucion";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}
//arreglar
		public function deleteInstituciones(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "DELETE FROM institucion WHERE idInstitucion=$this->idinstitucion";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idInstitucion, nombre_institucion, presupuesto_anno, funcion_institucion, objetivo_redd FROM institucion ORDER BY idInstitucion";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}

		public function searchInstitutions($page, $record_per_page){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			if($page === "" || $record_per_page === ""){
				$sql = "SELECT idInstitucion, nombre_institucion FROM institucion ORDER BY idInstitucion ";
			}elseif($page != null || $record_per_page != null){
				$start_from_page = ($page - 1) * $record_per_page;
				$sql = "SELECT sector_instituciones.idSector, institucion.idInstitucion, institucion.nombre_institucion, institucion.presupuesto_anno, institucion.funcion_institucion, institucion.objetivo_redd FROM institucion INNER JOIN sector_instituciones ON sector_instituciones.idInstitucion = institucion.idInstitucion ORDER BY sector_instituciones.idInstitucion LIMIT $start_from_page, $record_per_page";
			}
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}

		public function searchNumberInstPerSector($idSector){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT COUNT(A.idInstitucion) as NumberOfInstitutions 
			FROM institucion A INNER JOIN sector_instituciones B ON A.idInstitucion = B.idInstitucion 
			INNER JOIN sector C ON B.idSector = C.idSector 
			WHERE C.idSector = $idSector";
			$connection = new ConnectionDB($sql);
			$numberOfRows = $connection->getConnecion();
			return $numberOfRows;
		}
	}
?>