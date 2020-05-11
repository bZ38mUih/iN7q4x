$(document).ready(function(){
    $(".s-button").click(function () {
        $(".site-search").preloader({
            text: 'Searching ...',
            percent: '',
            duration: '',
            zIndex: '',
            setRelative: true
        });
        var jqxhr = $.get("/search?sTemplate="+$("#sTemplate").val(), function () {
        })
            .done(function(data) {
                $(".s-result").html(data);
                $(".s-result").addClass("active");
                $('.site-search').preloader('remove');
            });
    })

    $("input[name=sTemplate]").keyup(function () {
        if ($(this).val() != "") {
            $("label[for='sTemplate']").hide();
        } else {
            $("label[for='sTemplate']").show();
        }
    });
    $("input[name=sTemplate]").trigger("keyup");
});

function findClose() {
    $(".s-result").removeClass("active");
}