<?php
$h1 ="Сад приморья";
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>";
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'].= "<div class='centerBlock ta-left'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'><div class='catView'>".
    "<h2>Разделы каталога</h2>".
    $categories_txt."</div>".
    "<div class='catView'>".
    "<h2>Популярные категории</h2>".
    $popCats_text."</div>";

$appRJ->response['result'].= "<div class='lOffer'>".
    "<div class='lo-img'><img src='/site/landing/img/green_1.png'></div>".
    "<div class='lo-txt'>Интернет магазин саженцев «Сад пиморья» предлагает Вам большой
    ассортимент плодовых и декоративных растений. Все наши саженцы полностью
    адаптированы к климату Московской области и безболезненно приживаются.
    А это значит, что Вы получите сильные и здоровые растения по самым выгодным ценам.</div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/newProducts.php");
$appRJ->response['result'].= "<div class='catView'><h2>Новые поступления</h2>".
    $newProd_txt.

    "</div>".


    "</div>"."<h2>Памятка садоводу</h2>";




$appRJ->response['result'].="</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";