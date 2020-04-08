<?php
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'><div class='signIn-frame'><div class='signIn-menu'>".
    "<a href='/checkIn' title='Создать аккаунт на RJ'>Регистрация</a>".
    "</div><div class='signIn-gate'>";
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/signIn/views/signIn_form.php");
$appRJ->response['result'].= "</div></div></div></div></div>";