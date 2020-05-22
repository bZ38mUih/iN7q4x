<?php
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Саженцы ".$find_row['prodName']." в питомнике от ".$minProdPrice." руб. Описание и покупка саженцев.'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>".$find_row['prodName']."</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/catalog/css/catView.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/product/css/prod.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/landing/css/slider.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/search/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/search/js/default.js'></script>".

    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<script src='/site/product/js/bucket.js'></script>".
    "<script src='/site/bucket/js/bucket.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>"
    //" <script src='/source/js/jssor.slider-28.0.0.min.js' type='text/javascript'></script>".
    //"<script src='/site/landing/js/slider.js'></script>"
;
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'].= "<div class='centerBlock ta-left'>".
    "<div class='navPanel'>".$navPanel."</div>".
"<div class='search-frame'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/search/views/defaultView.php");
$appRJ->response['result'].="</div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'>";
$appRJ->response['result'].= "<h1>".$find_row['prodName']."</h1>";
if($find_row['longDescr']){
    $appRJ->response['result'].= "<div class='pv-descr'>".$find_row['longDescr']."</div>";
}
$appRJ->response['result'].= "<div class='pv-order'>".
    "<div class='pvo-left'>";
if($find_row['prodImg']){
    $appRJ->response['result'].="<img src='".GL_PROD_IMG_PAPH.$find_row['prod_id']."/".$find_row['prodImg']."' id='shareImg'>";
}else{
    $appRJ->response['result'].="><img src='/data/default-img.png'>";
}

$appRJ->response['result'].="</div>".
    "<div class='pvo-right'>".
    "<div class='pvo-offer'>Заказать и купить</div>".
    "<div class='pvo-age ta-left'>".$prodPrice_text;


$appRJ->response['result'].="</div>".
    "<div class='pvo-get'>".
    "<div class='pvo-pv'><span id='pCaption'>Цена:</span><span id='pVal'>".$tPrice."</span></div>".
    "<div class='pvo-cnt'>".
    "<div class='quantity buttons_added'>
	<input type='button' value='-' class='minus'><input type='number' step='1' min='1' max='' name='quantity' value='1' 
	title='Qty' class='input-text qty text' size='4' pattern='' inputmode=''><input type='button' value='+' class='plus'>
</div>".
    "</div>".
    "<button id='prodBucket' onclick='addProduct(".$find_row['prod_id'].")'>В корзину</button>".
    //"<button id='byOneClick'>Купить в 1 клик</button>".
    "</div>".

    "</div>";


if($sub_text){
    $appRJ->response['result'].="<h2>Похожие товары</h2>"."<div class='catView'>".$sub_text."</div></div>";
}

$appRJ->response['result'].= "<div class='pv-descr'><p>Дорогие садоводы, для того чтобы провести заказ в нашем интернет-магазине 
саженцев «Сады Приморья», необходимо под желаемым товаром нажать кнопку «Добавить в корзину» или связаться по телефону.</p>
<p>Питомник «".F_NAME."» осуществляет доставку саженцев по всей России.</p></div>";

$appRJ->response['result'].="</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";