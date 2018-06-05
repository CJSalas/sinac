$(document).ready(function(event) {
    if(document.getElementById('frmInstitucion')){
        getInstitutions(1);
        getInstitutionsSectors();
        setPaginationButtonEventsInstituciones();
        disableValues();
    }else if(document.getElementById('frmSectores')){
        getSectors(1);
        setPaginationButtonEventsSectores();
        disableValues();
    }else if(document.getElementById('frmMiembro')){
        getMiembrosInstituciones();
        getCoracColacMiembros();
        getMiembrosColac();
        getSuplentesMiembros();
        getMiembros(1);
        setPaginationButtonEventsMiembros();
        disableValues();
        clearMemberAssoci();
    }else if(document.getElementById('actores')){
        getActores();
    }else if(document.getElementById('listaactores')){
        getlistaActores(1);
        setPaginationButtonEventsListaActores();
    }else if(document.getElementById('frmCOLAC')){
        getColac(1);
        getCoracColac();
        setPaginationButtonEventsColacs();
        disableValues();
    }else if(document.getElementById('frmCORAC')){
        getConacCorac();
        getCorac(1);
        setPaginationButtonEventsCoracs();
        disableValues();
    }else if(document.getElementById('frmRegistro')){
        $("#menu").hide();
    }
    $.validate({
        lang: 'es',
        borderColorOnError : '#ff0000',
        onError : function($form) {
            alert('El campo no puede quedar en blanco!');
            return false; 
        },
        /*onSuccess : function($form) {
           //alert('Actor ha sido agregado');
        }*/
    });

    keyDownsEvents();
});

function keyDownsEvents(){
    $("#txtCedulaMiembro, #txtPresupuestoInstitucion").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#txtNombreMiembro, #txtApellidoMiembro, #txtTelefonoMiembro, #txtCorreoElectronico, #txtNombreInstitucion, #txtNombreSector, #txtNombreCorac, #txtNombreColac").on("keydown", function(event){
        // Allow controls such as backspace, tab etc.
        var arr = [8,9,16,17,20,35,36,37,38,39,40,45,46];
      
        // Allow letters
        for(var i = 65; i <= 90; i++){
          arr.push(i);
        }
      
        // Prevent default if not in array
        if(jQuery.inArray(event.which, arr) === -1){
          event.preventDefault();
        }
    });
}

function disableValues(){
    $("button.modificar").attr("disabled",true);
}

function enableValues(){
    $("button.modificar").attr("disabled",false);
}

function clearMemberAssoci(){
    if($('#radio8') && $('#radio1') && $('#radio3')){
        $('#radio8')[0].checked = true;
        $('#radio1')[0].checked = true;
        $('#radio3')[0].checked = true;
    }
    if($('.input5-select') && $('.input4-select') && $('.input3-select')){
        $('.input5-select').slideUp(300);
        $('.input4-select').slideUp(300);
        $('.input3-select').slideUp(300);
    }
}

$("#clean").click(function() {
    $("button.modificar").attr("disabled",true);
    if(document.getElementById("frmMiembro")){
        document.getElementById("frmMiembro").reset();
    }
    if(document.getElementById("frmInstitucion")){
        document.getElementById("frmInstitucion").reset();
        document.getElementById("txtFuncionInstitucion").value = "";
        document.getElementById("txtObjetivoInstitucion").value = "";
    }
    if(document.getElementById('frmSectores')){
        document.getElementById("frmSectores").reset();
    }
    if(document.getElementById('frmCORAC')){
        document.getElementById("frmCORAC").reset();
    }
    if(document.getElementById('frmCOLAC')){
        document.getElementById("frmCOLAC").reset();
    }
});

function setPaginationButtonEventsSectores(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getSectors(page);
    });
}

function setPaginationButtonEventsInstituciones(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getInstitutions(page);
    });
}

function setPaginationButtonEventsCoracs(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getCorac(page);
    });
}

function setPaginationButtonEventsColacs(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getColac(page);
    });
}

function setPaginationButtonEventsMiembros(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getMiembros(page);
    });
}

function setPaginationButtonEventsListaActores(){
    $(document).on('click', '.pagination_link', function(){
        var page = $(this).attr("id");
        getlistaActores(page);
    });
}

