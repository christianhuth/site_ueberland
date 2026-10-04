// Resolved relative to this script, which TYPO3 publishes to /_assets/<hash>/JavaScript/ - only
// available while the script is being executed, not inside the ready handler
var topBtnImage = new URL('../Images/topBtn.png', document.currentScript.src).href;

$(function () {

    $('body').append('<button id="topBtn"><img src="' + topBtnImage + '"/></button>');

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
