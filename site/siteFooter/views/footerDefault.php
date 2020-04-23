<?php
$appRJ->response['result'].= "<div class='contentBlock-frame dark ft'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'><footer>";
/*
if($App['views']['social-block']) {
    $appRJ->response['result'].= "<div class='ft-service'>".
        "<noscript><div>".
        "<img src='https://mc.yandex.ru/watch/44136454' style='position:absolute; left:-9999px;' alt='' /></div></noscript>".
        "<a href='https://metrika.yandex.ru/stat/?id=44136454&amp;from=informer' target='_blank' rel='nofollow'>".
        "<img src='https://informer.yandex.ru/informer/44136454/3_1_FFFFFFFF_EFEFEFFF_0_pageviews' ".
        "style='width:88px; height:31px; border:0;' alt='Яндекс.Метрика' title='Яндекс.Метрика: данные за сегодня (просмотры, ".
        "визиты и уникальные посетители)' class='ym-advanced-informer' data-cid='44136454' data-lang='ru' /></a>".
        "</div>";
}
*/
$appRJ->response['result'].= "<div class='ft-center'>".

    //"<div class='ft-main'>".
    "<div class = 'hLogo'><div class='hlImg'>";
if(isset($appRJ->server['reqUri_expl'][1]) and file_exists($_SERVER['DOCUMENT_ROOT']."/site/".
        $appRJ->server['reqUri_expl'][1]."/img/logo.png")){
    $appRJ->response['result'].= "<img src='/site/".$appRJ->server['reqUri_expl'][1]."/img/logo.png' ".
        "alt='".$appRJ->server['reqUri_expl'][1]."-logo'>";
}else{
    $appRJ->response['result'].= "<img src='/site/siteHeader/img/site-logo.png' alt='RJ-logo'>";
}
$appRJ->response['result'].= "</div>"
    ."<div class='hlText'><span class='sad'>Сад</span><span class='primorya'>приморья</span></div>"
    ."</div>"
    //."</div>".
    ."<div class='ft-nav'><h2>Навигация</h2></div>".
    "<div class='ft-cont'><h2>Наши контакты</h2></div>".
    "<div class='ft-addr'><h2>Садовые центры</h2></div>".
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