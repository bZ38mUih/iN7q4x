<?php
$appRJ->response['result'].= "<div class='contentMenu'><div class='contentMenu-links'>".
    "<a href='/siteMan/editCat/?cat_id=".$_GET['cat_id']."'";
if(!$appRJ->server['reqUri_expl'][3]){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Карт.-Назв.</a>".
    "<a href='/siteMan/editCat/longDescr/?cat_id=".$_GET['cat_id']."'";
if(isset($appRJ->server['reqUri_expl'][3]) and strtolower($appRJ->server['reqUri_expl'][3])=='longdescr'){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Длинное описание</a>".
/*.

       "<a href='/siteMan/editCat/remove?cat_id=".$_GET['cat_id']."'";
if(isset($appRJ->server['reqUri_expl'][3]) and strtolower($appRJ->server['reqUri_expl'][3])=='remove'){
    $appRJ->response['result'].= " class='active'";
}
$appRJ->response['result'].= ">Удаление</a>*/"</div><div class='contentMenu-img'>";
if($Cat_rd->result['catImg']){
    $appRJ->response['result'].= "<img src='".GL_CATEG_IMG_PAPH.$_GET['cat_id']."/preview/".$Cat_rd->result['catImg']."' ";
    $appRJ->response['result'].=">";
    $delImgBtn_text= "class='active'";
}else{
    $appRJ->response['result'].= "<img src='/data/default-img.png'>";
}
$appRJ->response['result'].= "<span>".$Cat_rd->result['catName']."</span></div></div>";