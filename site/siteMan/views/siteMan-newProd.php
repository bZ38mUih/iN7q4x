<?php
$h1 ="Создание саженца";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Создание саженца'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Создание саженца</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<script type='text/javascript' src='/site/js/manForm.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
$appRJ->response['result'].= "<form class='newCateg' method='post'>".
    "<h3>Создание саженца</h3>".
    "<input type='hidden' name='flagField' value='newProd'>".
    "<div class='input-line'><label for='catName'>Название:</label>".
    "<input type='text' name='prodName' id='targetName' ";
if($Prod_rd->result['prodName']){
    $appRJ->response['result'].= "value='".$Prod_rd->result['prodName']."'";
}
$appRJ->response['result'].= "><div class='field-err'>";
if(isset($pErr['prodName'])){
    $appRJ->response['result'].= $pErr['prodName'];
}
$appRJ->response['result'].= "</div></div><div class='input-line'><label for='prodAlias'>Alias:</label>".
    "<input type='text' name='prodAlias' id='targetAlias' ";
if($Prod_rd->result['prodAlias']){
    $appRJ->response['result'].= "value='".$Prod_rd->result['prodAlias']."'";
}
$appRJ->response['result'].= "><input type='button' onclick='mkAlias()' value='mkCatAlias'><div class='field-err'>";
if(isset($pErr['prodAlias'])){
    $appRJ->response['result'].= $pErr['prodAlias'];
}
$appRJ->response['result'].= "</div></div><div class='input-line'><label for='prodDescr'>Заголовок:</label>".
    "<input type='text' name='prodDescr' value='".$Prod_rd->result['prodDescr']."'><div class='field-err'>";
if(isset($pErr['prodDescr'])){
    $appRJ->response['result'].= $pErr['prodDescr'];
}
$appRJ->response['result'].= "</div></div><div class='input-line'><label for='prodCat_id'>Категория товара:</label>".
    "<select name='prodCat_id'>";
/*select options-->*/
$categList_text="select prodCat_id, prodCat_parId, catName from prodCat_dt ORDER BY catName ";
$categList_res=$DB->doQuery($categList_text);
if(mysql_num_rows($categList_res)>0){
    $findSelected=false;
    while ($categList_row=$DB->doFetchRow($categList_res)){
        $catSelect.= "<option value='".$categList_row['prodCat_id']."' ";
        if($categList_row['prodCat_id'] == $Prod_rd->result['prodCat_id']){
            $findSelected=true;
            $catSelect.= " selected";
        }
        $catSelect.= ">".$categList_row['catName']."</option>";
    }
    if($findSelected){
        $catSelect="<option value='none'>---</option>".$catSelect;
    }else{
        $catSelect="<option value='none' selected>---</option>".$catSelect;
    }
}else{
    $catSelect="<option value='none' selected>---</option>";
}
/*<--select options*/

$appRJ->response['result'].= $catSelect."</select></div>".
    "<div class='input-line'>".
    "<label for='newFlag'>Новый:</label><input type='checkbox' name='newFlag' ";
if($Prod_rd->result['newFlag']){
    $appRJ->response['result'].= "checked";
}
$appRJ->response['result'].= "></div>".
    "<div class='input-line'>".
    "<label for='activeFlag'>Показывать:</label><input type='checkbox' name='activeFlag' ";
if($Prod_rd->result['activeFlag']){
    $appRJ->response['result'].= "checked";
}
$appRJ->response['result'].= "></div><div class='input-line'><input type='submit' value='addNew'></div></form>".
    "</div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";