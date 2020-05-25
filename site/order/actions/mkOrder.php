<?php
$E_rd = new recordDefault("orders_dt", "order_id");

//$pErr['clientName'] = null;
if($_POST['clientName']){
    $E_rd->result['clientName'] = $_POST['clientName'];
}else{
    //echo "zzz";
    $pErr['clientName'] = "Вы не указали ваше имя";
}
//$pErr['clientPhone'] = null;
if($_POST['clientPhone']){
    $E_rd->result['clientPhone'] = $_POST['clientPhone'];
}else{
    $pErr['clientPhone'] = "вы не указали ваш номер";
}
if($_POST['clientMail']){
    $E_rd->result['clientMail'] = $_POST['clientMail'];
}
if($_POST['comment']){
    $E_rd->result['comment'] = $_POST['comment'];
}
if($pErr==null){
    $E_rd->result['status'] = 'new';
    $E_rd->result['activeFlag'] = true;
    $new_order_id = uniqid();
    $E_rd->result['oTag'] = $new_order_id;
    $E_rd->result['oDate'] = date_format( $appRJ->date['curDate'], "Y-m-d H:i:s");

    $prod_count = null;
    $bucket_amount = null;

    foreach ($_SESSION['bucket'] as $prod_id => $prod_age){
        $age_list = null;
        foreach ($prod_age as $age=>$qty){
            $age_list.=$age.", ";
        }
        $age_list = substr($age_list, 0, strlen($age_list) -2);
        $find_qry = "select prodList_dt.*, prodPrice_dt.prodPrice, prodPrice_dt.prodAge from prodList_dt ".
            "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
            " where prodList_dt.prod_id = '".$prod_id."' and prodPrice_dt.prodAge in (".$age_list.") and prodList_dt.activeFlag is true
         group by prodList_dt.prod_id, prodPrice_dt.prodAge order by prodPrice_dt.prodAge";
        $find_res = $DB->doQuery($find_qry);

        while ($find_row = $DB->doFetchRow($find_res)){
            $tPrice = $_SESSION['bucket'][$prod_id][$find_row['prodAge']]*$find_row['prodPrice'];

            $PL_rd = new recordDefault("ordersList_dt", "ol_id");
            $PL_rd->result['oTag'] = $new_order_id;
            $PL_rd->result['prod_id'] = $prod_id;
            $PL_rd->result['prodAge'] = $find_row['prodAge'];
            $PL_rd->result['prodPrice'] = $find_row['prodPrice'];
            $PL_rd->result['prodCount'] = $_SESSION['bucket'][$prod_id][$find_row['prodAge']];
            $PL_rd->result['activeFlag'] = true;
            if($PL_rd->putOne()){

            }else{
                $pErr['transaction'] = true;
            }

            $prod_count+=$_SESSION['bucket'][$prod_id][$find_row['prodAge']];
            $bucket_amount+=$tPrice;

        }
    }
    $E_rd->result['oCount'] = $prod_count;
    $E_rd->result['oAmount'] = $bucket_amount;
    if($pErr['transaction'] != true){
        if($E_rd->putOne()){

            if( $E_rd->result['clientMail']){
                $sendMailMessage = "ссылка для просмотра: ".$_SERVER["HTTP_HOST"]."/order?viewOrder=".$new_order_id." " ;
                mail($E_rd->result['clientMail'], "Ваш заказ на ".$_SERVER["HTTP_HOST"], $sendMailMessage, 'From: '.F_NAME);
            }

            $sendMailMessage = "ссылка для просмотра: ".$_SERVER["HTTP_HOST"]."/order?viewOrder=".$new_order_id." " ;
            mail(CONT_MAIL_1, "Новый заказ на ".$_SERVER["HTTP_HOST"], $sendMailMessage, 'From: '.F_NAME);

            unset($_SESSION['bucket']);
            unset($_SESSION['count']);
            unset($_SESSION['amount']);
            $page = "Location: /order?viewOrder=".$new_order_id;
            header($page);
        }else{
            $pErr['transaction'] = true;
        }
    }
}