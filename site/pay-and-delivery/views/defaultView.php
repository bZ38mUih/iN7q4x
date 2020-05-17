<?php
$h1 ="Оплата и доставка";
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Магазин саженцев ".F_NAME." в Приморском крае | Питомник растений | Садовый центр.'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Магазин саженцев ".F_NAME." в Приморском крае. Способы оплаты и доставки саженцев.</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".

    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/pay-and-delivery/css/payStyle.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<script src='/site/bucket/js/bucket.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>";
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
$appRJ->response['result'].= "<div class='top-frame'><h1><hr><span>Оплата и доставка</span></h1>".
    "<div class='topImg'><img src='/site/pay-and-delivery/img/pay-and-delivery.jpg'></div>".
    "<div class='pd-TxtBlock'>".
    "<div class='pdTb-top'>".
    "<div class='pdTop-left'><h3>Прием заказов на сайте</h3>".
"<p>Дорогие садоводы, для того чтобы провести заказ в нашем интернет-магазине саженцев «Сады Приморья», 
необходимо под желаемым товаром нажать кнопку «Добавить в корзину» или связаться по телефону.</p>".
    "<p class='lgColor'>Прием заказов на саженцы</p>".
    "</div>".
    "<div class='pdTop-right'>".
    "<p>Выбранная позиция попадает в корзину, куда необходимо перейти, для того, чтобы оформить заказ. 
В корзине можно уточнить количество товаров и узнать общую стоимость заказа.</p>".
    "<p class='lgColor'>После заполнения контактной информации и способа доставки необходимо подтвердить заказ.</p>".
    "</div>".
    "</div>".
    "<div class='pdTb-bottom'><h3>Доставка и оплата саженцев</h3>".
    "<p class='pv-descr'>Питомник «".F_NAME."» осуществляет доставку саженцев по всей России. 
Минимальный заказ 30 тысяч рублей. ДОСТАВКА БЕСПЛАТНАЯ.</p>".
    "</div>".
    "</div>".

"</div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";