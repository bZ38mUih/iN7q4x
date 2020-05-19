$(document).ready(function() {
    //alert(111);
    $(".hbVolume span.hbvCount, .hbVolume span.hbvAmount").click(function () {
        if($(this).hasClass("active")){
            bucketRemoveOne(null, null);
        }
        //alert(111);

    });

})

function bucketClose() {
    //alert(222);
    $(".hb-view-frame").removeClass("active");
    $("span.hbvCount").addClass("active");
    $("span.hbvAmount").addClass("active");
    //alert(222);
}

function bucketAddOne(prod_id, prod_age) {
    $(".hb-view").preloader({
        text: 'bucket calculating ...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });
    $.post( "/bucket", { bucket: "addBucket", prod_age: prod_age, prod_id: prod_id, qty: 1}, function( data ) {
        var response=JSON.parse(data);
        $("span.hbvCount").html(response.count);
        $("span.hbvAmount").html(response.amount);
        $(".hb-view").html(response.content);
        $(".hb-view-frame").addClass("active");
        $("span.hbvCount").removeClass("active");
        $("span.hbvAmount").removeClass("active");
        $(".hb-view").preloader("remove");
    });
}

function bucketRemoveOne(prod_id, prod_age) {
    $(".hb-view").preloader({
        text: 'bucket calculating ...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });
    $.post( "/bucket", { bucket: "addBucket", prod_age: prod_age, prod_id: prod_id, qty: -1}, function( data ) {

        var response=JSON.parse(data);
        $("span.hbvCount").html(response.count);
        $("span.hbvAmount").html(response.amount);
        $(".hb-view").html(response.content);
        if(response.count > 0){
            $(".hb-view-frame").addClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }else{
            $(".hb-view-frame").removeClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }
        $(".hb-view").preloader("remove");
    });
}

function bucketRemoveProduct(prod_id, prod_age){
    $(".hb-view").preloader({
        text: 'bucket calculating ...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });
    $.post( "/bucket", { bucket: "removeProduct", prod_id: prod_id, prod_age: prod_age}, function( data ) {
        var response=JSON.parse(data);
        $("span.hbvCount").html(response.count);
        $("span.hbvAmount").html(response.amount);
        $(".hb-view").html(response.content);
        if(response.count > 0){
            $(".hb-view-frame").addClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }else {
            $(".hb-view-frame").removeClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }
        $(".hb-view").preloader("remove");
    });
}

function bucketClear() {
    $(".hb-view").preloader({
        text: 'bucket calculating ...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });
    $.post( "/bucket", { bucket: "clearBucket"}, function( data ) {
        var response=JSON.parse(data);
        $("span.hbvCount").html(response.count);
        $("span.hbvAmount").html(response.amount);
        $(".hb-view").html(response.content);
        if(response.count > 0){
            $(".hb-view-frame").addClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }else {
            $(".hb-view-frame").removeClass("active");
            $("span.hbvCount").removeClass("active");
            $("span.hbvAmount").removeClass("active");
        }
        $(".hb-view").preloader("remove");
    });
}