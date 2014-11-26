jQuery(document).ready(function($) {
    //get track width

    //test2
    function track_widths() {
        $('.track').each(function() {
            var items = $(this).children('.box').length;
            var length = items * 400;
            $(this).css("width", length);
        });
    }
    ;
    track_widths();
    function iniboxposition() {
        $('.track').each(function() {
            $(this).children('.box').each(function(index) {
                $(this).addClass('boxno' + index);
                var elem = $(this);
                initialpos = 400 * index;
                //console.log(initialpos);
                $(elem).css('left', initialpos);
            });
        });
    }
    iniboxposition();
$('.moveit').hover(function () {
    $(this).addClass('hover');
}, function () {
    $(this).removeClass('hover');
});
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
    function reposition_boxes() {
        $('.track').each(function() {
            var items = $(this).children('.box').length;
            $(this).children('.box').each(function(index) {
                //console.log(index);
                var elem = $('.boxno' + index);
                var left1 = parseInt($(elem).css('left'));
                //var items = $('.track').children('.box').length;
                var length = (items) * 400;
                if (left1 < -400) {
                    left1 = left1 + length;
                }
                ;
                if (left1 > (length - 400)) {
                    left1 = left1 - length;
                }
                ;
                if ($(this).parent('.slider').children('.left.hover').length > 0) {
                    $(elem).css('left', left1 - 4);
                }
                else if ($(this).parent('.slider').children('.right.hover').length > 0) {
                    $(elem).css('left', left1 + 4);
                }
            });
        });
    }

    setInterval(function() {
        //console.log(index);
        reposition_boxes();
    }, 10);
});