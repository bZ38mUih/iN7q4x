<?php
if($_GET['showNew'] == 'y'){
    require_once($_SERVER['DOCUMENT_ROOT']."/site/landing/views/newProducts.php");
    $appRJ->response['result'] = $newProd_txt;
    $appRJ->response['format']='ajax';
    //exit();
}else{
    require_once($_SERVER['DOCUMENT_ROOT']."/site/landing/views/defaultView.php");
}


