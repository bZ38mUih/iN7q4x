$(document).ready(function() {

    $(".lm-btn").click(function () {
        //alert(111);
        $(".leftMenu").addClass("active");
    });

    $(".leftMenu .lmt-close").click(function () {
        //alert(111);
        $(".leftMenu").removeClass("active");
    })
})

