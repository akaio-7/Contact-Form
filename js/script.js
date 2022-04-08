$(document).ready(function() {
    
    var userError = true,
        emailError = true,
        phoneError = true,
        msgError = true ;



// user field validation
    $('.user').blur( function () {

        if ($(this).val().length < 4) {
            
            $(this).css("border","1px solid #800");
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.star').fadeIn(100);
            userError = true;

        }else {

            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).css("border","1px solid #080");
            $(this).parent().find('.star').fadeOut(100);
            userError = false;

        }
    });

// email field validation
    $('.email').blur( function () {

        if ($(this).val().length <= 1) {
            
            $(this).css("border","1px solid #800");
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.star').fadeIn(100);
            emailError = true ;

        }else {

            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).css("border","1px solid #080");
            $(this).parent().find('.star').fadeOut(100);
            emailError = false ;

        }
    });

// phone field validation
    $('.cell').blur( function () {

        if ($(this).val().length != 10 ) {
            
            $(this).css("border","1px solid #800");
            $(this).parent().find('.custom-alert').fadeIn(200);
            phoneError = true ;

        }else {

            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).css("border","1px solid #080");
            phoneError = false ;

        }
    });

// messsage field validation
    $('.msg').blur( function () {

        if ($(this).val().length == 0) {
            
            $(this).css("border","1px solid #800");
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.star').fadeIn(100);
            msgError = true;

        }else {

            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).css("border","1px solid #080");
            $(this).parent().find('.star').fadeOut(100);
            msgError = false;

        }

    });
    
    // Submit Form Validation

    $('.contact-form').submit(function(e) {

        if (userError == true || emailError == true || phoneError == true || msgError == true) {
            
            e.preventDefault();
            $('.user').blur();
            $('.email').blur();
            $('.msg').blur();

        }
        

    });


 });