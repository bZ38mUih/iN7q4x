<?php
$h1 ="Учетная запись";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Настройки учетной записи' http-equiv='Content-Type'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Учетная запись</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/siteMan/css/avatar.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/contentMenu.css' type='text/css' media='screen, projection'/>".
    "<script type='text/javascript' src='/site/js/manForm.js'></script>".
    //"<script src='/source/js/tinymce/js/tinymce/tinymce.min.js'></script>".
    //"<script src='/site/siteMan/js/main.js'></script>".
    //"<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    //"<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");

$findOrders_qry = "select * from orders_dt order by oDate desc";
$findOrders_res = $DB->doQuery($findOrders_qry);
while ($findOrders_row=$DB->doFetchRow($findOrders_res)){
    $appRJ->response['result'].= "<p>".
        //"order_id: ".
    "Ссылка: <a href='/order?viewOrder=".$findOrders_row['oTag']."'>Смотреть корзину</a><br>".
    "Клиен (имя): ".$findOrders_row['clientName']."<br>".
    "Телефон: ".$findOrders_row['clientPhone']."<br>".
    "eMail: ".$findOrders_row['clientMail']."<br>".
    "Коментарий: ".$findOrders_row['comment']."<br>".
    //"status: ".$findOrders_row['status']."<br>".
    "Дата заказа: ".$findOrders_row['oDate']."<br>".
    "К-во: ".$findOrders_row['oCount']."<br>".
    "Сумма: ".$findOrders_row['oAmount']."<br>".
        "</p>";
}


$appRJ->response['result'].="<div class='avatar'>".

    "</div></div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");

$appRJ->response['result'].= "</body></html>";