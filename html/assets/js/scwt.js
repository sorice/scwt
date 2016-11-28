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

// send message
$('#btn_send').click(function() {
    // validate input data here and submit form
    if (true) {
        return false
    }
    else {
        $('#form_message').submit();
    }
});

$(document).ready(function(){
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
