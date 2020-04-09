<?php

$catErr=null;

$Cat_rd = new recordDefault("prodCat_dt", "prodCat_id");

if(isset($_POST['catName']) and $_POST['catName']!=null){
    //$catName_err =
    $Cat_rd->result['catName']=htmlspecialchars($_POST['catName']);
}else{
    $catErr['catName']='недопустимое название категории';
}

if(isset($_POST['catAlias']) and $_POST['catAlias']!=null){
    $Cat_rd->result['catAlias']=htmlspecialchars($_POST['catAlias']);
}else{
    $catErr['catAlias']='недопустимый alias';
}
if(isset($_POST['catDescr']) and $_POST['catDescr']!=null){
    $Cat_rd->result['catDescr']=htmlspecialchars($_POST['catDescr']);
}else{
    $catErr['catDescr']='недопустимое описание';
}

if(isset($_POST['prodCat_parId'])){

    if($_POST['prodCat_parId'] == 'none'){
        $Cat_rd->result['prodCat_parId']=null;
    }else{
        $Cat_rd->result['prodCat_parId']=$_POST['prodCat_parId'];
    }
}else{

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

if(isset($catErr)){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newCat.php");
}else{
    if($Cat_rd->putOne()){
        $page = "Location: /siteMan/editCat/?cat_id=".$Cat_rd->result['prodCat_id'];
        header($page);
    }else{
        $appRJ->errors["XXX"]["description"]="insert into prodCat err";
    }
}