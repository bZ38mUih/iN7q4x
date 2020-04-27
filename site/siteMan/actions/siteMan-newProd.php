<?php

$pErr=null;

$Prod_rd = new recordDefault("prodList_dt", "prod_id");

if(isset($_POST['prodName']) and $_POST['prodName']!=null){
    //$catName_err =
    $Prod_rd->result['prodName']=htmlspecialchars($_POST['prodName']);
}else{
    $pErr['prodName']='недопустимое название саженца';
}

if(isset($_POST['prodAlias']) and $_POST['prodAlias']!=null){
    $Prod_rd->result['prodAlias']=htmlspecialchars($_POST['prodAlias']);
}else{
    $pErr['prodAlias']='недопустимый alias';
}
/*
if(isset($_POST['prodDescr']) and $_POST['prodDescr']!=null){
    $Prod_rd->result['prodDescr']=htmlspecialchars($_POST['prodDescr']);
}else{
    $pErr['prodDescr']='недопустимый заголовок';
}
*/

if(isset($_POST['prodCat_id'])){

    if($_POST['prodCat_id'] == 'none'){
        $Prod_rd->result['prodCat_id']=null;
    }else{
        $Prod_rd->result['prodCat_id']=$_POST['prodCat_id'];
    }
}else{

}
if(isset($_POST['newFlag']) and $_POST['newFlag']=='on'){
    $Prod_rd->result['newFlag']=true;
}else{
    $Prod_rd->result['newFlag']=false;
}
if(isset($_POST['activeFlag']) and $_POST['activeFlag']=='on'){
    $Prod_rd->result['activeFlag']=true;
}else{
    $Prod_rd->result['activeFlag']=false;
}

if(isset($pErr)){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newProd.php");
}else{
    if($Prod_rd->putOne()){
        $page = "Location: /siteMan/editProduct/?prod_id=".$Prod_rd->result['prod_id'];
        header($page);
    }else{
        $appRJ->errors["XXX"]["description"]="insert into prodList err";
    }
}