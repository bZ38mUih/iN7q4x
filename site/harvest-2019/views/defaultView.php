<?php
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Урожай питомника 2019 года: фото деревьев и кустарников с полей и садов'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Наш урожай 2019</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<script src='/site/harvest-2019/js/swiper.js'></script>".
    "<script src='/source/js/Swiper/swiper.min.js'></script>".
    "<link rel='stylesheet' href='/source/js/Swiper/swiper.min.css'>".

    "<link rel='stylesheet' href='/site/harvest-2019/css/harvest.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/catalog/css/catView.css' type='text/css' media='screen, projection'/>".
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

$appRJ->response['result'].= "<h1>".$find_row['catDescr']."</h1>".
    "<div class='pv-descr'>".$find_row['catMeta']."</div>";
$appRJ->response['result'].="</div><div class='hv-wp'> ".
    "<div class='alb-frame-wrapper'><div class='swiper-wrapper'>".$sub_text."</div></div></div>";
$appRJ->response['result'].= "<div class='pv-descr'><p>Дорогие садоводы, для того чтобы провести заказ в нашем интернет-магазине 
саженцев «Сады Приморья», необходимо под желаемым товаром нажать кнопку «Добавить в корзину» или связаться по телефону.</p>
<p>Питомник «".F_NAME."» осуществляет доставку саженцев по всей России. Доставка по Владивостоку - БЕСПЛАТНО!</p></div>";
$appRJ->response['result'].="</div></div></div>".

    "</div></div>";

//$appRJ->response['result'].="</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");

//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";