function addRowHandlers(table_name) {
    event.stopPropagation();
    var table = document.getElementById(""+table_name);
    var rows = table.getElementsByTagName("tr");
    for (i = 1; i < rows.length; i++) {
        var row = table.rows[i];
        row.onclick = function(myrow){
            return function() { 
                var cell = myrow.getElementsByTagName("td")[1];
                switch(table_name) {
                    case "table_sectores":
                        document.getElementById("txtNombreSector").value = cell.innerHTML;
                        $('#txtNombreSector').attr('name', myrow.getElementsByTagName("td")[1].id);
                        enableValues();
                        break;
                    case "table_instituciones":
                        var id = ""+myrow.getElementsByTagName("td")[1].id;
                        document.getElementById("txtNombreInstitucion").value = cell.innerHTML;
                        document.getElementById("txtPresupuestoInstitucion").value = $('#presupuesto_anno' + id).val();
                        $("textarea#txtFuncionInstitucion").text($('#funcion_institucion' + id).val());
                        $("textarea#txtObjetivoInstitucion").text($('#objetivo_redd' + id).val());
                        var idSectores = $('#id_sector' + id).val();
                        $("#select_instituciones").find('option').each(function( i, opt ) {
                            if( opt.value === idSectores ){
                                $(opt).attr('selected', 'selected');
                                $(this).val(opt.value).change();
                            } 
                        });
                        $('#txtNombreInstitucion').attr('name', myrow.getElementsByTagName("td")[1].id);
                        enableValues();
                        break;
                    case "table_coracs":
                        document.getElementById("txtNombreCorac").value = cell.innerHTML;
                        $('#txtNombreCorac').attr('name', myrow.getElementsByTagName("td")[1].id);
                        enableValues();
                        break;
                    case "table_colacs":
                        document.getElementById("txtNombreColac").value = cell.innerHTML;
                        $('#txtNombreColac').attr('name', myrow.getElementsByTagName("td")[1].id);
                        $('#hiddenIdColac').attr('name', myrow.getElementsByTagName("td")[2].id);
                        var idCoracs = $('#hiddenIdColac').attr("name");
                        $("#select_coracs").find('option').each(function( i, opt ) {
                            if( opt.value === idCoracs ){
                                $(opt).attr('selected', 'selected');
                                $(this).val(opt.value).change();
                            } 
                        });
                        enableValues();
                        break;
                    case "table_miembros":
                        var id = ""+myrow.getElementsByTagName("td")[1].id;
                        $('#txtCedulaMiembro').attr('name', $('#idCedula' + id).val());
                        document.getElementById("txtCedulaMiembro").value = $('#idCedula' + id).val();
                        document.getElementById("txtNombreMiembro").value = $('#idNombre' + id).val();
                        document.getElementById("txtApellidoMiembro").value = $('#idApellido' + id).val();
                        document.getElementById("txtTelefonoMiembro").value = $('#idTelefono' + id).val();
                        document.getElementById("txtCorreoElectronico").value = $('#idCorreo' + id).val();
                        $('#select_miembros').attr('name', $('#idSuplente' + id).val());
                        $("#select_instituciones").find('option').each(function( i, opt ) {
                            if(opt.value === $('#idInstitucion' + id).val()){
                                $(opt).attr('selected', 'selected');
                                $(this).val(opt.value).change();
                            } 
                        });

                        /*$('.input5-select').slideUp(300);*/
                        $('#radio7')[0].checked = true;
                        //$('#radio5')[0].checked = true;
                        $('.input5-select').slideDown(300);
                        $("#select_miembros").find('option').each(function( i, opt ) {
                            if(opt.value === $('#idSuplente' + id).val()){
                                $(opt).attr('selected', 'selected');
                                $(this).val(opt.value).change();
                            } 
                        });
                        if($('#idOrgAct' + id).val() === "Corac"){
                            $('#radio2')[0].checked = true;
                            $('#radio3')[0].checked = true;
                            $('.input3-select').slideDown(300);
                            $('.input4-select').slideUp(300);
                            $("#select_coracM").find('option').each(function( i, opt ) {
                                if(opt.value === $('#idOrg' + id).val()){
                                    $(opt).attr('selected', 'selected');
                                    $(this).val(opt.value).change();
                                } 
                            });
                        }else if($('#idOrgAct' + id).val() === "Colac"){
                            $('#radio1')[0].checked = true;
                            $('#radio4')[0].checked = true;
                            $('.input3-select').slideUp(300);
                            $('.input4-select').slideDown(300);
                            $("#select_colacM").find('option').each(function( i, opt ) {
                                if(opt.value === $('#idOrg' + id).val()){
                                    $(opt).attr('selected', 'selected');
                                    $(this).val(opt.value).change();
                                } 
                            });
                        }
                        enableValues();
                        break;
                    default:
                    alert("Page does not exist");
                    break;
                }
            };
        }(row);
    }
}

