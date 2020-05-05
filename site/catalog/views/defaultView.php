<?php
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Каталог магазина 'Сад приморья'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Каталог магазина 'Сад приморья'</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/catalog/css/catView.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/catalog/css/catPresent.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/search/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/search/js/default.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "<script src='/site/bucket/js/bucket.js'></script>";
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>".
    "<div class='navPanel'>".$navPanel."</div>".
    "<div class='search-frame'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/search/views/defaultView.php");
$appRJ->response['result'].="</div>";;


$appRJ->response['result'].= "<div class='centerBlock ta-left'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'><div class='catView'>";

$appRJ->response['result'].= "<h1>КУПИТЬ САЖЕНЦЫ В ПРИМОРСКОМ КРАЕ</h1>".
    $catView.

    "</div></div></div>";
$appRJ->response['result'].= "<div class='pv-descr'><p>Дорогие садоводы, для того чтобы провести заказ в нашем интернет-магазине 
саженцев «Сады Приморья», необходимо под желаемым товаром нажать кнопку «Добавить в корзину» или связаться по телефону.</p>
<p>Питомник «Сад приморья» осуществляет доставку саженцев по всей России. Минимальный заказ 30 тысяч рублей. ДОСТАВКА БЕСПЛАТНАЯ.</p></div>";
$appRJ->response['result'].="</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";