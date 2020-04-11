<?php
$h1 ="Саженец, описаниие";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Категория, описаниие' http-equiv='Content-Type'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Саженец, описаниие</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/contentMenu.css' type='text/css' media='screen, projection'/>".
    "<script type='text/javascript' src='/site/js/manForm.js'></script>".
    "<script src='/source/js/tinymce/js/tinymce/tinymce.min.js'></script>".
    "<script src='/site/siteMan/js/main.js'></script>".
    //"<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    //"<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-prodMenu.php");
$appRJ->response['result'].="<form class='newCateg' method='post'>".
    "<input type='hidden' name='flagField' value='editProdLongDescr'>".
"<div class='input-line ta-left'><label for='catIndex'>Длинное описание саженца:</label></div>";
$appRJ->response['result'].="<textarea name='content'>".
    $E_rd->result['longDescr']."</textarea>".
"<div class='input-line'><input type='submit' value='save'></div>".
"</form></div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");

$appRJ->response['result'].= "</body></html>";