<?php
	class Miembros {
		
		private $id_miembro = 0;
		private $suplente_miembro = 0;
		private $instituciones = Instituciones::class;		
		private $idInstituciones = "";
		private $nombre_miembro = "";
		private $apellido_miembro = "";
		private $nacimiento_miembro = "";
		private $correo_miembro = "";
		private $ingreso_miembro = "";
		private $domicilio_miembro = "";
		private $activo_miembro = 0;
		private $imagen_miembro = "";
		private $sql = "";
		
		public function __construct($id_miembro, $suplente_miembro, $idInstituciones, $nombre_miembro, $apellido_miembro, $nacimiento_miembro, $correo_miembro, $ingreso_miembro, $domicilio_miembro, $activo_miembro, $imagen_miembro){
			$this->id_miembro = $id_miembro;
			$this->suplente_miembro= $suplente_miembro;
			$this->idInstituciones= $idInstituciones;
			$this->nombre_miembro= $nombre_miembro;
			$this->apellido_miembro = $apellido_miembro;
			$this->nacimiento_miembro = $nacimiento_miembro;
			$this->correo_miembro= $correo_miembro;
			$this->ingreso_miembro= $ingreso_miembro;
			$this->domicilio_miembro= $domicilio_miembro;
			$this->activo_miembro= $activo_miembro;
			$this->imagen_miembro= $imagen_miembro;
		}

		public static function create() {
			$instance = new self();
			return $instance;
		}
		
		public function setIdmiembro(Miembros $id_miembro){
			$this->id_miembro = $id_miembro;
		}
		
		public function getIdmiembro() {
			return $this->id_miembro;
		}
		
		public function setSuplentemiembro(Miembros $suplente_miembro){
			$this->suplente_miembro= $suplente_miembro;
		}
		
		public function getSuplentemiembro() {
			return $this->suplente_miembro;
		}
		
		public function setInstMiembro(Miembros $idInstituciones){
			$this->idInstituciones= $idInstituciones;
		}
		
		public function getInstMiembro() {
			return $this->$idInstituciones;
		}
		
		public function setNombremiembro(Miembros $nombre_miembro){
			$this->nombre_miembro= $nombre_miembro;
		}
		
		public function getNombremiembro() {
			return $this->nombre_miembro;
		}
		
		public function setApellidomiembro(Miembros $apellido_miembro){
			$this->apellido_miembro= $apellido_miembro;
		}
		
		public function getApellidomiembro() {
			return $this->apellido_miembro;
		}
		
		public function setNacimientomiembro(Miembros $nacimiento_miembro){
			$this->nacimiento_miembro= $nacimiento_miembro;
		}
		
		public function getNacimientomiembro() {
			return $this->nacimiento_miembro;
		}
		
		public function setCorreomiembro(Miembros $correo_miembro){
			$this->correo_miembro= $correo_miembro;
		}
		
		public function getCorreomiembro() {
			return $this->correo_miembro;
		}
		
		public function setIngresomiembro(Miembros $ingreso_miembro){
			$this->ingreso_miembro= $ingreso_miembro;
		}
		
		public function getIngresomiembro() {
			return $this->ingreso_miembro;
		}
		
		public function setDomiciliomiembro(Miembros $domicilio_miembro){
			$this->domicilio_miembro= $domicilio_miembro;
		}
		
		public function getDomiciliomiembro() {
			return $this->domicilio_miembro;
		}
		
		public function setActivomiembro(Miembros $activo_miembro){
			$this->activo_miembro= $activo_miembro;
		}
		
		public function getActivomiembro() {
			return $this->activo_miembro;
		}

		public function setImagenmiembro(Miembros $imagen_miembro){
			$this->imagen_miembro= $imagen_miembro;
		}
		
		public function getImagenmiembro() {
			return $this->imagen_miembro;
		}
		
		public function addUser(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql ="INSERT INTO miembros (idMiembros, Suplente_idSuplente, Institucion_idInstitucion, nombre, apellido, fecha_ingreso, fecha_nacimiento, domicilio, correo_electronico, activo, imagen_miembro)"
			."VALUES ('$this->id_miembro','$this->suplente_miembro','$this->idInstituciones','$this->nombre_miembro','$this->apellido_miembro','$this->ingreso_miembro','$this->nacimiento_miembro','$this->domicilio_miembro','$this->correo_miembro','$this->activo_miembro','$this->imagen_miembro')";
			$connection = new ConnectionDB($sql);
			$connection->getConnecion();	
		}
	}
?>