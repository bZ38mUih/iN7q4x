<?php
$alertsArr['404']['title']='Не найдено';
$alertsArr['404']['h1']='Не найдено';
$alertsArr['404']['img']='/source/alerts/img/404-not-found.jpg';
$alertsArr['404']['respCode']=404;

$alertsArr['stab']['title']='Реконструкция';
$alertsArr['stab']['h1']='Сайт временно на реконструкции';
$alertsArr['stab']['img']='/source/alerts/img/stabErr.jpg';

$alertsArr['access']['title']='Запрещен';
$alertsArr['access']['h1']='Доступ запрещен';
$alertsArr['access']['img']='/source/alerts/img/accessErr.jpg';
$alertsArr['access']['respCode']=403;

$alertsArr['connection']['title']='Подключение';
$alertsArr['connection']['h1']='Подключение';
$alertsArr['connection']['img']='/source/alerts/img/connErr.jpg';

$alertsArr['request']['title']='Request';
$alertsArr['request']['h1']='Неправильные параметры запроса';
$alertsArr['request']['img']='/source/alerts/img/requestErr.jpg';
$alertsArr['request']['respCode']=400;

$alertsArr['config']['title']='Конфигурация';
$alertsArr['config']['h1']='Ошибка в конфигурации';
$alertsArr['config']['img']='/source/alerts/img/connErr.jpg';

$alertsArr['XXX']['title']='Неизвестная ошибка';
$alertsArr['XXX']['h1']='Неизвестная ошибка';
$alertsArr['XXX']['img']='/source/alerts/img/XXX-unknownError.jpg';

if($this->errors){
    $errType=null;
    $errDescr=null;
    foreach ($alertsArr as $key=>$val){
        if(isset($this->errors[$key])){
            $errType=$key;
            $errDescr=$this->errors[$key]['description'];
            break;
        }
    }
    if($alertsArr[$key]['respCode']){
        http_response_code($alertsArr[$key]['respCode']);
    }
    echo "<!DOCTYPE html>".
        "<html lang='en-Us'>".
        "<head>".
        "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
        "<meta name='description' content='Возникла ошибка'>".
        "<title>".$errType."-".$alertsArr[$errType]['title']."</title>".
        "<link rel='SHORTCUT ICON' href='/source/alerts/img/favicon.png' type='image/png'>".
        "<link rel='stylesheet' href='/source/alerts/css/default.css' type='text/css' media='screen, projection'/>".
        "</head>".
        "<body>".
        "<div class='descriptionFrame' ";
    if($alertsArr[$errType]['img']){
        echo "style='background-image: url(".$alertsArr[$errType]['img'].")'";
    }
    echo ">".
        "<div class='df-title'>".
        "<h1>".$alertsArr[$errType]['h1']."</h1>".
        "<p>".$this->errors[$errType]['description']."</p>".
        "</div>".
        "<div class='alertsMenu'>".
        "<h2>На этом сайте:</h2>".
        "<a href='/' title='Главная'><img src='/site/siteHeader/img/site-logo.png'>Главная «Сад приморья»</a>".
        "<a href='/catalog' title='Каталог саженцев'><img src='/site/siteHeader/img/site-logo.png'>Каталог</a>".
        "<a href='/about' title='Информация о фирме'><img src='/site/siteHeader/img/site-logo.png'>О питомнике</a>".
        "<a href='/pay-and-delivery' title='Как оплатить и как доставят'><img src='/site/siteHeader/img/site-logo.png'>Оплата и доставка</a>".
        "<a href='/contacts' title='Телефоны, почта, адрес, карта'><img src='/site/siteHeader/img/addr-icon.png'>Контакты</a>".
        "<a href='/signIn' title='Авторизация'><img src='/site/signIn/img/logo.png'>Вход на сайт</a>".

        "</div>".
        "</div>".
        "</body>".
        "</html>";
}
exit;