<?php
//echo 333;
//exit;
$E_rd = new recordDefault("prodList_dt", "prod_id");
if(isset($_GET['prod_id']) and $_GET['prod_id']!=null){
    $E_rd->result['prod_id'] = $_GET['prod_id'];
    $E_rd->copyOne();
    $delPrice_qry = "delete from prodPrice_dt WHERE prod_id = ".$E_rd->result['prod_id'];
    $DB->doQuery($delPrice_qry);
}else{
    $pErr['prod_id']='недопустимое prod_id';
}
if(isset($pErr)){
    $pErr['common']=false;
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProdPrice.php");
}else{
    foreach($_POST as $key=>$val){
        if(strpos($key, "price_") === 0){
            $insert_qry = "insert into prodPrice_dt (prod_id, prodAge, prodPrice, activeFlag) values (".
                $E_rd->result['prod_id'].", ".
                substr($key, 6, strlen($key)-6).", ";
            if($val){
                $insert_qry.=$val.", ";
            }else{
                $insert_qry.="null, ";
            }
            if($_POST['prodActive_'.substr($key, 6, strlen($key)-6)] == 'on'){
                $insert_qry.="true";
            }else{
                $insert_qry.="false";
            }
                //$val.", ".
                //substr($key, 6, strlen($key)-5).", ".

            $insert_qry.=")";
            $DB->doQuery($insert_qry);
            //echo $insert_qry."<br>";
            //if()

            //st
            //echo $key." - ".strpos(" ".$key, "price_")."<br>";
        }
    }

    $findPrice_qry = "select * from prodPrice_dt WHERE prod_id = ".$E_rd->result['prod_id'];
    $findPrice_res = $DB->doQuery($findPrice_qry);
    while($findPrice_row = $DB->doFetchRow($findPrice_res)){
        $findPrice_arr[$findPrice_row['prodAge']]['prodPrice'] = $findPrice_row['prodPrice'];
        $findPrice_arr[$findPrice_row['prodAge']]['activeFlag'] = $findPrice_row['activeFlag'];
    }
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProdPrice.php");
    /*
    if($E_rd->updateOne()){
        $pErr['common']=true;
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProduct.php");
    }else{
        $appRJ->errors['XXX']['description']="ошибка не обработана: update into prodList error";
    }
    */
}
