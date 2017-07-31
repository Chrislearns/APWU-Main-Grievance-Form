$(".create-account").click(function() {
    $(".overlay").fadeIn();
    $(".registration-form").fadeIn("slow");
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
});


$('.overlay').on('click', function(event) {
    $(".overlay, .registration-form").fadeOut("slow");
    $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });
});
