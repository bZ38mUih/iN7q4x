<?php
$appRJ->response['result'].= "<div class='contentMenu'><div class='contentMenu-links'>".
    "<a href='/siteMan/editProduct/?prod_id=".$_GET['prod_id']."'";
if(!$appRJ->server['reqUri_expl'][3]){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Карт.-Назв.</a>";
/*
    "<a href='/siteMan/editProduct/longDescr/?prod_id=".$_GET['prod_id']."'";
if(isset($appRJ->server['reqUri_expl'][3]) and strtolower($appRJ->server['reqUri_expl'][3])=='longdescr'){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Длинное описание</a>"*/
$appRJ->response['result'].="<a href='/siteMan/editProduct/price/?prod_id=".$_GET['prod_id']."'";
if(isset($appRJ->server['reqUri_expl'][3]) and strtolower($appRJ->server['reqUri_expl'][3])=='price'){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Цены</a>".
/*.

       "<a href='/siteMan/editCat/remove?cat_id=".$_GET['cat_id']."'";
if(isset($appRJ->server['reqUri_expl'][3]) and strtolower($appRJ->server['reqUri_expl'][3])=='remove'){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Удаление</a>*/"</div><div class='contentMenu-img'>";
if($E_rd->result['prodImg']){
    $appRJ->response['result'].= "<img src='".GL_PROD_IMG_PAPH.$_GET['prod_id']."/preview/".$E_rd->result['prodImg']."' ";
    $appRJ->response['result'].=">";
    $delImgBtn_text= "class='active'";
}else{
    $appRJ->response['result'].= "<img src='/data/default-img.png'>";
}
$appRJ->response['result'].= "<span>".$E_rd->result['prodName']."</span></div></div>";