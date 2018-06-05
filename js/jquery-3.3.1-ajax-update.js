function onUpdateSectors(id_sector, nombre_sector){
    alert("Entro en la funcion");
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
            setPaginationButtonEvents();
        }
    });
}