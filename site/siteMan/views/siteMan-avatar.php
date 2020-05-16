<?php
$h1 ="Учетная запись";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Настройки учетной записи' http-equiv='Content-Type'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Учетная запись</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteMan/css/avatar.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/contentMenu.css' type='text/css' media='screen, projection'/>".
    "<script type='text/javascript' src='/site/js/manForm.js'></script>".
    //"<script src='/source/js/tinymce/js/tinymce/tinymce.min.js'></script>".
    //"<script src='/site/siteMan/js/main.js'></script>".
    //"<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    //"<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
$E_rd = new recordDefault("accounts_dt", "account_id");
$E_rd->result['account_id']=$_SESSION['account_id'];
$E_rd->copyOne();


$appRJ->response['result'].="<div class='avatar'>".
    "<div class='avatar-info'>".
    "<div class='ai-line'><span class='uId'>".$E_rd->result['account_id']."</span></div>".
    "<div class='ai-line'><span class='uLogin'>".$E_rd->result['accAlias']."</span></div>".
    "<div class='ai-line'><span class='uMail'>".$E_rd->result['eMail']."</span></div>".

    "</div>".
    "<form class='passChange' method='post'>".
    "<h2>Сменить пароль</h2>".
    "<div class='ai-line'><label for='curPass'><input type='password' name='curPass' value='".$aCurPass."'></label></div>".
    "<div class='ai-line'><label for='newPass'><input type='password' name='newPass' value='".$aNewPass."'></label></div>".
    "<div class='ai-line'><label for='newPassRepeat'><input type='password' name='newPassRepeat' value='".$aRepeatPass."'></label></div>".
    "<input type='submit' value='changePass' name='changePass' title='Изменить пароль'>".
    "<input type='submit' value='resetPass' name='resetPass' title='Сброс пароля'>".
    "<div class='a-res'>".$avatarErr."</div>".
    "<div class='note'>Новый пароль будет выслан на ваш eMail</div>".
    "</form>".
    "<form class='changeMail' method='post'>".
    "<h2>Сменить eMail</h2>".
    "<div class='ai-line'><label for='newMail'><input type='email' name='newMail' value='".$newMail."'></label></div>".
    "<input type='submit' value='changeMail' name='changeMail' title='Изменить eMail'>".
    "<div class='a-res'>".$mailErr."</div>".
    "<div class='note'><p>Необходимо подтвердить новый eMail перейдя по ссылке в письме при следующей авторизации</p></div>".
    "</form>".
    "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");

$appRJ->response['result'].= "</body></html>";