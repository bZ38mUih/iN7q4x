<?php

$h1 = "Сад приморья";
$App['views']['social-block'] = true;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.'/>" .
    "<meta name='yandex-verification' content='a28b37bc8b7582ac' />" .
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.</title>" .
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>" .
    "<script src='/source/js/jquery-3.2.1.js'></script>" .
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/contacts/css/default.css' type='text/css' media='screen, projection'/>" .
    //"<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>" .
    //"<link rel='stylesheet' href='/site/landing/css/slider.css' type='text/css' media='screen, projection'/>" .
    "<script src='/site/siteHeader/js/modalHeader.js'></script>";
    //"<link rel='stylesheet' href='/site/search/css/default.css' type='text/css' media='screen, projection'/>" .
    //"<script src='/site/search/js/default.js'></script>" .
    //" <script src='/source/js/jssor.slider-28.0.0.min.js' type='text/javascript'></script>" .
    //"<script src='/site/landing/js/slider.js'></script>" .
    //"<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>" .
    //"<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>"

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
$appRJ->response['result'].= "<span class='hcMail'>info@sad-primorya.ru</span>".
    "<span class='hcSchedule'>Пн - Пт: с 9.00 до 18.00, сбт., вск. - выходной</span>".
    "<span class='hcAddr'>Россия, Приморский край, г. Владивосток, ул. 3-я Пригородная,  район станции Весенняя.</span>"
    ."</div>";
    $appRJ->response['result'].= "<div class='c-delivery'>
<p>Питомник «Сад приморья» осуществляет доставку саженцев по всей России. Минимальный заказ 30 тысяч рублей. ДОСТАВКА БЕСПЛАТНАЯ.</p></div>";

$appRJ->response['result'] .="<script type='text/javascript' charset='utf-8' async 
src='https://api-maps.yandex.ru/services/constructor/1.0/js/
?um=constructor%3Acd9b4a98845af0bb26f81134be1091ec79594f99c4b5226c38817fcc8b2875af&amp;width=882&amp;height=400&amp;
lang=ru_RU&amp;scroll=true'></script>";
$appRJ->response['result'] .="<strong>По всем вопросам Вы можете получить консультацию, позвонив нам по телефонам  
<a href='tel:+7 (915) 818-70-66' title='Получить консультацию по телефону'>+7 (915) 818-70-66</a> и <a href='tel:+7 (962) 936-76-22' title='Получить консультацию по телефону'>+7 (962) 936-76-22</a> 
</strong>";

//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/banner.php");


//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/search/views/defaultView.php");
/*

$appRJ->response['result'] .= "<div class='catView'>" .
    "<h2><hr><span>Разделы каталога</span></h2>" .
    $categories_txt . "</div>" .
    "<div class='catView'>" .
    "<h2><hr><span>Популярные категории</span></h2>" .
    $popCats_text . "</div>";

$appRJ->response['result'] .= "<div class='lOffer'>" .
    "<div class='lo-img'><img src='/site/landing/img/green_1.png'></div>" .
    "<div class='lo-txt'>Все саженцы полностью морозостойкие и безболезненно приживаются</div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/newProducts.php");
$appRJ->response['result'] .= "<div class='catView'><h2><hr><span>Новые поступления</span></h2>" .
    $newProd_txt .

    "</div>";
*/
$appRJ->response['result'] .="</div>";


$appRJ->response['result'] .= "</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'] .= "</body></html>";
