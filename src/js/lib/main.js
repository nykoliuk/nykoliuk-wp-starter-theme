$(function() {
    //Highlight Link
    $(document).on('click', '.scroll-link', function(e) {
        e.preventDefault();
        var dataClass = $(this).data('class');
        goToDataClass(dataClass, 500, 60);
    });

    //Menu
    $(".navbar-toggler").click(function(e) {

        $navButton = $(this);
        $nav = $(".main-navigation");
        $navBar = $nav.find(".navbar-collapse");
        if (!$nav.hasClass("open")) {
            $nav.addClass("open");
            $('body').css('overflow', 'hidden');
        } else {
            $nav.removeClass("open");
            $('body').css('overflow', 'auto');
        }
    });
});

$(window).on('load', function(){
    $('[data-thumb]').each(function() {
        var $this = $(this),
            src = $(this).data('thumb');
        $this.attr('src', src);
        $this.addClass('loaded');
    });
});

// Lazyload
var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
});

function goToSection(id, time, offset) {
    $('html, body').animate({
        scrollTop: $(id).offset().top - offset
    }, time);
}
function goToDataClass(dataClass, time, offset) {
    $('html, body').animate({
        scrollTop: $('.' + dataClass).offset().top - offset
    }, time);
}