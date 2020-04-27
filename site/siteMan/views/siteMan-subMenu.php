<?php
$appRJ->response['result'].= "<div class='subMenu'>".
    "<a href='/'>Сайт</a>".

"<a href='/siteMan/' ";
if(!$appRJ->server['reqUri_expl'][2]){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Категории</a>".
    "<a href='/siteMan/products/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'products'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Товары</a>".
    "<a href='/siteMan/memoNote/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'memoNote'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= ">Паматка садоводу</a></div>";