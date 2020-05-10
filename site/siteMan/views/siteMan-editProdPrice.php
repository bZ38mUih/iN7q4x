<?php
$h1 ="Саженец, цены";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Саженец, цены' http-equiv='Content-Type'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Саженец, цены</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/contentMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteMan/css/age-line.css' type='text/css' media='screen, projection'/>".
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
$appRJ->response['result'].="<form class='newCateg' method='post'>";
if($pErr === false){
    $appRJ->response['result'].= "<div class='results success'>Updated SUCCESS</div>";
}elseif($pErr){
    $appRJ->response['result'].= "<div class='results fail'>Updated FAIL</div>";
    print_r($pErr);
}
$appRJ->response['result'].="<input type='hidden' name='flagField' value='editProdPrice'>".
    "<div class='input-line ta-left'><label for='catIndex'>Цены на саженец:</label></div>";
//echo "<pre>";
//print_r($findPrice_arr);
foreach($prodAge_conf as $age=>$aAliace){
    $appRJ->response['result'].="<div class='age-line'>".
        "<div class='al-age'>".$aAliace."</div>".
        "<div class='al-use'>".
    "<input type='checkbox' name='prodActive_".$age."' ";

    if($findPrice_arr[$age]['activeFlag']){
        $appRJ->response['result'].= "checked";
    }
    $appRJ->response['result'].=" ></div>".
        "<div class='al-price'>";
    //if($findPrice_arr[$age]['prodPrice']){
        $appRJ->response['result'].= "<input type='number' name='price_".$age."' value='".$findPrice_arr[$age]['prodPrice']."' >";
    //}else{
    //    $appRJ->response['result'].= "---";
    //}
    $appRJ->response['result'].= "</div></div>";

}

//if()
/*
"<div class='input-line ta-left'><label for='catIndex'>Цены на саженец:</label></div>";
$appRJ->response['result'].="<textarea name='content'>".
    $E_rd->result['longDescr']."</textarea>";
*/
$appRJ->response['result'].="<div class='input-line'><input type='submit' value='save'></div>".
"</form></div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");

$appRJ->response['result'].= "</body></html>";