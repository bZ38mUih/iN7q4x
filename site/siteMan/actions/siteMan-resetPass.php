<?php
$avatarErr = null;
$aCurPass = null;
$vldCode = null;

$account_rd = new recordDefault("accounts_dt", "account_id");
$account_rd->result['account_id']=$_SESSION['account_id'];
$account_rd->copyOne();

$letters = array("g","u","q","d","x","f","g","h","k","l","z","x","n","1","2","3","4","5","6","7","8","9","0");
for($i=0;$i < 16;$i++)
{
    $vldCode .= $letters[rand(0,sizeof($letters)-1)];
}

$newHash=password_hash($vldCode, PASSWORD_DEFAULT);
$updateHash_qry = "update accounts_dt set pw_hash='".$newHash."' ".
    "where account_id='".$_SESSION['account_id']."' ";
$DB->doQuery($updateHash_qry);

$sendMailMessage = "Ваш новый пароль: ".$vldCode.", используйте его при следующей авторизации" ;


if (!mail($account_rd->result['eMail'], "Сброс пароля на ".$_SERVER["HTTP_HOST"], $sendMailMessage, 'From: '.F_NAME)){
    $avatarErr.= "Ошибки: письмо не отправлено. Ваш новый пароль: ".$vldCode;
}else{
    $avatarErr = "<span class='well'>Смена пароля успешно</span>";
}



require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-avatar.php");