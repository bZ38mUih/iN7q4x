$(document).ready(function(){
    $('.social_share').click(function(){
        var dataType = $(this).attr('data-type');
        var shareUrl=null;
        var shareImg=null;
        if($("#shareImg").length==1){
            shareImg = 'http://'+location.hostname+$("#shareImg").attr('src');
        }else{
            shareImg = 'http://'+location.hostname+'/site/siteHeader/img/site-logo.png';
        }
        switch (dataType){
            case 'ok':
                shareUrl="https://connect.ok.ru/offer?url="+location.href+"&title="+document.title
                +"&description="+$('meta[name=description]').attr("content")
                +"&imageUrl="+shareImg;
                break;
            case 'vk':
                shareUrl='http://vk.com/share.php?'
                +'url='+ location.href
                +'&image='+shareImg
                +'&title='+ $('meta[name=description]').attr("content")
                +'&noparse=true';
                break;
            case 'fb':
                shareUrl="http://www.facebook.com/sharer.php?s=100"+ '&p[url]='+ location.href;
                break;
        }
        return window.open(shareUrl,'','toolbar=0,status=0,scrollbars=1,width=626,height=436');

    });
    countShare();
})

function countShare() {
    $.get('?shareCount', function (data) {
        var obj = JSON.parse(data);
        for(var key in obj){
            if(obj.hasOwnProperty(key)){
                if(obj[key]>0){
                    //alert(obj[key]+" / "+key);
                    //$("a.social_share [data-type='"+key+"']").html(obj[key]);
                    $("[data-type='"+key+"'] sup").html(obj[key]);
                }
            }
        }
    });
}