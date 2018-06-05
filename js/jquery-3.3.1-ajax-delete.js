function onDeleteSectors(id_sector){
    alert(""+id_sector);
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
            setPaginationButtonEvents();
        }
    });
    /*var cedulaU=document.getElementById('cedulaU').value;
    var nameU=document.getElementById('nameU').value;
    var lastnameU=document.getElementById('lastnameU').value;
    var bdayU=document.getElementById('bdayU').value;
    var sigindayU=document.getElementById('sigindayU').value;
    var addressU=document.getElementById('addressU').value;
    var emailU=document.getElementById('emailU').value;
    var cedulaSupU=document.getElementById('cedulaSupU').value;
    var institutionU=document.getElementById('institutionU').value;
    var activoU=document.getElementById('activoU').value;
    $.ajax({
        url:"manager/gestorRegistro.php",
        type:"post",
        data: 
        {  
           'cedulaU' :cedulaU,
           'nameU' :nameU,
           'lastnameU' :lastnameU,
           'bdayU' :bdayU,
           'sigindayU' :sigindayU,
           'addressU' :addressU,
           'emailU' :emailU,
           'cedulaSupU' :cedulaSupU,
           'institutionU' :institutionU,
           'activoU' :activoU
        },
        cache:false,
        success: function (html) 
        {
           alert('Data Send');
           $('#msg').html(html);
        }
    });
    return false;*/
}