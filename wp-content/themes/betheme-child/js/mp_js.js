jQuery(document).ready(function ($) {
    //get track width
    function track_widths() {
        $('.track').each(function () {
            var items = $(this).children('.box').length;
            var length = items * 400;
            $(this).css("width", length);
        });
    }
    ;
    track_widths();
    function iniboxposition() {
        $('.track .box').each(function (index) {
            $(this).addClass('boxno' + index);
            var elem = $(this);
            initialpos = 400 * index;
            //console.log(initialpos);
            $(elem).css('left', initialpos);
        });
    }
    iniboxposition();

//    setInterval(function () {
//        $('.track .box').each(function (index) {
//            var elem = $('boxno' + index);
//            var left1 = parseInt($(elem).css('left'));
//            if ($('#left1:hover').length > 0) {
//                $(elem).css('left', left1 - 2);
//            }
//            else if ($('#right1:hover').length > 0) {
//                $(elem).css('left', left1 + 2);
//            }
//        });
//    }, 10);


    setInterval(function () {
        //console.log(index);
        var elem = $('.boxno0');
        $(elem).css('left', left1 - 2);
        var left1 = parseInt($(elem).css('left'));
        if ($('#left1:hover').length > 0) {
            $(elem).css('left', left1 - 2);
        }
        else if ($('#right1:hover').length > 0) {
            $(elem).css('left', left1 + 2);
        }
    }, 10);
});