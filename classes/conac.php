<?php
	class Conac {
		
		private $id_conac= "";
		private $nombre_conac = "";
		private $Miembro = Miembros::class;
		private $Corac = Corac::class;
		private $sql;
		
		public function __construct($id_conac, $nombre_conac, $Miembro){
			$this->id_conac= $id_conac;
			$this->nombre_conac= $nombre_conac;
			$this->Miembro = $Miembro;
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
		
		public function setMiembro(Conac $Miembro){
			$this->Miembro= $Miembro;
		}
		
		public function getMiembro() {
			return $this->Miembro;
		}
		
		public function setCorac(Conac $Corac){
			$this->Corac= $Corac;
		}
		
		public function getCorac() {
			return $this->Corac;
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
	}
?>