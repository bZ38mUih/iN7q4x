<?php
$avatarErr = null;
$aCurPass = null;
$aNewPass = null;
$aRepeatPass = null;
if($_POST['curPass']){
    $aCurPass = $_POST['curPass'];
}else{
    $avatarErr.="<span class='fail'>текущий не введен</span>";
}
if($_POST['newPass']){
    $aNewPass = $_POST['newPass'];
}else{
    $avatarErr.="<span class='fail'>новый пароль не задан</span>";
}
if($_POST['newPassRepeat']){
    $aRepeatPass = $_POST['newPassRepeat'];
}else{
    $avatarErr.="<span class='fail'>повтор пароля не задан</span>";
}
if(!$avatarErr){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/source/requiredFields_class.php");
    if(!requiredFields::checkPassword($_POST['curPass'])){
        $avatarErr .= "<span class='fail'>недопустимый пароль</span>";
    }else{
        $queryText = "select * from accounts_dt INNER JOIN users_dt ON accounts_dt.user_id = users_dt.user_id ".
            "where account_id='".$_SESSION['account_id']."' and netWork='site'";
        $queryRes = $DB->doQuery($queryText);

        $queryRow = $DB->doFetchRow($queryRes);
        if(!password_verify($_POST['curPass'], $queryRow['pw_hash'])){
            $avatarErr .= "<span class='fail'>Неправильный текущий пароль</span>";
        }
    }
    if(!requiredFields::checkPassword($_POST['newPass'])){
        $avatarErr .= "<span class='fail'>недопустимый новый пароль</span>";
    }
    if($_POST['newPassRepeat'] != $_POST['newPass']){
        $avatarErr .= "<span class='fail'>Пароли не совпадают</span>";
    }
    if(!$avatarErr){
        $newHash=password_hash($_POST['newPass'], PASSWORD_DEFAULT);
        $updateHash_qry = "update accounts_dt set pw_hash='".$newHash."' ".
            "where account_id='".$_SESSION['account_id']."' ";
        $DB->doQuery($updateHash_qry);
        $avatarErr .= "<span class='well'>Пароль успешно изменен</span>";
        $aCurPass = null;
        $aNewPass = null;
        $aRepeatPass = null;
        $sendMailMessage = "Ваш новый пароль на '".F_NAME."': ".$_POST['newPass'];
        if (!mail($queryRow['eMail'], 'Регистрация на '.$_SERVER["HTTP_HOST"], $sendMailMessage, 'From: '.F_NAME)){
            $appRJ->response['result'].= "<p>Ошибки: письмо не отправлено</p>>";
        }
    }
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-avatar.php");