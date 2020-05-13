$(document).ready(function() {

    $(".lm-btn").click(function () {
        //alert(111);
        $(".leftMenu").addClass("active");
    });

    $(".leftMenu .lmt-close").click(function () {
        //alert(111);
        $(".leftMenu").removeClass("active");
    })

    var img = document.getElementsByTagName('img');
    for(var i in img)
    {
        img[i].oncontextmenu = function()
        {
            return false;
        }
    }
})

