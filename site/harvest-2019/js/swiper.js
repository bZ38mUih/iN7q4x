$(document).ready(function(){
    $( window ).resize(function() {
        //alert($( window ).width()+" / "+$(".top-frame").width());

        var wWidth = $( window ).width()

        if(wWidth<1200){
            if(wWidth<800){
                $('.alb-frame-wrapper').width(wWidth);
            }else{
                //alert(111);
                $('.alb-frame-wrapper').width(wWidth*0.75);
            }
        }

        var swiper = new Swiper('.alb-frame-wrapper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 80,
                stretch: 0,
                depth: 700,
                modifier: 4,
                slideShadows : true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    })
    $( window ).trigger("resize");



    //$('.alb-frame-wrapper').width("600px");
})