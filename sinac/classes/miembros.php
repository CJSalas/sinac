<?php
	class Miembros {
		
		private $id_miembro = 0;
		private $nombre_miembro = "";
		private $apellido_miembro = "";
		private $telefono_miembro = 0;
		private $correo_miembro = "";
		private $idInstituciones = 0;
		private $idCorac = 0;
		private $idColac = 0;
		private $suplente_miembro = 0;
		private $id_adjuntos = 0;				
		private $activo = 0;				
		private $sql = "";
		
		public function __construct($id_miembro, $nombre_miembro, $apellido_miembro, $telefono_miembro, $correo_miembro, $idInstituciones, $idCorac, $idColac, $suplente_miembro, $id_adjuntos, $activo){
			$this->id_miembro = $id_miembro;
			$this->nombre_miembro= $nombre_miembro;
			$this->apellido_miembro = $apellido_miembro;
			$this->telefono_miembro = $telefono_miembro;
			$this->correo_miembro= $correo_miembro;
			$this->idInstituciones= $idInstituciones;
			$this->idCorac= $idCorac;
			$this->idColac= $idColac;
			$this->suplente_miembro= $suplente_miembro;
			$this->id_adjuntos= $id_adjuntos;
			$this->activo= $activo;
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

		public function setTelefonomiembro(Miembros $telefono_miembro){
			$this->telefono_miembro= $telefono_miembro;
		}
		
		public function getTelefonomiembro() {
			return $this->telefono_miembro;
		}

		public function setCorreomiembro(Miembros $correo_miembro){
			$this->correo_miembro= $correo_miembro;
		}
		
		public function getCorreomiembro() {
			return $this->correo_miembro;
		}

		public function setInstMiembro(Miembros $idInstituciones){
			$this->idInstituciones= $idInstituciones;
		}
		
		public function getInstMiembro() {
			return $this->$idInstituciones;
		}

		public function setCorac(Miembros $idCorac){
			$this->idCorac= $idCorac;
		}
		
		public function getCorac() {
			return $this->$idCorac;
		}

		public function setColac(Miembros $idColac){
			$this->idColac= $idColac;
		}
		
		public function getColac() {
			return $this->$idCorac;
		}
		
		public function setSuplentemiembro(Miembros $suplente_miembro){
			$this->suplente_miembro= $suplente_miembro;
		}
		
		public function getSuplentemiembro() {
			return $this->suplente_miembro;
		}

		public function setIdAdjuntos(Miembros $id_adjuntos){
			$this->id_adjuntos= $id_adjuntos;
		}
		
		public function getIdAdjuntos() {
			return $this->suplente_miembro;
		}

		public function setActivo(Miembros $activo){
			$this->activo= $activo;
		}
		
		public function getActivo() {
			return $this->activo;
		}
		
		public function addSuplente(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "INSERT INTO suplente (idSuplente, nombre_suplente, apellido_suplente, telefono_suplente, correo_electronico_suplente, activo) VALUES ('$this->id_miembro','$this->nombre_miembro','$this->apellido_miembro','$this->telefono_miembro','$this->correo_miembro',$this->activo)";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
			$sql = "INSERT INTO instituciones_suplentes (idSuplente, idInstituciones) VALUES ('$this->id_miembro',$this->idInstituciones)";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
			if($this->idCorac != "Es Corac"){
				$sql = "INSERT INTO corac_suplentes (idSuplente, idCorac) VALUES ('$this->id_miembro',$this->idCorac)";
				$connection = new ConnectionDB($sql);
				$connection->setConnection();
			}	
			if($this->idColac != "Es Colac"){
				$sql = "INSERT INTO colac_suplente (idSuplente, idColac) VALUES ('$this->id_miembro',$this->idColac)";
				$connection = new ConnectionDB($sql);
				$connection->setConnection();
			}	
		}

		public function updateSuplente($idSuplente){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "UPDATE suplente SET activo=0 WHERE idSuplente='$idSuplente'";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function addMiembro(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "INSERT INTO miembros (idMiembros, nombre, apellido, telefono, correo_electronico, activo) VALUES ('$this->id_miembro','$this->nombre_miembro','$this->apellido_miembro','$this->telefono_miembro','$this->correo_miembro',$this->activo)";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();	
			$sql = "INSERT INTO instituciones_miembros (idInstitucion, idMiembro) VALUES ($this->idInstituciones, '$this->id_miembro')";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
			$sql = "INSERT INTO miembros_suplentes (idMiembro, idSuplente) VALUES ('$this->id_miembro', '$this->suplente_miembro')";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
			$sql = "UPDATE suplente SET activo=1 WHERE idSuplente='$this->suplente_miembro'";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();

			if($this->idCorac != "Es Corac"){
				$sql = "INSERT INTO corac_miembro (idCorac, idMiembro) VALUES ($this->idCorac,'$this->id_miembro')";
				$connection = new ConnectionDB($sql);
				$connection->setConnection();
			}	
			if($this->idColac != "Es Colac"){
				$sql = "INSERT INTO colac_miembros (idColac,idMiembro) VALUES ($this->idColac,'$this->id_miembro')";
				$connection = new ConnectionDB($sql);
				$connection->setConnection();
			}	
		}

		public function deleteMiembro(){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "DELETE FROM miembros WHERE idMiembros='$this->id_miembro'";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
			$sql = "UPDATE suplente SET activo=0 WHERE idSuplente='$this->suplente_miembro'";
			$connection = new ConnectionDB($sql);
			$connection->setConnection();
		}

		public function getTotalNumberRows(){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idMiembros, nombre, apellido FROM miembros ORDER BY idMiembros";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$connection_total = new ConnectionDB($sql);
			$totalofnumbers = $connection_total->getTotalOfNumbers();
			return $totalofnumbers;
		}

		public function searchMiembros($page, $record_per_page){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$start_from_page = ($page - 1) * $record_per_page;
			$sql = "SELECT E.idMiembro, E.idSuplente, E.idInstitucion, E.idCorac, F.idColac FROM 
			(
				SELECT C.idMiembro, C.idSuplente, C.idInstitucion, D.idCorac FROM 
				(
					SELECT A.idMiembro, A.idSuplente, B.idInstitucion FROM

					(SELECT idMiembro, idSuplente FROM miembros_suplentes) A 

					LEFT JOIN 

					(SELECT idInstitucion, idMiembro FROM instituciones_miembros) B 

					ON A.idMiembro = B.idMiembro
				) C

				LEFT JOIN 

				(SELECT idCorac, idMiembro FROM corac_miembro) D

				ON C.idMiembro = D.idMiembro
			) E

			LEFT JOIN 

			(SELECT idColac, idMiembro FROM colac_miembros) F

			ON E.idMiembro = F.idMiembro
			
			ORDER BY E.idMiembro LIMIT $start_from_page, $record_per_page";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			return $array;
		}

		public function searchSuplentes($page, $record_per_page){			
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			if($page === "" || $record_per_page === ""){
				//echo("<script>console.log('PHP: searchSuplentes() ');</script>");
				$sql = "SELECT idSuplente, nombre_suplente, apellido_suplente, activo FROM suplente";
			}elseif($page != null || $record_per_page != null){
				$start_from_page = ($page - 1) * $record_per_page;
				//$sql = "SELECT miembros.idMiembros, miembros.nombre, miembros.apellido, miembros.correo_electronico, suplente.idSuplente, miembros.nombre_suplente, miembros.apellido_suplente, suplente.correo_electronico_suplente FROM miembros, suplente, corac, colac INNER JOIN miembros_has_suplentes ON miembros_has_suplentes.Miembros_idMiembros = miembros.idMiembros INNER JOIN corac_has_miembros ON corac_has_miembros.CONAC_idCORAC = corac.idCORAC INNER JOIN colac_has_miembros ON colac_has_miembros.COLAC_idCOLAC = colac.idCOLAC ORDER BY miembros.nombre LIMIT $start_from_page, $record_per_page";
				$sql = "SELECT suplente.idSuplente, suplente.nombre_suplente, suplente.apellido_suplente, corac.idCORAC, corac.nombre_corac, colac.idCOLAC, colac.nombre_colac FROM suplente, corac, colac INNER JOIN corac_suplentes ON corac_suplentes.idCorac = corac.idCORAC INNER JOIN colac_suplentes ON colac_suplentes.idCOLAC = colac.idCOLAC ORDER BY suplente.nombre_suplente LIMIT $start_from_page, $record_per_page";
			}
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
			return $array;
		}

		public function searchInformationMiembro($idMiembro){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idMiembros, nombre, apellido, telefono, correo_electronico, activo FROM miembros WHERE idMiembros = $idMiembro";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
			return $array;
		}

		public function searchInformationSuplente($idSuplente){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idSuplente, nombre_suplente, apellido_suplente, telefono_suplente, correo_electronico_suplente, activo FROM suplente WHERE idSuplente = $idSuplente";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
			return $array;
		}

		public function searchInformationCorac($idCorac){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idCORAC, nombre_corac FROM corac WHERE idCORAC = $idCorac";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$arraylenght = count($array);
			if($arraylenght === 0){
				return $arraylenght;
			}else{
				//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
				return $array;
			}
			
		}

		public function searchInformationColac($idColac){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idCOLAC, nombre_colac FROM colac WHERE idCOLAC = $idColac";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$arraylenght = count($array);
			if($arraylenght === 0){
				return $arraylenght;
			}else{
				//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
				return $array;
			}
			
		}

		public function searchInformationInstituciones($idInstituciones){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT idInstitucion, nombre_institucion, presupuesto_anno, funcion_institucion, objetivo_redd FROM institucion WHERE idInstitucion = $idInstituciones";
			$connection = new ConnectionDB($sql);
			$array = $connection->getConnecion();
			$arraylenght = count($array);
			if($arraylenght === 0){
				return $arraylenght;
			}else{
				//echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($array[0]["nombre_suplente"])." ');</script>");
				return $array;
			}
		}

		public function searchNumberMembersPerSector($idSector){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT COUNT(A.idMiembros) as NumberOfMiembros
			FROM miembros A INNER JOIN instituciones_miembros B ON A.idMiembros = B.idMiembro
			LEFT JOIN institucion C ON C.idInstitucion = B.idInstitucion  
			LEFT JOIN sector_instituciones D ON D.idInstitucion = C.idInstitucion
			LEFT JOIN sector E ON E.idSector = D.idSector
			WHERE E.idSector = $idSector";
			$connection = new ConnectionDB($sql);
			$numberOfRows = $connection->getConnecion();
			return $numberOfRows;
		}

		public function searchNumberSuplentesPerSector($idSector){
			require_once("../manager/connectionDB.php");
			$connection = ConnectionDB::class;
			$sql = "SELECT COUNT(A.idSuplente) as NumberOfSuplentes
			FROM suplente A INNER JOIN instituciones_suplentes B ON A.idSuplente = B.idSuplente
			LEFT JOIN institucion C ON C.idInstitucion = B.idInstituciones
			LEFT JOIN sector_instituciones D ON D.idInstitucion = C.idInstitucion
			LEFT JOIN sector E ON E.idSector = D.idSector
			WHERE E.idSector = $idSector";
			$connection = new ConnectionDB($sql);
			$numberOfRows = $connection->getConnecion();
			return $numberOfRows;
		}
	}
?>