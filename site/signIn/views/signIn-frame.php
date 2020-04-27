<?php
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'><div class='signIn-frame'>".
    "<div class='adminPanel'><a href='/' title='На главную'><img src='/site/siteHeader/img/site-logo.png'>Сайт</a>";
if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
    $appRJ->response['result'].="<a href='/siteMan' title='Управление сайтом'><img src='/site/siteMan/img/logo.png'>siteMan</a>";
}

$appRJ->response['result'].="</div><div class='signIn-menu'>".
    "<a href='/checkIn' title='Создать аккаунт на RJ'>Регистрация</a>".
    "</div><div class='signIn-gate'>";
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/views/signIn_form.php");
$appRJ->response['result'].= "</div></div></div></div></div>";