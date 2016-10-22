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
