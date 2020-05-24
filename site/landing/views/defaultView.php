<?php
$h1 =F_NAME;
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Магазин саженцев ".F_NAME." в Приморском крае | Питомник растений | Садовый центр.'/>".
    "<meta name='yandex-verification' content='a28b37bc8b7582ac' />".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Магазин саженцев ".F_NAME." в Приморском крае | Питомник растений | Садовый центр.</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".

    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/landing/css/slider.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/search/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/search/js/default.js'></script>".
    " <script src='/source/js/jssor.slider-28.0.0.min.js' type='text/javascript'></script>".
    "<script src='/site/landing/js/slider.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "<script src='/site/bucket/js/bucket.js'></script>".
    "<script src='/site/landing/js/newProd.js'></script>";
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'].= "<div class='centerBlock ta-left'>".
"<div class='navPanel'>".$navPanel."</div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/banner.php");

$appRJ->response['result'].= "<div class='h1Box'><h1>Питомник саженцев, растений и деревьев <span class='fName'>«".F_NAME."»</span></h1></div>".
"<div class='lc-block'>Уточняйте наличие саженцев и возможность доставки по телефону ".
        "<span class='hcPhone'><a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_1))."' title='Получить консультацию по телефону'>".CONT_PHONE_1."</a></span>";
if(CONT_PHONE_2){
    $appRJ->response['result'].= "<span class='hcPhone'><a href='tel:".str_replace(")", "", str_replace("(", "", CONT_PHONE_1)).
        "' title='Получить консультацию по телефону'>".CONT_PHONE_2."</a></span>";
}
$appRJ->response['result'].=", по <a class='lc-whatsapp' title='Получить консультацию по WhatsApp' href='whatsapp://send?phone=".
    str_replace(" ", "", str_replace(")", "", str_replace("(", "", CONT_PHONE_1)))."'>WhatsApp.</a>";


$appRJ->response['result'].="или по <a class='lc-viber' title='Получить консультацию по Viber' href='viber://add?number=".
    str_replace("+", "", str_replace(" ", "", str_replace(")", "", str_replace("(", "", CONT_PHONE_1))))."'>Viber.</a>";


$appRJ->response['result'].="<p>Все цены на сайте актуальны</p></div>";


require_once($_SERVER["DOCUMENT_ROOT"] . "/site/search/views/defaultView.php");


$appRJ->response['result'].="<div class='catView'>".
    "<h2><hr><span>Разделы каталога</span></h2>".
    $categories_txt."</div>".
    "<div class='catView'>".
    "<h2><hr><span>Популярные категории</span></h2>".
    $popCats_text."</div>";

$appRJ->response['result'].= "<div class='lOffer'>".
    "<div class='lo-img'><img src='/site/landing/img/green_1.png'></div>".
    "<div class='lo-txt'>Все саженцы полностью морозостойкие и безболезненно приживаются</div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/newProducts.php");
$appRJ->response['result'].= "<div class='catView'><h2><hr><span>Новые поступления</span></h2><div class='newProd-view'>".
    $newProd_txt.

    "</div></div>".
    "</div>";

$appRJ->response['result'].= "<div class='pv-descr'><p>Дорогие садоводы, для того чтобы провести заказ в нашем интернет-магазине 
саженцев «Сады Приморья», необходимо под желаемым товаром нажать кнопку «Добавить в корзину» или связаться по телефону.</p>
<p>Питомник «".F_NAME."» осуществляет доставку саженцев по всей России.</p></div>";


$appRJ->response['result'].="</div></div></div><span id='shareImg' src='http://sad-primorya.ru/site/siteHeader/img/site-logo.png'></span>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";