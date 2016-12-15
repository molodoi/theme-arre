$(function() {
    $(window).scroll(function() {
        var scr = $(this).scrollTop();
        if (scr > 120) {
            $('.scrollup').fadeIn();
            $('.navbar').addClass('blur');
        } else {
            $('.scrollup').fadeOut();
            $('.navbar').removeClass('blur');

        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('nav')) {
            $el.next().css({ "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 });
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });

    $('a[href$=".gif"], a[href$=".jpg"], a[href$=".png"], a[href$=".pdf"], a[href$=".doc"], a[href$=".docx"], a[href$=".zip"], a[href$=".txt"], a[href$=".doc"], a[href$=".xls"], a[href$=".xlt"], a[href$=".xlsx"], a[href$=".xlsm"], a[href$=".xltx"], a[href$=".docx"], a[href$=".ppt"], a[href$=".ots"], a[href$=".odc"], a[href$=".odt"]').each(function() {
        $(this).attr('target', '_blank');
    });

    /*
    $(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
        event.preventDefault();
        var $form = $(this).closest('form'),
            $input = $form.find('input');
        $form.addClass('active');
        $input.focus();
    });

    $(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
        event.preventDefault();
        var $form = $(this).closest('form'),
            $input = $form.find('input');
        $('#showSearchTerm').text($input.val());
        closeSearch()
    });
    */

});