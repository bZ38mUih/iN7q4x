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
    .F_NAME_TITLE;
if($App['views']['social-block']) {
    $appRJ->response['result'].=@file_get_contents($_SERVER["DOCUMENT_ROOT"]."/source/_conf/yMetrika.html");
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
$appRJ->response['result'].="</div>".
    //."</div>".
    "<div class='ft-right'>".
    "<div class='ft-nav'><h2>Навигация</h2>";
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
    "<span class='hcAddr'>".F_ADDRESS."</span>"
    ."</div></div>";

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
$appRJ->response['result'].= "
<style>
.dev-refer{
    display: inline-block;
    width: 100%;
    text-align: right;
    font-size: 8px;
    padding: 0;
    margin: 0;
}
.dev-refer a{
    padding-right: 1em;
}

.dev-refer img{
    height: 8px;
    width: 8px;
}
</style>
<div class='dev-refer'>".
    "<a href='https://rightjoint.ru' target='_blank' title='developed by Right Joint'><img src='https://rightjoint.ru/site/landing/img/favicon-32.png'>developed by Right Joint</a></div>";
$appRJ->response['result'].= "</footer></div></div></div></div>";
?>