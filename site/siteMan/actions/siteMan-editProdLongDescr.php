<?php
$pErr=null;
if(isset($_GET['prod_id']) and $_GET['prod_id']!=null){
    $E_rd = new recordDefault("prodList_dt", "prod_id");
    $E_rd->result['prod_id']=$_GET['prod_id'];
    if($E_rd->copyOne()){
        require_once ($_SERVER['DOCUMENT_ROOT']."/site/siteMan/views/siteMan-editProdDescr.php");
    }else{
        $appRJ->errors['request']['description']="неправильные параметры запроса prod_id";
    }
}else{
    $appRJ->errors['request']['description']="неправильные параметры запроса null prod_id";
}