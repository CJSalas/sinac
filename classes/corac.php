<?php
	class Corac {
		
		private $id_corac= "";
		private $nombre_corac = "";
		private $Miembro = Miembros::class;
		private $Colac = Colac::class;
		private $sql;
		
		public function __construct($id_corac, $nombre_corac, $Miembro, $Conac){
			$this->id_corac= $id_corac;
			$this->nombre_corac= $nombre_corac;
			$this->Miembro = $Miembro;
			$this->Conac= $Conac;
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
		
		public function getIdNombrescorac() {
			return $this->nombre_corac;
		}
		
		public function setMiembro(Corac $Miembro){
			$this->Miembro= $Miembro;
		}
		
		public function getMiembro() {
			return $this->Miembro;
		}
		
		public function setCorac(Corac $Colac){
			$this->Colac= $Colac;
		}
		
		public function getColac() {
			return $this->Colac;
		}
		
		public function setSQL(Corac $sql){
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