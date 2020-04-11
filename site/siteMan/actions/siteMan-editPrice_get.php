<?php
$pErr=null;
$selectOptions=null;
$findPrice_arr = null;
if(isset($_GET['prod_id']) and $_GET['prod_id']!=null){
    $E_rd = new recordDefault("prodList_dt", "prod_id");
    $E_rd->result['prod_id']=$_GET['prod_id'];
    if($E_rd->copyOne()){
        $findPrice_qry = "select * from prodPrice_dt WHERE prod_id = ".$E_rd->result['prod_id'];
        $findPrice_res = $DB->doQuery($findPrice_qry);
        while($findPrice_row = $DB->doFetchRow($findPrice_res)){
            $findPrice_arr[$findPrice_row['prodAge']]['prodPrice'] = $findPrice_row['prodPrice'];
            $findPrice_arr[$findPrice_row['prodAge']]['activeFlag'] = $findPrice_row['activeFlag'];
        }
        require_once ($_SERVER['DOCUMENT_ROOT']."/site/siteMan/views/siteMan-editProdPrice.php");
    }else{
        $appRJ->errors['request']['description']="неправильные параметры запроса prod_id";
    }
}else{
    $appRJ->errors['request']['description']="неправильные параметры запроса null prod_id";
}