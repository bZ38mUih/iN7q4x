$(document).ready(function(){
    $( window ).resize(function() {
        $('.yMap').width(Math.round($(".top-frame").width()));
    })
    $( window ).trigger("resize");
})