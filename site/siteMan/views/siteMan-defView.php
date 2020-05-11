<?php
$h1 ="Категории";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Создание/редактирование альбомов/категорий'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Категории</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteMan/css/dwlMan.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/search/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/search/js/default.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
$appRJ->response['result'].="<div class='search-frame'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/search/views/defaultView.php");
$appRJ->response['result'].="</div>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-categories.php");
$appRJ->response['result'].= "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
$appRJ->response['result'].= "</body></html>";