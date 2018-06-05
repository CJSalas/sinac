<?php

    $page = "";

    header("Content-Type: text/html;charset=utf-8");

    if(isset($_POST['function2Call']) && !empty($_POST['function2Call'])){
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        }else{
            $page = 1;
        }
        $searchItem =  $_POST['function2Call'];
        switch($searchItem){
            case 'getInstitutions': 
            getInstitutions($page);
            break;
            case 'getSectors': 
            getSectors($page);
            break;
            case 'other': 
        }
    }

    function getInstitutions($page){
        require_once("../classes/instituciones.php");
        $instituciones= Instituciones::class;
        $instituciones = new Instituciones(0, 0, "", 0, "", "");
        $record_per_page = 10;
        $total_number_records = $instituciones->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $instituciones->searchInstitutions($page, $record_per_page);
        $page = "instituciones";
        $html = "";
        $html = "<table id='table_sectores' class='table table-hover'>
			<thead>
			    <tr>
				    <th colspan='3'>Instituciones</th>
				</tr>
			</thead>
			<tbody>";
        /*foreach ($array as $data){
            $html = $html."<tr>
                <td><input type='text' value='".$data["nombre_institucion"]."' data-validation='required' data-validation-error-msg='Campo requerido' class='form-control border-white' id=".$data["idInstitucion"]." name='nombre_institucion' maxlength='40' size='40' placeholder='Nombre de la Institucion'></td>
                <td>
                    <button type='submit' class='btn btn-primary' id='id_btn_modificar' onclick='onUpdateSectors(".$data["idInstitucion"].", document.getElementById(".$data["idInstitucion"].").value)'>Detalle</button>
                </td>
                <td>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteSectors(".$data["idInstitucion"].")'>Eliminar</button>
                </td>
            </tr>";
        }*/
        foreach ($array as $data){
            $html = $html."<tr>
                <td><input type='text' value='".$data["nombre_institucion"]."' data-validation='required' data-validation-error-msg='Campo requerido' class='form-control border-white' id=".$data["idInstitucion"]." name='nombre_institucion' maxlength='40' size='40' placeholder='Nombre de la Institucion'></td>
                <td>
                    <button type='submit' class='btn btn-primary' id='id_btn_modificar' data-toggle='modal' data-target='#myModal'>Detalle</button>
                </td>
                <td>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteSectors(".$data["idInstitucion"].")'>Eliminar</button>
                </td>
            </tr>";
        }
       
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            $html = $html."<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getSectors($page){
        require_once("../classes/sectores.php");
        $sectores= Setores::class;
        $sectores = new Sectores(0, "");
        $record_per_page = 5;
        $total_number_records = $sectores->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $sectores->searchSectors($page, $record_per_page);
        $page = "sector";
        $html = "";
        $html = "<table id='table_sectores' class='table table-hover'>
			<thead>
			    <tr>
				    <th colspan='5'>Sectores</th>
				</tr>
			</thead>
			<tbody>";
        foreach ($array as $data){
            $html = $html."<tr>
                <td></td>
                <td>
                    <input type='text' value='".$data["nombre_sector"]."' data-validation='required' data-validation-error-msg='Campo requerido' class='form-control border-white' id=".$data["idSector"]." name='nombre_sector' maxlength='40' size='40' placeholder='Nombre del Sector'>
                </td>
                <td></td>
                <td>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteSectors(".$data["idSector"].")'>Eliminar</button>
                </td>
                <td>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onUpdateSectors(".$data["idSector"].", document.getElementById('".$data["idSector"]."').value)'>Modificar</button>
                </td>
            </tr>";
        }
       
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            $html = $html."<span class='pagination_link btn' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getBackUp(){
        require_once("../classes/miembros.php");
    }

?>