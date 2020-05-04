<?php
$appRJ->response['result'].= "<div class='contentBlock-frame dark ft'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'><footer>";
$appRJ->response['result'].= "<div class='ft-center'>".

    "<div class='ft-main'>".
    "<div class='hlImg'>";
if(isset($appRJ->server['reqUri_expl'][1]) and file_exists($_SERVER['DOCUMENT_ROOT']."/site/".
        $appRJ->server['reqUri_expl'][1]."/img/logo.png")){
    $appRJ->response['result'].= "<img src='/site/".$appRJ->server['reqUri_expl'][1]."/img/logo.png' ".
        "alt='".$appRJ->server['reqUri_expl'][1]."-logo'>";
}else{
    $appRJ->response['result'].= "<img src='/site/siteHeader/img/site-logo.png' alt='RJ-logo'>";
}
$appRJ->response['result'].= "</div>"
    ."<div class='hlText'><span class='sad'>Сад</span><span class='primorya'>приморья</span></div>";
if($App['views']['social-block']) {
    //62372254
    /*
    $appRJ->response['result'].= "<div class='ft-service'><noscript><div>".
        "<img src='https://mc.yandex.ru/watch/62372254' style='position:absolute; left:-9999px;' alt='' /></div></noscript>".
        "<a href='https://metrika.yandex.ru/stat/?id=62372254&amp;from=informer' target='_blank' rel='nofollow'>".
        "<img src='https://informer.yandex.ru/informer/62372254/3_1_FFFFFFFF_EFEFEFFF_0_pageviews' ".
        "style='width:88px; height:31px; border:0;' alt='Яндекс.Метрика' title='Яндекс.Метрика: данные за сегодня (просмотры, ".
        "визиты и уникальные посетители)' class='ym-advanced-informer' data-cid='62372254' data-lang='ru' /></a>".
        "</div>";
    */

    $appRJ->response['result'].="<!-- Yandex.Metrika informer -->
<a href='https://metrika.yandex.ru/stat/?id=62372254&amp;from=informer'
target='_blank' rel='nofollow'><img src='https://informer.yandex.ru/informer/62372254/3_1_FFFFFFFF_EFEFEFFF_0_pageviews'
style='width:88px; height:31px; border:0;' alt='Яндекс.Метрика' title='Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)' 
class='ym-advanced-informer' data-cid='62372254' data-lang='ru' /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type='text/javascript' >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

   ym(62372254, 'init', {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src='https://mc.yandex.ru/watch/62372254' style='position:absolute; left:-9999px;' alt='' /></div></noscript>
<!-- /Yandex.Metrika counter -->";

}
if($App['views']['social-block']){
    $appRJ->response['result'].= "<div class='ft-like'>".
        "<a href='#' class='social_share' data-type='ok' title='Постить в Одноклассники'>".
        "<img src='/site/siteFooter/img/ok.png' alt='ok-like'><sup></sup></a>".
        "<a href='#' class='social_share' data-type='fb' title='Постить в Facebook'>".
        "<img src='/site/siteFooter/img/fb.png' alt='fb-like'><sup></sup></a>".
        "<a href='#' class='social_share' data-type='vk' title='Постить ВКонтакте'>".
        "<img src='/site/siteFooter/img/vk.png' alt='vk-like'><sup></sup></a>".
        "</div>";
}
//$appRJ->response['result'].="</div>";
$appRJ->response['result'].="</div>"
    //."</div>".
    ."<div class='ft-nav'><h2>Навигация</h2>";
include ($_SERVER["DOCUMENT_ROOT"]."/site/siteHeader/views/rp-text.php");

$appRJ->response['result'].= "</div>".
    "<div class='ft-cont'><h2>Наши контакты</h2>";
$appRJ->response['result'].="<div class='hContacts'>"
    ."<span class='hcPhone'><a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_1))."' title='Получить консультацию по телефону'>".CONT_PHONE_1."</a></span>";
if(CONT_PHONE_2){
    $appRJ->response['result'].= "<span class='hcPhone'><a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_1))."' title='Получить консультацию по телефону'>".CONT_PHONE_2."</a></span>";
}
$appRJ->response['result'].= "<span class='hcMail'>".CONT_MAIL_1."</span>".
    "<span class='hcSchedule'>".F_SHEDULE_TEXT."</span>".
    "<span class='hcAddr'>Россия, Приморский край, г. Владивосток, ул. 3-я Пригородная,  район станции Весенняя.</span>"
    ."</div>";

$appRJ->response['result'].="</div>".
    //"<div class='ft-addr'><h2>Садовые центры</h2></div>".
    "</div>";
/*
if($App['views']['social-block']){
    $appRJ->response['result'].= "<div class='ft-like'>".
        "<a href='#' class='social_share' data-type='ok' title='Постить в Одноклассники'>".
        "<img src='/site/siteFooter/img/ok.png' alt='ok-like'><sup></sup></a>".
        "<a href='#' class='social_share' data-type='fb' title='Постить в Facebook'>".
        "<img src='/site/siteFooter/img/fb.png' alt='fb-like'><sup></sup></a>".
        "<a href='#' class='social_share' data-type='vk' title='Постить ВКонтакте'>".
        "<img src='/site/siteFooter/img/vk.png' alt='vk-like'><sup></sup></a>".
        "</div>";
}
*/
$appRJ->response['result'].= "</footer></div></div></div></div>";
?>