$(document).ready(function(){
    //SmothScroll
$('a[href*=#]').click(function() {
    if (this.hash == "#carousel1") {return true;}
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
        var $target = $(this.hash);
        $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
        if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({scrollTop: targetOffset}, 1000);
                return false;
        }
    }
});

// message form
$("#form_message").on("submit", function() {
    var error = false;
    // validate input data here and submit form
    if ($("#name").val().trim().length > 0) {
        $("#name_error").addClass("hidden");
        $("#name").val($("#name").val().trim());
    }
    else {
        $("#name").val("");
        $("#name_error").removeClass("hidden");

        error = true;
    }
    if ($("#email").val().trim().length > 0) {
        $("#email_error").addClass("hidden");
        $("#email").val($("#email").val().trim());
    }
    else {
        $("#email").val("");
        $("#email_error").removeClass("hidden");

        error = true;
    }
    if ($("#message").val().trim().length > 0) {
        $("#message_error").removeClass("hidden");
        $("#message").val($("#message").val().trim());
    }
    else {
        $("#message").val("");
        $("#message_error").removeClass("hidden");

        error = true;
    }

    if (error) {
        return false;
    }
    else {
        return true;
    }
});

// prettyPhoto
    $("area[rel^='prettyPhoto']").prettyPhoto();

    $(".gallery a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed:'normal',
        theme:'light_square',
        slideshow:3000,
        //autoplay_slideshow: true,
        opacity: 0.95,
        show_title: false,
        theme: 'facebook',
        hideflash: true,
        social_tools: false
    });
});
