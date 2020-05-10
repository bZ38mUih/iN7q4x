<?php
$h1 ="Карта сайта";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Карту сайта используют поисковые роботы, она важна для продвижения, на ней размещаются ссылки на все открытые для доступа страницы.'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Карта сайта</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    //"<link rel='stylesheet' href='/site/css/manFrame.css' type='text/css' media='screen, projection'/>".
    /*toDo move to common styles-->*/
    //"<link rel='stylesheet' href='/site/siteMan/css/dwlMan.css' type='text/css' media='screen, projection'/>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
/*
$s_qry = "select * from memoNotes_dt INNER JOIN prodCat_dt on memoNotes_dt.prodCat_id = prodCat_dt.prodCat_id ".
    "order by prodCat_dt.catName";
$s_res=$DB->doQuery($s_qry);
$sCount=0;
if(mysql_num_rows($s_res)>0){
    $sCount=mysql_num_rows($s_res);
}
$appRJ->response['result'].= "<div class='manFrame'>".
    "<div class='manTopPanel'><div class='itemsCount'>Всего: <span>".$sCount."</span> записей</div>".
    "<div class='newItem'><a href='/siteMan/newMemo'><img src='/source/img/create-icon.png'>".
    "Создать памятку</a></div></div>";
if($sCount>0){
    $appRJ->response['result'].= "<div class='item-line caption'>".
        "<div class='item-line-id'>cat_id</div>".
        "<div class='item-line-par_id'>catPar_id</div>".
        "<div class='item-line-img'>catImg</div>".
        "<div class='item-line-name'>catName</div>".
        "<div class='item-line-alias'>catAlias</div>".
        "<div class='item-line-descr'>catDescr</div>".
        "<div class='item-line-flag'>actFlag</div></div>";
    while ($s_row=$DB->doFetchRow($s_res)){
        $appRJ->response['result'].= "<div class='item-line'>".
            "<div class='item-line-id'>".
            "<a href='/siteMan/editCat/?cat_id=".$s_row['prodCat_id']."'>".
            $s_row['prodCat_id']."</a></div>".
            "<div class='item-line-par_id'>";
        if($s_row['prodCat_parId']){
            $appRJ->response['result'].= "<a href='/siteMan/editCat/?cat_id=".$s_row['prodCat_parId']."'>".$s_row['prodCat_parId']."</a>";
        }else{
            $appRJ->response['result'].= "-";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-img'>";
        if($s_row['catImg']){
            $appRJ->response['result'].= "<img src='".GL_CATEG_IMG_PAPH.$s_row['prodCat_id']."/preview/".$s_row['catImg']."'>";
        }else{
            $appRJ->response['result'].= "<img src='/data/default-img.png'>";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-name'>". $s_row['catName']."</div>".
            "<div class='item-line-alias'>".$s_row['catAlias']."</div>".
            "<div class='item-line-descr'>";
        if($s_row['catDescr']){
            $appRJ->response['result'].= mb_substr($s_row['catDescr'],0, 20, 'UTF-8')." ...";
        }else{
            $appRJ->response['result'].= "-";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-flag'>";
        $appRJ->response['result'].= "<input type='checkbox' ";
        if($s_row['catActive']){
            $appRJ->response['result'].= "checked";
        }
        $appRJ->response['result'].= " disabled></div></div>";
    }
}else{
    $appRJ->response['result'].= "не создано ни одной памятки<br>";
}
$appRJ->response['result'].= "</div>";
*/
$appRJ->response['result'].="<div style='text-align: left; width: 90%; margin-left: 5%;'>";
$appRJ->response['result'].= $site_map_text;
$appRJ->response['result'].="</div>";
$appRJ->response['result'].= "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
$appRJ->response['result'].= "</body></html>";