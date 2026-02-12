$(function () {

    $('body').append('<button id="topBtn"><img src="/typo3conf/ext/sp_ueberland/Resources/Public/Images/topBtn.png"/></button>');

    $(window ).scroll(function(){
        topScrollFunction();
    });

    function topScrollFunction() {
        if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
            $('#topBtn').fadeIn();
        } else {
            $('#topBtn').fadeOut();
        }
    }

    $('#topBtn').click(function(){
        // scroll up
        $("html, body").stop().animate({scrollTop: 0}, 500, 'swing', function () {
            // Hier könnte was passieren, tut es aber nicht ;)
        });
    });
});
