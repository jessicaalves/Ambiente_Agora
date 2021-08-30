/*Author: Jéssica*/

/* ______JavaScript Personalidado______*/

/* ______Menu Lateral Responsivo______*/

$(document).ready(function () {
    $('.sidebar-toggle').on('click', function () {
        $('.sidebar').toggleClass('toggled');
    });

    var active = $('.sidebar .active');
    if (active.length && active.parent('.collapse').length) {
        var parent = active.parent('.collapse');

        parent.prev('a').attr('aria-expanded', true);
        parent.addClass('show');
    }

});




