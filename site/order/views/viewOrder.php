<?php
$App['views']['social-block'] = false;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='Просмотр заказа'/>" .
    "<meta name='robots' content='noindex'>".
    "<title>Ваш заказ</title>" .
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
$appRJ->response['result'] .= "<h1><hr><span>Просмотр заказа</span></h1>";
$appRJ->response['result'] .= "<div class='hb-view-frame'><div class='hbv-title'><div class='hbvt-text'>".
    "<img src='/source/img/handsShake-color.png'>Ваш заказ<span class='hbvCount'>".$oFind_row['oCount']."</span><span class='hbvAmount'>".$oFind_row['oAmount']."</span></div>".
    "<div class='bm-close'></div></div><div class='hb-view'>";
$appRJ->response['result'] .= $order_txt."</div>".
    "</div>";
$appRJ->response['result'] .="<form class='form-order' method='post'>".
    "<label for='clientName' ";
if($pErr['clientName'] != null){
    $appRJ->response['result'] .=" class='err' ";
}
$appRJ->response['result'] .="><input type='text' name='clientName' value='".$oFind_row['clientName']."'></label>".
    "<label for='clientPhone' ";
if($pErr['clientPhone'] != null){
    $appRJ->response['result'] .=" class='err' ";
}
$appRJ->response['result'] .="><input type='text' name='clientPhone' value='".$oFind_row['clientPhone']."'></label>".
    "<label for='clientMail'><input type='email' name='clientMail' value='".$oFind_row['clientMail']."'></label>".
    "<label for='comment'><textarea name='comment'>".$oFind_row['comment']."</textarea></label>".
    "</form>";
$appRJ->response['result'] .="</div>";
$appRJ->response['result'] .= "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
$appRJ->response['result'] .= "</body></html>";
