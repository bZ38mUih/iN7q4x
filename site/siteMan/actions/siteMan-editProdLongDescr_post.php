<?php
$E_rd = new recordDefault("prodList_dt", "prod_id");
if(isset($_GET['prod_id']) and $_GET['prod_id']!=null){
    $E_rd->result['prod_id'] = $_GET['prod_id'];
    $E_rd->copyOne();
    /*
    if(isset($_POST['catName']) and $_POST['catName']!=null){
        $Cat_rd->result['catName']=htmlspecialchars($_POST['catName']);
    }else{
        $catErr['catName']='недопустимое название категории';
    }
    if(isset($_POST['catAlias']) and $_POST['catAlias']!=null){
        $Cat_rd->result['catAlias']=htmlspecialchars($_POST['catAlias']);
    }else{
        $catErr['catAlias']='недопустимый alias';
    }

    $Cat_rd->result['catDescr']=htmlspecialchars($_POST['catDescr']);
    if(empty($_POST['catDescr'])){
        $catErr['catDescr']='недопустимый заголовок';
    }

    if($_POST['catMeta']){
        $Cat_rd->result['catMeta']=htmlspecialchars($_POST['catMeta']);
    }else{
        $Cat_rd->result['catMeta']= null;
    }


    if(isset($_POST['prodCat_parId'])){
        if($_POST['prodCat_parId'] == 'none'){
            $Cat_rd->result['prodCat_parId']=null;
        }else{
            $Cat_rd->result['prodCat_parId']=$_POST['prodCat_parId'];
        }
    }
    if(isset($_POST['popFlag']) and $_POST['popFlag']=='on'){
        $Cat_rd->result['popFlag']=true;
    }else{
        $Cat_rd->result['popFlag']=false;
    }
    if(isset($_POST['catActive']) and $_POST['catActive']=='on'){
        $Cat_rd->result['catActive']=true;
    }else{
        $Cat_rd->result['catActive']=false;
    }
    if(isset($_POST['catIndex']) and $_POST['catIndex']=='on'){
        $Cat_rd->result['catIndex']=true;
    }else{
        $Cat_rd->result['catIndex']=false;
    }
    */
    $E_rd->result['longDescr']=$_POST['content'];
}else{
    $pErr['prod_id']='недопустимое prod_id';
}

if(isset($pErr)){
    $pErr['common']=false;
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProduct.php");
}else{
    if($E_rd->updateOne()){
        $pErr['common']=true;
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editProdDescr.php");
    }else{
        $appRJ->errors['XXX']['description']="ошибка не обработана: update prod long descr error";
    }
}