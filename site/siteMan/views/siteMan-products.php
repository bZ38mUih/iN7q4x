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


$prodOnPage = 20;
$curPage = 1;

if($_GET['prodOnPage']){
    $prodOnPage = $_GET['prodOnPage'];
}
if($_GET['newPodPage']){
    $curPage = $_GET['newPodPage'];
}


$select_query = "select prodList_dt.*, prodCat_dt.catName from prodList_dt ".
    "left join prodCat_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id order by prodList_dt.prod_id desc LIMIT ".(($curPage-1)*$prodOnPage).", ".$prodOnPage;

$select_count_qry = "select prodList_dt.*, prodCat_dt.catName from prodList_dt ".
    "left join prodCat_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id";


$select_count_res = $DB->doQuery($select_count_qry);

$pod_count = mysql_num_rows($select_count_res);

$select_res=$DB->doQuery($select_query);

$appRJ->response['result'].= "<div class='manFrame'>".
    "<div class='manTopPanel'><div class='itemsCount'>Всего: <span>".$pod_count."</span> записей</div>".
    "<div class='newItem'><a href='/siteMan/newProduct'><img src='/source/img/create-icon.png'>".
    "Создать саженец</a></div></div>";
if($pod_count>0){


    $tPage = 1;
    $pages_text.="<div class='pgn' style='margin-bottom: 1em;'><div class='pgn-num'>Стр. ";
    while ($pod_count - $prodOnPage*($tPage-1) >=0){

        $pages_text .= "<a href='?newPodPage=".$tPage."&prodOnPage=".$prodOnPage."' ";
        if($tPage == $curPage){
            $pages_text.="class='active'";
        }
        $pages_text.=">".$tPage."</a>, ";
        $tPage++;
    }

    $pages_text = substr($pages_text, 0 , strlen($pages_text)-2);
    $pages_text.="</div><div class='pgn-on'>по <a href='?prodOnPage=10' ";
    if($prodOnPage == 10){
        $pages_text.=" class='active'";
    }
    $pages_text.=">10</a>, <a href='?prodOnPage=20'";
    if($prodOnPage == 20){
        $pages_text.=" class='active'";
    }
    $pages_text.=">20</a>, <a href='?prodOnPage=50'";
    if($prodOnPage == 50){
        $pages_text.=" class='active'";
    }
    $pages_text.=">50</a></div></div>";


    //$newProd_txt.=$pages_text;


    $appRJ->response['result'].= $pages_text."<div class='item-line caption'>".
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
            $appRJ->response['result'].= "<a href='/siteMan/editCat/?cat_id=".$select_row['prodCat_id']."' title='".$select_row['catName']."'>".$select_row['prodCat_id']."</a>";
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
        if($select_row['longDescr']){
            $appRJ->response['result'].= "Задано - Ok!";
        }else{
            $appRJ->response['result'].= "<b>ОПИСАНИЕ НЕ ЗАДАНО</b>";
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
$appRJ->response['result'].= "</body></html>";