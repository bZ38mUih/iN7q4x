<?php
$mailErr = null;
if($_POST['newMail']){
    $newMail = $_POST['newMail'];
    require_once ($_SERVER["DOCUMENT_ROOT"]."/source/requiredFields_class.php");
    if(requiredFields::checkEmail($newMail)){
        $account_rd = new recordDefault("accounts_dt", "account_id");
        $account_rd->result['account_id']=$_SESSION['account_id'];
        $account_rd->copyOne();
        if($newMail != $account_rd->result['eMail']) {
            $account_rd->result['eMail'] = $newMail;

            $letters = array("g","u","q","d","x","f","g","h","k","l","z","x","n","1","2","3","4","5","6","7","8","9","0");
            for($i=0;$i < 16;$i++)
            {
                $vldCode .= $letters[rand(0,sizeof($letters)-1)];
            }

            $account_rd->result['vldCode']=$vldCode;

            $account_rd->result['validDate']= null;

            $account_rd->updateOne();

            $mailErr = "<span class='well'>Смена eMail упешно, вам необходимо подтвердить новый eMail при следующей авторизации</span>";

            $sendMailMessage = "Вам необходимо подвердить eMail адрес на ".$_SERVER["HTTP_HOST"]."/signIn при следующей авторизации, для этого ".
                "перейдите по ссылке в письме ".
                "http://".$_SERVER["HTTP_HOST"]."/checkIn/?vldCode=".$vldCode."&login=".
                $account_rd->result['accLogin']. ". Если вам не знаком сайт ".$_SERVER["HTTP_HOST"]
                .",  то просто проигнорируйте письмо.";
            $newMail = null;
            if (!mail($account_rd->result['eMail'], 'Смена eMail адреса '.$_SERVER["HTTP_HOST"], $sendMailMessage, 'From: '.F_NAME)){
                $mailErr.= "<p>Ошибки: письмо не отправлено. Ссылка для подтверждения дана ниже<br>".
                    "<a href='http://".$_SERVER["HTTP_HOST"]."/checkIn/?vldCode=".$vldCode."&login=".
                    $account_rd->result['accLogin']."'>ссылка для подтверждения</a></p>";
            }
        }else{
            $mailErr = "<span class='fail'>Вы ввели тот же самый eMail</span>";
        }

    }else{
        $mailErr = "<span class='fail'>недопустимый eMail</span>";
    }

}else{
    $mailErr = "<span class='fail'>eMail не задан</span>";
}



require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-avatar.php");