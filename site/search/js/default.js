$(document).ready(function(){
   $(".s-button").click(function () {
       //alert(111);
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
});