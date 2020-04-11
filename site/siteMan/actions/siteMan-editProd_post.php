<?php
$E_rd = new recordDefault("prodList_dt", "prod_id");
if(isset($_GET['prod_id']) and $_GET['prod_id']!=null){
    $E_rd->result['prod_id'] = $_GET['prod_id'];
    $E_rd->copyOne();
    if(isset($_POST['prodName']) and $_POST['prodName']!=null){
        $E_rd->result['prodName']=htmlspecialchars($_POST['prodName']);
    }else{
        $pErr['prodName']='недопустимое название категории';
    }
    if(isset($_POST['prodAlias']) and $_POST['prodAlias']!=null){
        $E_rd->result['prodAlias']=htmlspecialchars($_POST['prodAlias']);
    }else{
        $pErr['prodAlias']='недопустимый alias';
    }

    $E_rd->result['prodDescr']=htmlspecialchars($_POST['prodDescr']);
    if(empty($_POST['prodDescr'])){
        $pErr['prodDescr']='недопустимый заголовок';
    }

    /*
    if($_POST['catMeta']){
        $E_rd->result['catMeta']=htmlspecialchars($_POST['catMeta']);
    }else{
        $E_rd->result['catMeta']= null;
    }
    */


    if(isset($_POST['prodCat_id'])){
        if($_POST['prodCat_id'] == 'none'){
            $E_rd->result['prodCat_id']=null;
        }else{
            $E_rd->result['prodCat_id']=$_POST['prodCat_id'];
        }
    }
    if(isset($_POST['newFlag']) and $_POST['newFlag']=='on'){
        $E_rd->result['newFlag']=true;
    }else{
        $E_rd->result['newFlag']=false;
    }
    if(isset($_POST['activeFlag']) and $_POST['activeFlag']=='on'){
        $E_rd->result['activeFlag']=true;
    }else{
        $E_rd->result['activeFlag']=false;
    }
    /*
    if(isset($_POST['catIndex']) and $_POST['catIndex']=='on'){
        $E_rd->result['catIndex']=true;
    }else{
        $E_rd->result['catIndex']=false;
    }
    */
}else{
    $pErr['prod_id']='недопустимое prod_id';
}
if(isset($pErr)){
    $pErr['common']=false;
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProduct.php");
}else{
    if($E_rd->updateOne()){
        $pErr['common']=true;
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProduct.php");
    }else{
        $appRJ->errors['XXX']['description']="ошибка не обработана: update into prodList error";
    }
}