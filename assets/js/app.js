$(function() {
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        speed: 600,
    });

    $(window).scroll(function(){

        var scr = $(this).scrollTop();
        if (scr > 120) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
        if (scr > 50) {
            $('#brand').fadeIn();
        } else { 
            $('#brand').fadeOut();
        }
        if (scr > 10) {
            $('#logo').hide();
        } else {;
            $('#logo').show();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /* affix the navbar after scroll below header */
    $('#nav').affix({
        offset: {
            //top: $('header').height()-$('#nav').height()
            top: 60
        }            
    }); 
    
});