<?php
$appRJ->response['result'].= "<div class='page-wrap'><header><div class='headerCenter'>"
    ."<div class = 'hLogo'><div class='hlImg'>";
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

    ."<div class='hDescr'>ПИТОМНИК ПЛОДОВЫХ И ДЕКОРАТИВНЫХ РАСТЕНИЙ</div>"
    ."<div class='hContacts'>"
    ."<span class='hcPhone'>8 (9XX) XXX-XXXX</span>"
    ."<span class='hcMail'>info@sad-primorya.ru</span>"
    ."</div>"
    ."<div class='hBucket'>"
    ."<div class='hbImg'><img src='/site/siteHeader/img/bucket.png'></div>"
    ."<div class = 'hbVolume'>"
    ."<span class='hbvCount'>Товаров: 0 шт.</span>"
    ."<span class='hbvAmount'>На сумму: 0 р.</span>"
    ."</div>"
    ."</div>"
    ."</div></header>";
