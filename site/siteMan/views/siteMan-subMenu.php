<?php
$appRJ->response['result'].= "<div class='subMenu'>".
    "<a href='/'  title='На главную'>Сайт</a>".

"<a href='/siteMan/' ";
if(!$appRJ->server['reqUri_expl'][2]){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= " title='Категории, создание и редактирование'>Категории</a>".
    "<a href='/siteMan/products/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'products'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= " title='Саженцы, создание и редактирование'>Саженцы</a>".
    "<a href='/siteMan/siteMap/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'siteMap'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= " title='Создать карту сайта'>Карта сайта</a>";
$appRJ->response['result'].= "<a href='/siteMan/avatar/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'avatar'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= " title='Настройки учетной записи'>Уч. запись</a>";
$appRJ->response['result'].= "<a href='/siteMan/orders/' ";
if(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2] === 'orders'){
    $appRJ->response['result'].= "class='active'";
}
$appRJ->response['result'].= " title='Заказы с сайта'>Заказы</a>".
"</div>";