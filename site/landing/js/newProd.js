function showNew(tPage, prodOnPage) {
    $(".newProd-view").preloader({
        text: 'Обновление новые',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true
    });

    $.get("?newPodPage="+tPage+"&prodOnPage="+prodOnPage+"&showNew=y", function (data) {
        $(".newProd-view").preloader("remove");
        $(".newProd-view").html(data);
    })
}