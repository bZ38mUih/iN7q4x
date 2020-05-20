<?php
$Cat_rd = new recordDefault("prodCat_dt", "prodCat_id");
if(isset($_GET['cat_id']) and $_GET['cat_id']!=null){
    $Cat_rd->result['prodCat_id'] = $_GET['cat_id'];
    $Cat_rd->copyOne();
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

    $Cat_rd->result['catDescr']=$_POST['catDescr'];
    if(empty($_POST['catDescr'])){
        $catErr['catDescr']='недопустимый заголовок';
    }

    $Cat_rd->result['catMeta']=$_POST['content'];

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
}else{
    $catErr['glCat_id']='недопустимое cat_id';
}
if(isset($catErr)){
    $catErr['common']=false;
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editCat.php");
}else{
    if($Cat_rd->updateOne()){
        $catErr['common']=true;
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/views/siteMan-editCat.php");
    }else{
        $appRJ->errors['XXX']['description']="ошибка не обработана: insert into prodCat error";
    }
}