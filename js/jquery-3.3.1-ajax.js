$(document).ready(function(event) {
    if(document.getElementById('frmInstitucion')){
        getInstitutions(1);
        setPaginationButtonEventsInstituciones();
    }else if(document.getElementById('frmSectores')){
        getSectors(1);
        setPaginationButtonEventsSectores();
    }else if(document.getElementById('frmMiembros')){

    }else if(document.getElementById('frmSuplentes')){

    }else if(document.getElementById('frmCONAC')){

    }else if(document.getElementById('frmCOLAC')){

    }else if(document.getElementById('frmCORAC')){

    }else{

    }
    $.validate({
        lang: 'es',
        borderColorOnError : '#ff0000',
        onError : function($form) {
            alert('El campo no puede quedar en blanco!');
            return false; // Will stop the submission of the form
        },
        onSuccess : function($form) {
            alert('Sector ha sido agregado');
        }
    });
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

function addRowHandlers() {
    /*var table = document.getElementById("table_sectores");
    var rows = table.getElementsByTagName("tr");
    for (i = 1; i < rows.length; i++) {
        var row = table.rows[i];
        row.onclick = function(myrow){
            return function() { 
                var cell = myrow.getElementsByTagName("td")[1];
                var nombre_sector = cell.innerHTML;
                document.getElementById("nombre_sector").value = nombre_sector;
            };
        }(row);
    }*/
}

function getInstitutions(page){
    $.ajax({
        url:"../manager/gestorBusqueda.php",
        data: {function2Call: 'getInstitutions', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            //var obj = $.parseJSON(output);
            //alert(output);
            $("#div-institucion-list").html(output);
            //alert("Entro");
        }
    });
}

function getSectors(page){
    $.ajax({
        url:"../manager/gestorBusqueda.php",
        data: {function2Call: 'getSectors', page:page},
        type: "post",
        //dataType: 'json', 
        success: function (output) 
        {
            $("#div-sector-list").html(output);
            //addRowHandlers();
            //alert(""+$('.table tr').length);
        }
    });
}

function submitButtonAdd(page){
    switch(page) {
        case "user":
            alert("User");
            break;
        case "institution":
            alert("Institution");
            break;
        case "sector":
            var name_sector=document.getElementById('nombre_sector').value;
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
                    $('.html').html(html);
                    getSectors(1);
                }
            });
            break;
        default:
            alert("Page does not exist");
    }
}