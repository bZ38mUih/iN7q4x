<?php
$E_rd = new recordDefault("prodCat_dt", "prodCat_id");
if(isset($_GET['cat_id']) and $_GET['cat_id']!=null){
    $E_rd->result['prodCat_id'] = $_GET['cat_id'];
    $E_rd->copyOne();
    if(isset($_POST['catName']) and $_POST['catName']!=null){
        $E_rd->result['catName']=htmlspecialchars($_POST['catName']);
    }else{
        $pErr['catName']='недопустимое название категории';
    }
    if(isset($_POST['catAlias']) and $_POST['catAlias']!=null){
        $E_rd->result['catAlias']=htmlspecialchars($_POST['catAlias']);
    }else{
        $pErr['catAlias']='недопустимый alias';
    }

    $E_rd->result['catDescr']=htmlspecialchars($_POST['catDescr']);
    if(empty($_POST['catDescr'])){
        $pErr['catDescr']='недопустимый заголовок';
    }

    if($_POST['catMeta']){
        $E_rd->result['catMeta']=htmlspecialchars($_POST['catMeta']);
    }else{
        $E_rd->result['catMeta']= null;
    }


    if(isset($_POST['prodCat_parId'])){
        if($_POST['prodCat_parId'] == 'none'){
            $E_rd->result['prodCat_parId']=null;
        }else{
            $E_rd->result['prodCat_parId']=$_POST['prodCat_parId'];
        }
    }
    if(isset($_POST['popFlag']) and $_POST['popFlag']=='on'){
        $E_rd->result['popFlag']=true;
    }else{
        $E_rd->result['popFlag']=false;
    }
    if(isset($_POST['catActive']) and $_POST['catActive']=='on'){
        $E_rd->result['catActive']=true;
    }else{
        $E_rd->result['catActive']=false;
    }
    if(isset($_POST['catIndex']) and $_POST['catIndex']=='on'){
        $E_rd->result['catIndex']=true;
    }else{
        $E_rd->result['catIndex']=false;
    }
}else{
    $pErr['glCat_id']='недопустимое cat_id';
}
if(isset($pErr)){
    $pErr['common']=false;
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editCat.php");
}else{
    if($E_rd->updateOne()){
        $pErr['common']=true;
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editCat.php");
    }else{
        $appRJ->errors['XXX']['description']="ошибка не обработана: insert into prodCat error";
    }
}