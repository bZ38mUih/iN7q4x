<?php

$validErr = null;

$signInActiveSocial=" class='active'";
$signInActiveSite=null;



//        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/views/signIn_form.php");


if ($_POST){
    $appRJ->response['format']='ajax';
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/actions/site_auth.php");
    $h1='Вход на сайт';
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/views/defaultView.php");
}else{
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/views/defaultView.php");
}