function submitButtonAdd(page){
    switch(page) {
        case "institucion":
            var name_institucion=decodeURI(document.getElementById('txtNombreInstitucion').value);
            var presupuesto_institucion=document.getElementById('txtPresupuestoInstitucion').value;
            var id_sectorinstitucion= $('#select_instituciones').val();
            var funcion_institucion=decodeURI($('textarea#txtFuncionInstitucion').val());
            var objetivo_institucion=decodeURI($('textarea#txtObjetivoInstitucion').val());
            $.ajax({
                url:"../manager/gestorRegistro.php",
                type:"post",
                data: 
                {  
                    name_institucion : name_institucion,
                    presupuesto_institucion : presupuesto_institucion,
                    id_sectorinstitucion : id_sectorinstitucion,
                    funcion_institucion : funcion_institucion,
                    objetivo_institucion : objetivo_institucion,
                    function2Call: 'addInstitutions'
                },
                cache:false,
                success: function (html) 
                {
                    $('.html').html(html);
                }
            });
            break;
        case "sector":
            var name_sector=decodeURI(document.getElementById('txtNombreSector').value);
            $.ajax({
                url:"../manager/gestorRegistro.php",
                type:"post",
                data: 
                {  
                    name_sector : name_sector,
                    function2Call: 'addSectors'
                },
                cache:false,
                success: function (html) 
                {
                    /*$('.html').html(html);
                    getSectors(1);*/
                }
            });
            break;
        case "corac":
            var name_corac=decodeURI(document.getElementById('txtNombreCorac').value);
            var id_conac= $('#select_conacs').val();
            
            $.ajax({
                url:"../manager/gestorRegistro.php",
                type:"post",
                data: 
                {  
                    name_corac : name_corac,
                    id_conac : id_conac,
                    function2Call: 'addCoracs'
                },
                cache:false,
                success: function (html) 
                {
                    /*$('.html').html(html);
                    getSectors(1);*/
                }
            });
            break;
        case "colac":
            var name_colac=decodeURI(document.getElementById('txtNombreColac').value);
            var id_conac= $('#select_conacs').val();
            var id_corac= $('#select_coracs').val();
            $.ajax({
                url:"../manager/gestorRegistro.php",
                type:"post",
                data: 
                {  
                    name_colac : name_colac,
                    id_conac : id_conac,
                    id_corac : id_corac,
                    function2Call: 'addColac'
                },
                cache:false,
                success: function (html) 
                {
                   //$('.html').html(html);
                    //getSectors(1);
                }
            });
            break;
        case "miembro":
            var cedula = document.getElementById('txtCedulaMiembro').value  ;
            var nombre = decodeURI(document.getElementById('txtNombreMiembro').value);
            var apellido = decodeURI(document.getElementById('txtApellidoMiembro').value);
            var telefono = decodeURI(document.getElementById('txtTelefonoMiembro').value);
            var correo = decodeURI(document.getElementById('txtCorreoElectronico').value);
            var institucion= $('#select_instituciones').val();
            if($('#radio8')[0].checked === true){
                var suplente = "Es Suplente";
            }
            if($('#radio7')[0].checked === true){    
                var suplente = $('#select_miembros').val();
            }
           if($('#radio1')[0].checked === true){
                var corac = "Es Corac";
            }
            if($('#radio2')[0].checked === true){    
                var corac = $('#select_coracM').val();
            }
            if($('#radio3')[0].checked === true){    
                var colac = "Es Colac";
            }
            if($('#radio4')[0].checked === true){    
                var colac = $('#select_colacM').val();
            }

            $.ajax({
                url:"../manager/gestorRegistro.php",
                type:"post",
                data: 
                {  
                    cedula : cedula,
                    nombre : nombre,
                    apellido : apellido,
                    telefono : telefono,
                    correo : correo,
                    institucion : institucion,
                    suplente : suplente,
                    corac : corac,
                    colac : colac,
                    function2Call: 'addMiembro'
                },
                cache:false,
                success: function (html) 
                {
                   //$('.html').html(html);
                    //getSectors(1);
                }
            });
            //alert("Alert " + cedula + " | " + nombre + " | " + apellido + " | " + telefono + " | " + correo + " | " + id_instituciones + " | " + suplente + " | " + corac + " | " + colac);
            //alert("Alert " + suplente + " | " + corac + " | " + colac + " | ");// + telefono + " | ");
            break;
        default:
            alert("Page does not exist");
            break;
    }
}