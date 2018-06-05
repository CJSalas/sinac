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
            case 'getInstitutionsSectors':
            getInstitutionsSectors();
            break;
            case 'getSectors': 
            getSectors($page);
            break;
            case 'getConacCorac':
            getConacCorac();
            break;
            case 'getCorac':
            getCorac($page);
            break;
            case 'getCoracColac':
            getCoracColac();
            break;
            case 'getColac':
            getColac($page);
            break;
            case 'getMiembrosInstituciones':
            getMiembrosInstituciones();
            break;
            case 'getMiembrosColac':
            getMiembrosColac();
            break;
            case 'getMiembrosMiembros':
            getMiembrosMiembros();
            break;
            case 'getMiembros':
            getMiembros($page);
            break;
            case 'getSuplentesMiembros':
            getSuplentesMiembros();
            break;
            case 'getChartInformation':
            getChartInformation();
            break;
            case 'getListaInformation':
            getListaInformation($page);
            case 'other':
            break; 
        }
    }

    function getChartInformation(){
        echo("<script>console.log('PHP: getChartInformation() ');</script>");
        require_once("../classes/instituciones.php");
        require_once("../classes/sectores.php");
        require_once("../classes/miembros.php");
        $sectores= Setores::class;
        $sectores = new Sectores(0, "");
        $page = ""; 
        $record_per_page = "";
        $html = "<table id='table_pie' class='table'>
			<thead>
			    <tr>
				    <th colspan='2'>Estadisticas</th>
				</tr>
			</thead>
            <tbody>
            <tr>
                <td>
                    <div id='piechart' class='input1-select' style='display: block;'></div>
                    <div id='bubblechart' class='input2-select' style='display: none;'></div>                    
                </td>
            </tr>
            </tbody>
        </table>";
        //$html = $html."<div id='piechart' style='width: 900px; height: 500px;'></div>";
        $i = 1;
        $array = $sectores->searchSectors($page, $record_per_page);

        $instituciones= Instituciones::class;
        $instituciones = new Instituciones(0,0, 0, "", 0, "", "");
        
        $miembros= Miembros::class;
        $miembros = new Miembros(0, "", "", "", "", 0, 0, 0, 0, 0, 0);

        foreach ($array as $data){
            $numberInst = $instituciones->searchNumberInstPerSector($data["idSector"]);
            $numberMiem = $miembros->searchNumberMembersPerSector($data["idSector"]);
            $numberSupl = $miembros->searchNumberSuplentesPerSector($data["idSector"]);
            $totalNumberPeople = $numberMiem[0]["NumberOfMiembros"] + $numberSupl[0]["NumberOfSuplentes"];
            $html = $html."<input id='idSectorMiembro".$i."' type='hidden' name='idSectorInst' value='".$totalNumberPeople."'>";
            //echo("<script>console.log('PHP: getPieChartInformation() ".$numberInst[0]["NumberOfInstitutions"]." ');</script>");
            $html = $html."<input id='idSectorInst".$i."' type='hidden' name='idSectorInst' value='".$numberInst[0]["NumberOfInstitutions"]."'>";     
            $i = $i + 1;
        }

        $html += "<script type='text/javascript'>                            
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {";
        
        $i = 1;
        foreach ($array as $data){
            $html += "var number".$i." = parseInt(document.getElementById('idSectorInst".$i."').value)";
            $i = $i + 1;
        }
        
        $html += "

                    var data = google.visualization.arrayToDataTable([
                    ['Sector', 'Instituciones'],
                    ['Instituciones públicas presentes en el área',     number1],
                    ['Municipalidades',      number2],
                    ['Organizaciones no gubernamentales y comunales del estado',  number3]
                    ]);

                    var options1 = {
                    title: '',
                    is3D: true,
                    colors: ['#0000cc', '#00e600', '#ff8c1a'],
                    'width':700,
                    'height':400 
                    };
                    
                    //if(getElementById('piechart')){
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options1);
                    //}";
                
                    $i = 1;
                    foreach ($array as $data){
                        $html += "var total".$i." = parseInt(document.getElementById('idSectorMiembro".$i."').value)";
                        $i = $i + 1;
                    }

                    $html += "var data2 = google.visualization.arrayToDataTable([
                    ['ID',   'Actores','Instituciones', 'Sector'],
                    ['IPPA',    total1, number1,        'Instituciones pública presentes en el área'],
                    ['MUNI',    total2, number2,        'Municipalidades'],
                    ['ONGs',    total3, number3,        'Organizaciones no gubernamentales y comunales del estado'],
                    ]);

                    var options2 = {
                    title: '',
                    colors: ['#0000cc', '#00e600', '#ff8c1a'],
                    'width':700,
                    'height':400,
                    hAxis: {title: 'Actores'},
                    vAxis: {title: 'Instituciónes'},
                    bubble: {textStyle: {fontSize: 11}} 
                    };
                    
                    //if(getElementById('bubblechart')){
                    var chart = new google.visualization.BubbleChart(document.getElementById('bubblechart'));
                    chart.draw(data2, options2);
                    //}

                }
            </script>
        
        ";


        echo utf8_encode($html);
    }

    function getListaInformation($page){
        require_once("../classes/miembros.php");
        $miembros= Miembros::class;
        $miembros = new Miembros(0, "", "", "", "", 0, 0, 0, 0, 0, 0);
        $record_per_page = 10;
        $total_number_records = $miembros->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $miembros->searchMiembros($page, $record_per_page);
        $page = "miembros";
        $html = "";
        $html = "<table id='table_miembros' class='table tableList'>
			<thead>
			    <tr>
                    <th>Organizaci&oacute;n</th>
                    <th>Propietario</th>
                    <th>Suplente</th>
                    <th>Instituci&oacute;n</th>
                    <th>Tel&eacute;fono</th>
                    <th>Correo</th>
				</tr>
			</thead>
            <tbody>";
            $i = 1;
        foreach ($array as $data){
            if($data["idMiembro"] != null){
                $arrayMiembro = $miembros->searchInformationMiembro($data["idMiembro"]);
                $cedula = $data["idMiembro"];
                $nombre = $arrayMiembro[0]["nombre"];
                $apellido = $arrayMiembro[0]["apellido"];
                $telefono = $arrayMiembro[0]["telefono"];
                $correo = $arrayMiembro[0]["correo_electronico"];
            }
            if($data["idSuplente"] != null){
                $idSuplente = $data["idSuplente"];
                $arraySuplente = $miembros->searchInformationSuplente($data["idSuplente"]);
                $nombreSup = $arraySuplente[0]["nombre_suplente"];
                $apellidoSup = $arraySuplente[0]["apellido_suplente"];
            }else{
                $nombreSup = "No tiene";
                $apellidoSup = "suplente";
            }
            if($data["idCorac"] != null){
                $arrayCo1 = $miembros->searchInformationCorac($data["idCorac"]);
                $organizacion = $data["idCorac"];
                $inOrg = "Corac";
                $org = $arrayCo1[0]["nombre_corac"];
            }else if($data["idColac"] != null){
                $arrayCo2 = $miembros->searchInformationColac($data["idColac"]);
                $organizacion = $data["idColac"];
                $inOrg = "Colac";
                $org = $arrayCo2[0]["nombre_colac"];
            }
            if($data["idInstitucion"] != null){
                $idInstitucion = $data["idInstitucion"];
                $arrayInst = $miembros->searchInformationInstituciones($data["idInstitucion"]);
                $nombre_institucion = $arrayInst[0]["nombre_institucion"];
            }

            echo("<script>console.log('PHP: getSuplentesMiembros() ".$nombre." ');</script>");
            $html = $html."<tr>
                <td>".utf8_decode($org)."</td>
                <td id=".$i.">".utf8_decode($nombre)." ".utf8_decode($apellido)."</td>
                <td>".utf8_decode($nombreSup)." ".utf8_decode($apellidoSup)."</td>
                <td>".utf8_decode($nombre_institucion)."</td>
                <td>".utf8_decode($telefono)."</td>
                <td>".utf8_decode($correo)."</td>
            </tr>";
            $i = $i + 1; 
        }
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($total_pages > 1){
                $html = $html."<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
            }
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getColac($page){
        require_once("../classes/colac.php");
        echo("<script>console.log('PHP: getColac() ');</script>");
        $colac= Colac::class;
        $colac = new Colac(0, "", 0, 0);
        $record_per_page = 5;
        $total_number_records = $colac->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $colac->searchColacs($page, $record_per_page);
        $page = "colac";
        $html = "";
        $html = "<table id='table_colacs' class='table table-hover'>
			<thead>
			    <tr>
				    <th colspan='5'>COLACS</th>
				</tr>
			</thead>
			<tbody>";
        foreach ($array as $data){
            $html = $html."<tr>
                <td></td>
                <td id=".$data["idCOLAC"].">".utf8_decode($data["nombre_colac"])."</td>
                <td id=".$data["CORAC_idCORAC"].">".utf8_decode($data["nombre_corac"])."</td>
                <td>
                    
                </td>
                <td align='right'>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteColacs(".$data["idCOLAC"].")'>Eliminar</button>
                </td>
            </tr>";
        }
       
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($total_pages > 1){
                $html = $html."<span class='pagination_link btn' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
            }
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getCorac($page){
        require_once("../classes/corac.php");
        $corac= Corac::class;
        $corac = new Corac(0, "", 0);
        $record_per_page = 5;
        $total_number_records = $corac->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $corac->searchCoracs($page, $record_per_page);
        $page = "corac";
        $html = "";
        $html = "<table id='table_coracs' class='table table-hover'>
			<thead>
			    <tr>
				    <th colspan='5'>CORACS</th>
				</tr>
			</thead>
			<tbody>";
        foreach ($array as $data){
            $html = $html."<tr>
                <td></td>
                <td id=".$data["idCORAC"].">".utf8_decode($data["nombre_corac"])."</td>
                <td></td>
                <td>
                    
                </td>
                <td align='right'>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteCoracs(".$data["idCORAC"].")'>Eliminar</button>
                </td>
            </tr>";
        }
       
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($total_pages > 1){
                $html = $html."<span class='pagination_link btn' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
            }
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getCoracColac(){
        require_once("../classes/corac.php");
        $corac= Corac::class;
        $corac = new Corac(0, "", 0);
        $page = "";
        $record_per_page = "";
        $array = $corac->searchCoracs($page, $record_per_page);
        $max = sizeof($array);
        foreach ($array as $data){
            $html = $html."<option value=".$data["idCORAC"].">".utf8_decode($data["nombre_corac"])."</option>";
        }
        echo utf8_encode($html);
    }


    function getInstitutions($page){
        require_once("../classes/instituciones.php");
        $instituciones= Instituciones::class;
        $instituciones = new Instituciones(0,0, 0, "", 0, "", "");
        $record_per_page = 10;
        $total_number_records = $instituciones->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $instituciones->searchInstitutions($page, $record_per_page);
        $page = "instituciones";
        $i = 1;
        $html = "";
        $html = "<table id='table_instituciones' class='table table-hover'>
			<thead>
			    <tr>
				    <th colspan='4'>Instituciones</th>
				</tr>
			</thead>
			<tbody>";
        foreach ($array as $data){
            $html = $html."<tr>
                <td>
                    <input id='id_sector".$i."' type='hidden' name='nameNombre' value='".utf8_decode($data["idSector"])."'>
                    <input id='presupuesto_anno".$i."' type='hidden' name='nameNombre' value='".utf8_decode($data["presupuesto_anno"])."'>
                    <input id='funcion_institucion".$i."' type='hidden' name='nameApellido' value='".utf8_decode($data["funcion_institucion"])."'>
                    <input id='objetivo_redd".$i."' type='hidden' name='idTelefono' value='".utf8_decode($data["objetivo_redd"])."'>
                </td>
                <td id=".$data["idInstitucion"].">"
                    .utf8_decode($data["nombre_institucion"])."
                </td>
                <td></td>
                <td align='right'>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteInstituciones(".$data["idInstitucion"].")'>Eliminar</button>
                </td>
            </tr>";
            $i = $i + 1;
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
                <td id=".$data["idSector"].">".utf8_decode($data["nombre_sector"])."</td>
                <td></td>
                <td>
                    
                </td>
                <td align='right'>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteSectors(".$data["idSector"].")'>Eliminar</button>
                </td>
            </tr>";
        }
       
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($total_pages > 1){
                $html = $html."<span class='pagination_link btn' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
            }
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getInstitutionsSectors(){
        require_once("../classes/sectores.php");
        $sectores= Setores::class;
        $sectores = new Sectores(0, "");
        $page = "";
        $record_per_page = "";
        $array = $sectores->searchSectors($page, $record_per_page);
        $html = "<select class='selection-2 select2-hidden-accessible' id='listSectoresInstitucion' name='service' tabindex='-1' aria-hidden='true'>";
        foreach ($array as $data){
            $html = $html."<option value=".$data["idSector"].">".utf8_decode($data["nombre_sector"])."</option>";
        }
        $html = $html."</select>";
        echo utf8_encode($html);
    }

    function getMiembrosInstituciones(){
        require_once("../classes/instituciones.php");
        $instituciones= Instituciones::class;
        $instituciones = new Instituciones(0,0, 0, "", 0, "", "");
        $page = "";
        $record_per_page = "";
        $array = $instituciones->searchInstitutions($page, $record_per_page);
        $html = "";
        foreach ($array as $data){
            $html = $html."<option value=".$data["idInstitucion"].">".utf8_decode($data["nombre_institucion"])."</option>";
        }
        echo utf8_encode($html);
    }

    function getMiembrosColac(){
        require_once("../classes/colac.php");
        $colac= Colac::class;
        $colac = new Colac(0, "", 0, 0);
        $page = "";
        $record_per_page = "";
        $array = $colac->searchColacs($page, $record_per_page);
        foreach ($array as $data){
            $html = $html."<option value=".$data["idCOLAC"].">".utf8_decode($data["nombre_colac"])."</option>";
        }
        echo utf8_encode($html);
    }

    function getMiembrosMiembros(){
        require_once("../classes/miembros.php");
        $miembros= Miembros::class;
        $miembros = new Miembros(0, "", "", "", 0, 0, 0, 0, 0);
        $page = "";
        $record_per_page = "";
        $array = $miembros->searchMiembros($page, $record_per_page);
        foreach ($array as $data){
            $html = $html."<option value=".$data["idMiembros"].">".utf8_decode($data["nombre"])." ".utf8_decode($data["apellido"])."</option>";
        }
        echo utf8_encode($html);
    }

    function getMiembros($page){
        require_once("../classes/miembros.php");
        $miembros= Miembros::class;
        $miembros = new Miembros(0, "", "", "", "", 0, 0, 0, 0, 0, 0);
        $record_per_page = 10;
        $total_number_records = $miembros->getTotalNumberRows();
        $total_pages = ceil($total_number_records/$record_per_page);
        $array = $miembros->searchMiembros($page, $record_per_page);
        $page = "miembros";
        $html = "";
        $html = "<table id='table_miembros' class='table table-hover'>
			<thead>
			    <tr>
                    <th colspan='4'>Propietario - Suplente</th>
				</tr>
			</thead>
            <tbody>";
            $i = 1;
        foreach ($array as $data){
            if($data["idMiembro"] != null){
                $arrayMiembro = $miembros->searchInformationMiembro($data["idMiembro"]);
                $cedula = $data["idMiembro"];
                $nombre = $arrayMiembro[0]["nombre"];
                $apellido = $arrayMiembro[0]["apellido"];
                $telefono = $arrayMiembro[0]["telefono"];
                $correo = $arrayMiembro[0]["correo_electronico"];
            }
            if($data["idSuplente"] != null){
                $idSuplente = $data["idSuplente"];
                $arraySuplente = $miembros->searchInformationSuplente($data["idSuplente"]);
                $nombreSup = $arraySuplente[0]["nombre_suplente"];
                $apellidoSup = $arraySuplente[0]["apellido_suplente"];
            }else{
                $nombreSup = "No tiene";
                $apellidoSup = "suplente";
            }
            if($data["idCorac"] != null){
                $arrayCo1 = $miembros->searchInformationCorac($data["idCorac"]);
                $organizacion = $data["idCorac"];
                $inOrg = "Corac";
            }else if($data["idColac"] != null){
                $arrayCo2 = $miembros->searchInformationColac($data["idColac"]);
                $organizacion = $data["idColac"];
                $inOrg = "Colac";
            }
            if($data["idInstitucion"] != null){
                $idInstitucion = $data["idInstitucion"];
            }

            echo("<script>console.log('PHP: getSuplentesMiembros() ". $nombre." ');</script>");
            $html = $html."<tr>
                <td>
                    <input id='idCedula".$i."' type='hidden' name='idCedula' value='".utf8_decode($cedula)."'>
                    <input id='idNombre".$i."' type='hidden' name='nameNombre' value='".utf8_decode($nombre)."'>
                    <input id='idApellido".$i."' type='hidden' name='nameApellido' value='".utf8_decode($apellido)."'>
                    <input id='idTelefono".$i."' type='hidden' name='idTelefono' value='".utf8_decode($telefono)."'>
                    <input id='idCorreo".$i."' type='hidden' name='idCorreo' value='".utf8_decode($correo)."'>
                    <input id='idSuplente".$i."' type='hidden' name='idSuplente' value='".utf8_decode($idSuplente)."'>
                    <input id='idOrg".$i."' type='hidden' name='idOrg' value='".utf8_decode($organizacion)."'>                    
                    <input id='idOrgAct".$i."' type='hidden' name='idOrgAct' value='".utf8_decode($inOrg)."'>
                    <input id='idInstitucion".$i."' type='hidden' name='idInstitucion' value='".utf8_decode($idInstitucion)."'>
                </td>
                
                <td id=".$i.">"
                    .utf8_decode($nombre)." ".utf8_decode($apellido)."
                </td>
                <td>".utf8_decode($nombreSup)." ".utf8_decode($apellidoSup)." | Suplente</td>
                <td align='right'>
                    <button type='submit' class='btn btn-primary' name='submitDelete' id='id_btn_eliminar' onclick='onDeleteMiembros(".$cedula.",".$idSuplente.")'>Eliminar</button>
                </td>
            </tr>";
            $i = $i + 1; 
        }
        $html = $html."</tbody>
        </table>
        
        <span class='pagination'>";

        for($i = 1; $i <= $total_pages; $i++){
            if($total_pages > 1){
                $html = $html."<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc; margin-right: 10px;' id='".$i."'>".$i."</span>"; 
            }
        }
        $html = $html."</span>";
        echo utf8_encode($html);
    }

    function getSuplentesMiembros(){
        require_once("../classes/miembros.php");
        $miembros= Miembros::class;
        $miembros = new Miembros(0, "", "", "", "", 0, 0, 0, 0, 0, 0);
        $page = "";
        $record_per_page = "";
        $array = $miembros->searchSuplentes($page, $record_per_page);
        foreach ($array as $data){
            //echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($data["activo"])." ');</script>");
            if($data["activo"] == 1){
                echo("<script>console.log('PHP: getSuplentesMiembros() ".utf8_decode($data["activo"])." ');</script>");
                $html = $html."<option disabled='disabled' value=".$data["idSuplente"].">".utf8_decode($data["nombre_suplente"])." ".utf8_decode($data["apellido_suplente"])."</option>";
            }else{
                $html = $html."<option value=".$data["idSuplente"].">".utf8_decode($data["nombre_suplente"])." ".utf8_decode($data["apellido_suplente"])."</option>";
            }
        }
        echo utf8_encode($html);
    }

    

?>