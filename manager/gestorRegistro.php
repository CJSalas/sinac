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
            case 'other': 
		}
	}
	if(isset($_POST['submitUpdate'])){
		//updateUser();	
	}
	if(isset($_POST['submitDelete'])){
		//deleteUser();
	}	

	function addInstitution(){
		
	}
	//Casos de uso de los sectores 
	function addSector(){
		require_once("../classes/sectores.php");
		$sectores = Sectores::class;
		if(isset($_POST['name_sector']) && $_POST['name_sector'] != ""){
			$sectores = new Sectores(0, $_POST['name_sector']);
			$sectores->addSector();
		}else{
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
		$deleted_success = isset($id_sectors) ? $id_sectors : false;
		$sectores = Sectores::class;
		if(isset($id_sectors)){
			$sectores = new Sectores($id_sectors, "");
			$sectores->deleteSector();
		}else{
			return false;
		}
	}

	function addUser(){
		require_once("../classes/miembros.php");
		$miembro = Miembros::class;
		$optionSuplente = selectOptionRequire("cedulaSup");
		$optionInstitucion = selectOptionRequire("institution");
		$optionActivo = selectOptionRequire("activo");
		$miembro = new Miembros($_POST["cedula"], $optionSuplente, $optionInstitucion, $_POST["name"], $_POST["lastname"], $_POST["bday"], $_POST["email"], $_POST["singinday"], $_POST["address"], $optionActivo);
		$miembro->addUser();
	}

	function updateUser(){
		echo ("Update");
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