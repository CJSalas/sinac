<?php
	class Impedimentos {
		
		private $id_impedimento= "";
		private $referencia_impedimento= "";
		private $sql;
		
		public function __construct($id_impedimento, $referencia_impedimento){
			$this->id_impedimento= $id_impedimento;
			$this->referencia_impedimento= $referencia_impedimento;
		}
		
		public static function create() {
			$instance = new self();
			return $instance;
		}

		public function setIdImpedimento(Impedimentos $id_impedimento){
			$this->id_impedimento= $id_impedimentos;
		}
		
		public function getIdImpedimento() {
			return $this->id_impedimento;
		}
		
		public function setReferenciaimpedimento(Impedimentos $referencia_impedimento){
			$this->referencia_impedimento= $referencia_impedimento;
		}
		
		public function getReferenciaimpedimento() {
			return $this->referencia_impedimento;
		}
		
		public function setSQL(Sectores $sql){
			$this->sql= $sql;
		}
		
		public function getSQL() {
			return $this->sql;
		}
		
		public function addImpedimento(){
			$this->execStmnt($sql);
		}
		
	}
?>
