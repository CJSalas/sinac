<?php
	header("Content-Type: text/html;charset=utf-8");
	
	if(isset($_POST['function2Call'])){
		switch($_POST['function2Call']){
			case 'addSectors': 
				addSector();
				break;
			case 'deleteSectors':
				deleteSector($_POST['id_sector']);
				break;
			case 'updateSectors':
				updateSector($_POST['id_sector'], $_POST['nombre_sector']);
				break;
			case 'addInstitutions': 
				addInstitution();
				break;
			case 'updateInstituciones':
				updateInstituciones($_POST['id_institucion'], $_POST['nombre_institucion'], $_POST['presupuesto_institucion'], $_POST['id_sectorInstitucion'], $_POST['funcion_institucion'], $_POST['objetivos_institucion']);
				break;
			case 'deleteInstituciones':
				deleteInstituciones($_POST['id_instituciones']);
				break;
			case 'addCoracs':
				addCorac();
				break;
			case 'deleteCoracs':
				deleteCorac($_POST['id_coracs']);
				break;
			case 'updateCoracs':
				updateCoracs($_POST['id_corac'], $_POST['nombre_corac'], $_POST['id_conac']);
				break;
			case 'addColac':
				addColac();
				break;
			case 'deleteColac':
				deleteColac($_POST['id_colac']);
				break;
			case 'updateColac':
				updateColac($_POST['id_colac'], $_POST['name_colac'], $_POST['id_corac'], $_POST['id_conac']);
				break;
			case 'addMiembro':
				addMiembro();
				break;
			case 'updateMiembro':
				updateMiembro();
				break;
			case 'deleteMiembro':
				deleteMiembro($_POST['id_miembro'], $_POST['id_suplente']);
				break;
			case 'other': 
		}
	}

	//Casos de uso de los sectores 
	function addSector(){
		require_once("../classes/sectores.php");
		$sectores = Sectores::class;
		if(isset($_POST['name_sector']) && $_POST['name_sector'] != ""){
			$sectores = new Sectores(0, $_POST['name_sector']);
			$sectores->addSector();
		}else{
			echo("no entro");
			return false;
		}
	}

	function updateSector($id_sectors, $nombre_sector){
		require_once("../classes/sectores.php");
		$sectores = Sectores::class;
		if(isset($nombre_sector) && $nombre_sector != ""){
			$sectores = new Sectores($id_sectors, $nombre_sector);
			$sectores->updateSector();
		}else{
			return false;
		}
	}

	function deleteSector($id_sectors){
		require_once("../classes/sectores.php");
		$sectores = Sectores::class;
		if(isset($id_sectors)){
			$sectores = new Sectores($id_sectors, "");
			$sectores->deleteSector();
		}else{
			return false;
		}
	}

	function addInstitution(){
		require_once("../classes/instituciones.php");
		$instituciones = Instituciones::class;
		if(isset($_POST['name_institucion']) && $_POST['name_institucion'] != "" || isset($_POST['presupuesto_institucion']) && $_POST['presupuesto_institucion'] != "" || isset($_POST['id_sectorinstitucion']) && $_POST['id_sectorinstitucion'] != "" || isset($_POST['funcion_institucion']) && $_POST['funcion_institucion'] != "" || isset($_POST['objetivo_institucion']) && $_POST['objetivo_institucion'] != ""){
			echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($_POST['name_institucion'])." ');</script>");
			$instituciones = new Instituciones(0, $_POST['name_institucion'], $_POST['presupuesto_institucion'], $_POST['id_sectorinstitucion'], $_POST['funcion_institucion'], $_POST['objetivo_institucion']);
			$instituciones->addInstitution();
		}else{
			return false;
		}
	}

	function deleteInstituciones($id_institucion){
		require_once("../classes/instituciones.php");
		$instituciones = Instituciones::class;
		if(isset($id_institucion)){
			$instituciones = new Instituciones($id_institucion, "", 0, 0,"", "");
			$instituciones->deleteInstituciones();
		}else{
			return false;
		}
	}

	function updateInstituciones($id_institucion, $nombre_institucion, $presupuesto_institucion, $id_sectorInstitucion, $funcion_institucion, $objetivos_institucion){
		require_once("../classes/instituciones.php");
		$instituciones = Instituciones::class;
		if(isset($nombre_institucion) || $nombre_institucion != "" || isset($presupuesto_institucion) || $presupuesto_institucion != "" || isset($funcion_institucion) || $funcion_institucion != "" || isset($objetivos_institucion) || $objetivos_institucion != ""){
			$instituciones = new Instituciones($id_institucion, $nombre_institucion, $presupuesto_institucion, $id_sectorInstitucion, $funcion_institucion, $objetivos_institucion);
			$instituciones->updateInstituciones();
		}else{
			return false;
		}
	}

	function addCorac(){
		require_once("../classes/corac.php");
		$corac = Corac::class;
		if(isset($_POST['name_corac']) && $_POST['name_corac'] != ""){
			$corac = new Corac(0, $_POST['name_corac'], 1);
			$corac->addCorac();
		}else{
			echo("no entro");
			return false;
		}
	}

	function updateCoracs($id_corac, $nombre_corac, $id_conac){
		require_once("../classes/corac.php");
		$corac = Corac::class;
		if(isset($nombre_corac) && $nombre_corac != ""){
			$corac = new Corac($id_corac, $nombre_corac, $id_conac);
			$corac->updateCorac();
		}else{
			return false;
		}
	}

	function deleteCorac($id_corac){
		require_once("../classes/corac.php");
		$corac = Corac::class;
		if(isset($id_corac)){
			$corac = new Corac($id_corac, "", 0);
			$corac->deleteCorac();
		}else{
			return false;
		}
	}

	function addColac(){
		require_once("../classes/colac.php");
		$colac = Colac::class;
		if(isset($_POST['name_colac']) && $_POST['name_colac'] != ""){
			$colac = new Colac(0, $_POST['name_colac'], $_POST['id_corac'], $_POST['id_conac']);
			$colac->addColac();
		}else{
			echo("no entro");
			return false;
		}
	}

	function updateColac($id_colac, $nombre_colac, $id_corac, $id_conac){
		require_once("../classes/colac.php");
		$colac = Colac::class;
		if(isset($nombre_colac) && $nombre_colac != ""){
			$colac = new Colac($id_colac, $nombre_colac, $id_corac, $id_conac);
			$colac->updateColac();
		}else{
			return false;
		}
	}

	function deleteColac($id_colac){
		require_once("../classes/colac.php");
		$colac = Colac::class;
		if(isset($id_colac)){
			$colac = new Colac($id_colac, "", 0, 0);
			$colac->deleteColac();
		}else{
			return false;
		}
	}

	function addMiembro(){
		require_once("../classes/miembros.php");
		$miembros = Miembros::class;
		if(isset($_POST['cedula']) && $_POST['cedula'] != "" || isset($_POST['nombre']) && $_POST['nombre'] != "" || isset($_POST['apellido']) && $_POST['apellido'] != "" || isset($_POST['telefono']) && $_POST['telefono'] != "" || isset($_POST['correo']) && $_POST['correo'] != ""){
			if($_POST['corac'] === "Es Corac"){
				$corac = 0;
			}else{
				$corac = $_POST['corac'];
			}

			if($_POST['corac'] === "Es Colac"){
				$colac = 0;
			}else{
				$colac = $_POST['colac'];
			}

			if($_POST['suplente'] === "Es Suplente"){
				$suplente = 0;
				echo("<script>alert('HOLA'+".$_POST['cedula'].");</script>");
				$miembros = new Miembros($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 0);
				$miembros->addSuplente();
			}else{
				$suplente = $_POST['suplente'];
				$miembros = new Miembros($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 1);
				$miembros->addMiembro();
			}
		}else{
			echo("no entro");
			return false;
		}
	}

	function updateMiembro(){
		require_once("../classes/miembros.php");
		$miembros = Miembros::class;
		if(isset($_POST['cedula']) && $_POST['cedula'] != "" || isset($_POST['nombre']) && $_POST['nombre'] != "" || isset($_POST['apellido']) && $_POST['apellido'] != "" || isset($_POST['telefono']) && $_POST['telefono'] != "" || isset($_POST['correo']) && $_POST['correo'] != ""){
			if($_POST['corac'] === "Es Corac"){
				$corac = 0;
			}else{
				$corac = $_POST['corac'];
			}

			if($_POST['corac'] === "Es Colac"){
				$colac = 0;
			}else{
				$colac = $_POST['colac'];
			}
			if($_POST['suplente'] === "Es Suplente"){
				$suplente = 0;
				//echo("<script>alert('HOLA'+".$_POST['cedula'].");</script>");
				$miembros = new Miembros($_POST['cedulaVieja'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 0);
				$miembros->deleteMiembro();
				$miembros = new Miembros($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 0);
				$miembros->addSuplente();
			}else{
				$suplente = $_POST['suplente'];
				$miembros = new Miembros($_POST['cedulaVieja'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 1);
				$miembros->deleteMiembro();
				$miembros = new Miembros($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo'], $_POST['institucion'], $corac, $colac, $suplente, 0, 1);
				$miembros->addMiembro();
				if($_POST['cedulaSupVieja'] != $_POST['suplente']){
					$miembros->updateSuplente($_POST['cedulaSupVieja']);
				}
			}
		}else{
			return false;
		}
	}

	function deleteMiembro($id_miembro, $id_suplente){
		require_once("../classes/miembros.php");
        $miembros= Miembros::class;
		if(isset($id_miembro)){
			$miembros = new Miembros($id_miembro, "", "", "", "", 0, 0, 0, $id_suplente, 0, 0);
			$miembros->deleteMiembro();
		}else{
			return false;
		}
	}

	function selectOptionRequire($selected){
		$option = isset($_POST["".$selected]) ? $_POST["".$selected] : false;
		if ($option) {
			//echo htmlentities($_POST["".$selected], ENT_QUOTES, "UTF-8");
			return $option;
		} else {
			echo "task option is required";
			exit; 
		}
	}
?>