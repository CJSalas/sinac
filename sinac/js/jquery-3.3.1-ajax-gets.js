function getInstitutions(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getInstitutions', page:page},
        type: "post",
        success: function (output) 
        {
            $("#div-institucion-list").html(output);
            addRowHandlers("table_instituciones");
        }
    });
}

function getInstitutionsSectors(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getInstitutionsSectors'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_instituciones").html(output);
            //alert("Entro");
        }
    });
}

function getSectors(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getSectors', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            $("#div-sector-list").html(output);
            addRowHandlers("table_sectores");
        }
    });
}

function getCorac(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getCorac', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#div-corac-list").html(output);
            addRowHandlers("table_coracs");
        }
    });
}

function getConacCorac(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getConacCorac'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_conacs").html(output);
            //alert("Entro");
        }
    });
}

function getColac(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getColac', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#div-colac-list").html(output);
            addRowHandlers("table_colacs");
        }
    });
}

function getCoracColac(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getCoracColac'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_coracs").html(output);
            //alert("Entro");
        }
    });
}

function getCoracColacMiembros(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getCoracColac'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_coracM").html(output);
            //alert("Entro");
        }
    });
}

function getActores(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getChartInformation'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#div-sector-list").html(output);
            //alert("Entro");
        }
    });
}

function getlistaActores(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getListaInformation', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#div-miembro-list").html(output);
            //alert("Entro");
        }
    });
}

function getMiembros(page){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getMiembros', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#div-miembros-list").html(output);
            addRowHandlers("table_miembros");
        }
    });
}

function getMiembrosInstituciones(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getMiembrosInstituciones'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_instituciones").html(output);
            //alert("Entro");
        }
    });
}

function getMiembrosColac(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getMiembrosColac'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_colacM").html(output);
            //alert("Entro");
        }
    });
}

function getMiembrosMiembros(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getMiembrosMiembros'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_miembros").html(output);
            //alert("Entro");
        }
    });
}

function getSuplentesMiembros(){
    $.ajax({
        url:"/manager/gestorBusqueda.php",
        data: {function2Call: 'getSuplentesMiembros'},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            $("#select_miembros").html(output);
            //alert("Entro");
        }
    });
}