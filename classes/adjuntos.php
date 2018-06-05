<?php
	class Adjuntos {
		
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
		
		public function setIdSector(Adjuntos $id_sector){
			$this->id_sector= $id_sector;
		}
		
		public function getIdSector() {
			return $this->id_sector;
		}
		
		public function setNombresector(Adjuntos $nombre_sector){
			$this->nombre_sector= $nombre_sector;
		}
		
		public function getNombresector() {
			return $this->nombre_sector;
		}
		
		public function setPresupuestoanno(Adjuntos $presupuesto_anno){
			$this->presupuesto_anno= $presupuesto_anno;
		}
		
		public function getPresupuestoanno() {
			return $this->presupuesto_anno;
		}
		
		public function setSQL(Adjuntos $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addSector(){
			$this->execStmnt($sql);
		}
		
	}
?>