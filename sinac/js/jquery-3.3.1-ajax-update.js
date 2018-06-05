function onUpdateMiembros(){
    var cedulaVieja = document.getElementById("txtCedulaMiembro").name;
    var cedulaSupVieja = document.getElementById("select_miembros").name;
    var cedula = document.getElementById('txtCedulaMiembro').value  ;
    var nombre = decodeURI(document.getElementById('txtNombreMiembro').value);
    var apellido = decodeURI(document.getElementById('txtApellidoMiembro').value);
    var telefono = decodeURI(document.getElementById('txtTelefonoMiembro').value);
    var correo = decodeURI(document.getElementById('txtCorreoElectronico').value);
    var institucion= $('#select_instituciones').val();
    var suplenteActual= $('#select_miembros').attr("name");
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
    
    if(cedula != null){
        $.ajax({
            url:"../manager/gestorRegistro.php",
            type:"post",
            data: 
            { 
                cedulaVieja: cedulaVieja,
                cedulaSupVieja:cedulaSupVieja, 
                cedula : cedula,
                nombre : nombre,
                apellido:  apellido,
                telefono:  telefono,
                correo: correo,
                institucion: institucion,
                suplente: suplente,
                corac: corac,
                colac: colac,
                function2Call: 'updateMiembro'
            },
            cache:false,
            success: function (html) 
            {
                $('.html').html(html);
                getMiembros(1);
            }
        });
    }else{
        alert("Escoja un sector a modificar");
    }
}

function onUpdateColacs(id_colac, name_colachtm, id_corac, id_conac){
    name_colac = decodeURI(name_colachtm);
    if(name_colac != null){
        $.ajax({
            url:"../manager/gestorRegistro.php",
            type:"post",
            data: 
            {  
                id_colac : id_colac,
                name_colac : name_colac,
                id_corac:  id_corac,
                id_conac:  id_conac,
                function2Call: 'updateColac'
            },
            cache:false,
            success: function (html) 
            {
                $('.html').html(html);
                getColac(1);
            }
        });
    }else{
        alert("Escoja un sector a modificar");
    }
}

function onUpdateCoracs(id_corac, nombre_corachtm, id_conac){
    nombre_corac = decodeURI(nombre_corachtm);
    if(nombre_corac != null){
        $.ajax({
            url:"../manager/gestorRegistro.php",
            type:"post",
            data: 
            {  
                id_corac : id_corac,
                nombre_corac : nombre_corac,
                id_conac:  id_conac,
                function2Call: 'updateCoracs'
            },
            cache:false,
            success: function (html) 
            {
                $('.html').html(html);
                getCorac(1);
            }
        });
    }else{
        alert("Escoja un sector a modificar");
    }
}


function onUpdateSectors(id_sector, nombre_sectorhtm){
    nombre_sector = decodeURI(nombre_sectorhtm);
    if(nombre_sector != null){
        $.ajax({
            url:"../manager/gestorRegistro.php",
            type:"post",
            data: 
            {  
                id_sector : id_sector,
                nombre_sector : nombre_sector,
                function2Call: 'updateSectors'
            },
            cache:false,
            success: function (html) 
            {
                $('.html').html(html);
                getSectors(1);
            }
        });
    }else{
        alert("Escoja un sector a modificar");
    }
}

function onUpdateInstituciones(id_institucion, nombre_institucionhtm, presupuesto_institucionhtm, id_sectorInstitucion, funcion_institucionhtm, objetivos_institucionhtm){
    nombre_institucion = decodeURI(nombre_institucionhtm);
    presupuesto_institucion = decodeURI(presupuesto_institucionhtm);
    funcion_institucion = decodeURI(funcion_institucionhtm);
    objetivos_institucion = decodeURI(objetivos_institucionhtm);
    if(nombre_institucion != null || presupuesto_institucion != null || funcion_institucion != null || objetivos_institucion != null){
        $.ajax({
            url:"../manager/gestorRegistro.php",
            type:"post",
            data: 
            { 
                id_institucion : id_institucion,
                nombre_institucion : nombre_institucion,
                presupuesto_institucion : presupuesto_institucion,
                id_sectorInstitucion : id_sectorInstitucion,
                funcion_institucion : funcion_institucion,
                objetivos_institucion : objetivos_institucion,
                function2Call: 'updateInstituciones'
            },
            cache:false,
            success: function (html) 
            {
                $('.html').html(html);
                getInstituciones(1);
            }
        });
    }else{
        alert("Escoja un sector a modificar");
    }
}