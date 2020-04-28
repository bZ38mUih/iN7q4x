<?php
if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
    $navPanel = "<ul><li><a href='/siteMan'>siteMan :: </a></li>".substr($navPanel, 4 , strlen($navPanel)). "<ul></ul>";
}


$appRJ->response['result'].= "<div class='page-wrap'><header><div class='headerCenter'>".
    "<strong style='display: inline-block; width: 100%; background-color: firebrick;padding: 0; margin: 0; color: white;'>".
"Идет отладка! Некоторые функции сайта могут не работать</strong>".
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

    ."<div class='hDescr'>Саженцы плодовых деревьев и кустарников из питомника</div>"
    ."<div class='hContacts'>"
    ."<span class='hcPhone'>".CONT_PHONE_1."</span>";
if(CONT_PHONE_2){
    $appRJ->response['result'].= "<span class='hcPhone'>".CONT_PHONE_2."</span>";
}
$appRJ->response['result'].= "<span class='hcMail'>info@sad-primorya.ru</span>"
    ."</div>"
    ."<div class='hBucket'>"
    ."<div class='hbImg'><img src='/site/siteHeader/img/bucket.png'></div>"
    ."<div class = 'hbVolume'>"
    ."<span class='hbvCount'>Товаров: 0 шт.</span>"
    ."<span class='hbvAmount'>На сумму: 0 р.</span>"
    ."</div>"
    ."</div>"
    ."</div></header>";
