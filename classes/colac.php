<?php
	class Colac {
		
		private $id_colac= "";
		private $nombre_colac = "";
		private $Miembro = Miembros::class;
		private $sql;
		
		public function __construct($id_colac, $nombre_colac, $Miembro){
			$this->id_colac= $id_colac;
			$this->nombre_colac= $nombre_colac;
			$this->Miembro = $Miembro;
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
		
		public function setMiembro(Colac $Miembro){
			$this->Miembro= $Miembro;
		}
		
		public function getMiembro() {
			return $this->Miembro;
		}
		
		public function setSQL(Colac $sql){
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