
(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input3').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
            

    /*==================================================================
    [ Chose Radio ]*/
    $("#radio1").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input3-select').slideUp(300);
        }
    });

    $("#radio2").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input3-select').slideDown(300);
        }
    });

    $("#radio3").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input4-select').slideUp(300);
        }
    });

    $("#radio4").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input4-select').slideDown(300);
        }
    });

    $("#radio8").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input5-select').slideUp(300);
        }
    });

    $("#radio7").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input5-select').slideDown(300);
        }
    });

    $("#radio0").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input1-select').slideUp(300);
            $('.input2-select').slideDown(300);
        }
    });

    $("#radio9").on('change', function(){
        if ($(this).is(":checked")) {
            $('.input1-select').slideDown(300);
            $('.input2-select').slideUp(300);
        }
    });
        
  
    
    /*==================================================================
    [ Validate ]*/
    var name = $('.validate-input input[name="name"]');
    var email = $('.validate-input input[name="email"]');
    var message = $('.validate-input textarea[name="message"]');


    $('.validate-form').on('submit',function(){
        var check = true;

        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }


        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }

        if($(message).val().trim() == ''){
            showValidate(message);
            check=false;
        }

        return check;
    });

    $('.validate-form .input3').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);