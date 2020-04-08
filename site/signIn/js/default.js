$(document).ready(function() {
    $("form.signIn input[name=login]").keyup(function () {
        if ($(this).val() != "") {
            $("label[for='login']").removeClass("shown");
        } else {
            $("label[for='login']").addClass("shown");
        }
    });
    $("form.signIn input[name=password]").keyup(function () {
        if ($(this).val() != "") {
            $("label[for='password']").removeClass("shown");
        } else {
            $("label[for='password']").addClass("shown");
        }
    });
    $("form.signIn input[name=rememberMe]").click(function(){
        if($(this).prop('checked') == true){
            $.cookie('rememberMe', "on", {expires: 30, path:'/'});
        }else{
            $.cookie('rememberMe', null, {expires: 30, path:'/'});
            $.cookie('password', null, {expires: 30, path:'/'});
        };
    });
});

function showGate(attrId)
{
    if($("#"+attrId).hasClass('active')===false){
        $.cookie('gate', attrId, {expires: 30, path: "/"});
        $(".signIn-gate").preloader({
            // loading text
            text: 'loading',
            // from 0 to 100
            percent: '',
            // duration in ms
            duration: '',
            // z-index property
            zIndex: '10',
            // sets relative position to preloader's parent
            setRelative: true
        });
        $(".signIn-menu a.active").removeClass("active");
        $.get("/signIn/?gate="+attrId)
            .done(function( data ){
                $(".signIn-gate").html(data);
                $('.signIn-gate').preloader('remove');
                if(attrId=='site'){
                    $("head").append("<script type='text/javascript' src='/site/signIn/js/site.js'></script>");
                }
            });
        $("#"+attrId).addClass("active");
    }
}

function signIn()
{
    var login = $("form.signIn input[name=login]").val();
    var password = $("form.signIn input[name=password]").val();
    $.cookie("login", login, {expires: 30, path:'/'});
    if ($.cookie('rememberMe')=="on")
    {
        $.cookie("password", password, {expires: 30, path:'/'});
    }
}