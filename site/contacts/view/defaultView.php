<?php
$App['views']['social-block'] = true;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='Контакты Сад Приморья. Телефоны, почта, адрес, карта.'/>" .
    "<title>Контакты Сад Приморья. Телефоны, почта, адрес, карта</title>" .
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>" .
    "<script src='/source/js/jquery-3.2.1.js'></script>" .
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/contacts/css/default.css' type='text/css' media='screen, projection'/>" .
    "<script src='/site/siteHeader/js/modalHeader.js'></script>";
if ($App['views']['social-block']) {
    $appRJ->response['result'] .= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'] .= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'] .= "<div class='contentBlock-frame'>" .
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'] .= "<div class='centerBlock ta-left'>" .
    "<div class='navPanel'>" . $navPanel . "</div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'] .= "<div class='top-frame'>";
$appRJ->response['result'] .= "<h1><hr><span>Наши контакты</span></h1>";
$appRJ->response['result'].="<div class='hContacts'>"
."<span class='hcPhone'>".CONT_PHONE_1."</span>";
if(CONT_PHONE_2){
    $appRJ->response['result'].= "<span class='hcPhone'>".CONT_PHONE_2."</span>";
}
$appRJ->response['result'].= "<span class='hcMail'>".CONT_MAIL_1."</span>".
    "<span class='hcSchedule'>".F_SHEDULE_TEXT."</span>".
    "<span class='hcAddr'>Россия, Приморский край, г. Владивосток, ул. 3-я Пригородная,  район станции Весенняя.</span>"
    ."</div>";
    $appRJ->response['result'].= "<div class='c-delivery'>
<p>Питомник «Сад приморья» осуществляет доставку саженцев по всей России. Минимальный заказ 30 тысяч рублей. ДОСТАВКА БЕСПЛАТНАЯ.</p></div>";

$appRJ->response['result'] .="<div class='yMap'><script type='text/javascript' charset='utf-8' async 
src='https://api-maps.yandex.ru/services/constructor/1.0/js/
?um=constructor%3Acd9b4a98845af0bb26f81134be1091ec79594f99c4b5226c38817fcc8b2875af&amp;width=882&amp;height=400&amp;
lang=ru_RU&amp;scroll=true'></script></div>";
$appRJ->response['result'] .="<strong>По всем вопросам Вы можете получить консультацию, позвонив нам по телефону  
<a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_1))."' title='Получить консультацию по телефону'>".CONT_PHONE_1."</a>";
if(CONT_PHONE_2){
    $appRJ->response['result'].= " и <a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_2))."' title='Получить консультацию по телефону'>".CONT_PHONE_2."</a>";
}
$appRJ->response['result'] .= "</strong>";

$appRJ->response['result'] .="</div>";

$appRJ->response['result'] .= "</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'] .= "</body></html>";
