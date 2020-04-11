<?php
$h1 ="Саженцы";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Создание/редактирование Саженцы'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Саженцы</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manFrame.css' type='text/css' media='screen, projection'/>".
    /*toDo move to common styles-->*/
    "<link rel='stylesheet' href='/site/siteMan/css/dwlMan.css' type='text/css' media='screen, projection'/>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");




$select_query = "select * from prodList_dt";
$select_res=$DB->doQuery($select_query);
$sCount=0;
if(mysql_num_rows($select_res)>0){
    $sCount=mysql_num_rows($select_res);
}
$appRJ->response['result'].= "<div class='manFrame'>".
    "<div class='manTopPanel'><div class='itemsCount'>Всего: <span>".$sCount."</span> записей</div>".
    "<div class='newItem'><a href='/siteMan/newProduct'><img src='/source/img/create-icon.png'>".
    "Создать саженец</a></div></div>";
if($sCount>0){
    $appRJ->response['result'].= "<div class='item-line caption'>".
        "<div class='item-line-id'>prod_id</div>".
        "<div class='item-line-par_id'>cat_id</div>".
        "<div class='item-line-img'>prodImg</div>".
        "<div class='item-line-name'>prodName</div>".
        "<div class='item-line-alias'>prodAlias</div>".
        "<div class='item-line-descr'>prodDescr</div>".
        "<div class='item-line-flag'>activeFlag</div></div>";
    while ($select_row=$DB->doFetchRow($select_res)){
        $appRJ->response['result'].= "<div class='item-line'>".
            "<div class='item-line-id'>".
            "<a href='/siteMan/editProduct/?prod_id=".$select_row['prod_id']."'>".
            $select_row['prod_id']."</a></div>".
            "<div class='item-line-par_id'>";
        if($select_row['prodCat_id']){
            $appRJ->response['result'].= "<a href='/siteMan/editCat/?cat_id=".$select_row['prodCat_id']."'>".$select_row['prodCat_id']."</a>";
        }else{
            $appRJ->response['result'].= "-";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-img'>";
        if($select_row['prodImg']){
            $appRJ->response['result'].= "<img src='".GL_PROD_IMG_PAPH.$select_row['prod_id']."/preview/".$select_row['prodImg']."'>";
        }else{
            $appRJ->response['result'].= "<img src='/data/default-img.png'>";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-name'>". $select_row['prodName']."</div>".
            "<div class='item-line-alias'>".$select_row['prodAlias']."</div>".
            "<div class='item-line-descr'>";
        if($select_row['prodDescr']){
            $appRJ->response['result'].= mb_substr($select_row['prodDescr'],0, 20, 'UTF-8')." ...";
        }else{
            $appRJ->response['result'].= "-";
        }
        $appRJ->response['result'].= "</div>".
            "<div class='item-line-flag'>";
        $appRJ->response['result'].= "<input type='checkbox' ";
        if($select_row['activeFlag']){
            $appRJ->response['result'].= "checked";
        }
        $appRJ->response['result'].= " disabled></div></div>";
    }
}else{
    $appRJ->response['result'].= "there is no categ there<br>";
}
$appRJ->response['result'].= "</div>";

$appRJ->response['result'].= "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";