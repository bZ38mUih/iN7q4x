<?php
$App['views']['social-block'] = true;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='Оформление заказа на ".F_NAME."'/>" .
    "<title>Оформление заказа</title>" .
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>" .
    "<script src='/source/js/jquery-3.2.1.js'></script>" .
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/order/css/order.css' type='text/css' media='screen, projection'/>" .
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<script src='/site/order/js/order.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>";
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
$appRJ->response['result'] .= "<h1><hr><span>Оформление заказа</span></h1>";
$appRJ->response['result'] .= "<div class='hb-view-frame'><div class='hbv-title'><div class='hbvt-text'>".
    "<img src='/source/img/handsShake-color.png'>Ваш заказ<span class='hbvCount'>".$_SESSION['count']."</span><span class='hbvAmount'>".$_SESSION['amount']."</span></div>".
"<div class='bm-close'></div></div><div class='hb-view'>";
require_once ($_SERVER["DOCUMENT_ROOT"]."/site/bucket/views/bucket.php");
$appRJ->response['result'] .= $bucket_txt."</div>".
"<div class='hbvf-buttons'>".
"<div class='hbvf-clear'><span onclick='bucketClear()'><img src='/source/img/clear-icon.png'> - Очистить корзину</span></div>".
"<div class='hbvf-order'><a href='/catalog' title='Каталог'><img src='/site/siteHeader/img/site-logo.png'> - Продолжить покупки</a></div>".
"</div></div>";
if($_SESSION['count']){
    $appRJ->response['result'] .="<form class='form-order' method='post'>".
        //"<div class='input-line'>".
        "<input type='hidden' name='mkOrder' value='y'></label>".
        "<label for='clientName' ";
    if($pErr['clientName'] != null){
        $appRJ->response['result'] .=" class='err' ";
    }

    $appRJ->response['result'] .="><input type='text' name='clientName' value='".$E_rd->result['clientName']."'></label>".
        "<label for='clientPhone' ";
    if($pErr['clientPhone'] != null){
        $appRJ->response['result'] .=" class='err' ";
    }
    $appRJ->response['result'] .="><input type='text' name='clientPhone' value='".$E_rd->result['clientPhone']."'></label>".
        "<label for='clientMail'><input type='email' name='clientMail' value='".$E_rd->result['clientMail']."'></label>".
        "<label for='comment'><textarea name='comment'>".$E_rd->result['comment']."</textarea></label>".
        "<input type='submit' value='Оформить'>".
        //"</div>".

        "</form>";
}
if($pErr['transaction'] == true){
    $appRJ->response['result'] .="<strong style='display: block; width: 100%; background-color: red;'>Transaction fail</strong>";
}
$appRJ->response['result'] .="</div>";

$appRJ->response['result'] .= "</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'] .= "</body></html>";
