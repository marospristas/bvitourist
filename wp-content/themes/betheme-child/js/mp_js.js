jQuery(document).ready(function($) {
setInterval(function() {
var left1 = parseInt($('#track1').css('left')),
        left2 = parseInt($('#track2').css('left')),
        left3 = parseInt($('#track3').css('left'));
        if ($('#left1:hover')) {
$('#track1').css('left', left1 + 2);
}
else if ($('#right1:hover')) {
$('#track1').css('left', left1 - 2);
}
}, 10);
        });