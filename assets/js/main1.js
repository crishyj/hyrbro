$(document).ready(function () {
    // $('.navbar-light .dmenu').hover(function () {
    //     $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    // }, function () {
    //     $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    // });

    $(".megamenu").on("click", function(e) {
        e.stopPropagation();
    });

    $('.searchbox').focus(function() {
        $('.navigation-megamenu').css('display', 'none');
    });

    $('.searchbox').blur(function() {
        $('.navigation-megamenu').css('display', 'block');
        $('#dropdown07').removeClass('show');
    });

    $('.searchbox').keyup(function () {  
        $('#dropdown07').addClass('show');  
        if(!$('.searchbox').val()){
            $('#dropdown07').removeClass('show');
        }    
    });

    if(!$('.searchbox').val()){
        $('#dropdown07').removeClass('show');
    } else{
        $('#dropdown07').addClass('show');
    }    

    $('#monbile_bankId').click(function(){
        $('#loginModal').modal('hide');
        $('#bankIdModal').modal('show');
    });

    $('#mobile_pw').click(function(){
        $('#loginModal').modal('hide');
        $('#passwordModal').modal('show');
    });

    $('#goto_pwModal').click(function(){
        $('#bankIdModal').modal('hide');
        $('#passwordModal').modal('show');
    });

    $('#goto_bankId').click(function(){
        $('#passwordModal').modal('hide');
        $('#bankIdModal').modal('show');        
    });

    $('.nav_footerRight').click(function(){
        $('.nav_footerRight').addClass('active');
        $('.nav_footerLeft').removeClass('active');        
        $('.nav_footerLeft').removeClass('inactive');
    })

    $('.nav_footerLeft').click(function(){
        $('.nav_footerLeft').addClass('active');
        $('.nav_footerRight').removeClass('active');        
        $('.nav_footerRight').removeClass('inactive');
    })


    
}); 

        