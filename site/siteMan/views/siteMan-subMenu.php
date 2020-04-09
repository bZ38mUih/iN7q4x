<?php
$appRJ->response['result'].= "<div class='subMenu'><a href='/siteMan/' ";
if(!$appRJ->server['reqUri_expl'][2]){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Категории</a>".
    "<a href='/siteMan/products/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'products'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Товары</a>".
    "<a href='/siteMan/other/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'other'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Другое</a></div>";