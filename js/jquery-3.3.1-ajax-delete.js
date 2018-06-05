function onDeleteMiembros(id_miembro, id_suplente){
    event.stopPropagation();
    alert(""+id_miembro);
    $.ajax({
        url:"../manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
            id_miembro : id_miembro,
            id_suplente : id_suplente,
            function2Call: 'deleteMiembro'
        },
        cache:false,
        success: function (html) 
        {
            $('.html').html(html);
            getMiembros(1);
        }
    });
    
}

function onDeleteSectors(id_sector){
    event.stopPropagation();
    $.ajax({
        url:"../manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
            id_sector : id_sector,
            function2Call: 'deleteSectors'
        },
        cache:false,
        success: function (html) 
        {
            $('.html').html(html);
            getSectors(1);
        }
    });
    
}

function onDeleteInstituciones(id_instituciones){
    event.stopPropagation();
    $.ajax({
        url:"../manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
            id_instituciones : id_instituciones,
            function2Call: 'deleteInstituciones'
        },
        cache:false,
        success: function (html) 
        {
            $('.html').html(html);
            getInstitutions(1);
        }
    });
    
}

function onDeleteCoracs(id_coracs){
    event.stopPropagation();
    $.ajax({
        url:"../manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
            id_coracs : id_coracs,
            function2Call: 'deleteCoracs'
        },
        cache:false,
        success: function (html) 
        {
            $('.html').html(html);
            getCorac(1);
        }
    });
    
}

function onDeleteColacs(id_colac){
    event.stopPropagation();
    $.ajax({
        url:"../manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
            id_colac : id_colac,
            function2Call: 'deleteColac'
        },
        cache:false,
        success: function (html) 
        {
            $('.html').html(html);
            getColac(1);
        }
    });
    
}