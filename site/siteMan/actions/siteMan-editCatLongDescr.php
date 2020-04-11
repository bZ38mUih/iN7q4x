<?php
$catErr=null;
$catSelectOptions=null;
if(isset($_GET['cat_id']) and $_GET['cat_id']!=null){
    $Cat_rd = new recordDefault("prodCat_dt", "prodCat_id");
    $Cat_rd->result['prodCat_id']=$_GET['cat_id'];
    if($Cat_rd->copyOne()){
        require_once ($_SERVER['DOCUMENT_ROOT']."/site/siteMan/views/siteMan-editCatDescr.php");
    }else{
        $appRJ->errors['request']['description']="неправильные параметры запроса cat_id";
    }
}else{
    $appRJ->errors['request']['description']="неправильные параметры запроса null cat_id";
}