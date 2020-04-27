<?php
$h1 ="Саженец, правка";
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Саженец, правка' http-equiv='Content-Type'/>".
    "<meta name='robots' content='noindex'>".
    "<title>Саженец, правка</title>".
    "<link rel='SHORTCUT ICON' href='/site/siteMan/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<link rel='stylesheet' href='/site/css/subMenu.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/manForm.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/contentMenu.css' type='text/css' media='screen, projection'/>".
    "<script type='text/javascript' src='/site/js/manForm.js'></script>".
    "<script src='/source/js/tinymce/js/tinymce/tinymce.min.js'></script>".
    "<script src='/site/siteMan/js/main.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>".
    "</head><body>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'>";
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-subMenu.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-prodMenu.php");
$appRJ->response['result'].= "<form class='editImg'><div class='img-frame'>";
$delImgBtn_text=null;
if($E_rd->result['prodImg']){
    $appRJ->response['result'].= "<img src='".GL_PROD_IMG_PAPH.$_GET['prod_id']."/preview/".$E_rd->result['prodImg']."'>";
    $delImgBtn_text= "class='active'";
}else{
    $appRJ->response['result'].= "<img src='/data/default-img.png'>";
}
$appRJ->response['result'].= "</div>".
    "<div class='control-frame'><div class='delImg-line'>".
    "<span onclick='delImg(".$_GET['prod_id'].", ".'"'."delCatImg".'"'.")' ".$delImgBtn_text.">".
    "<img src='/source/img/drop-icon.png'>Удалить картинку</span></div>".
    "<div class='button-line'><input type='file' onchange='loadFiles(".$_GET['prod_id'].", ".'"'."prod_id".
    '"'.")' accept='image/jpeg,image/png,image/gif'></div>".
    "<div class='err-line'></div></div></form>".

    "<form class='newCateg' method='post'>";
if(isset($pErr['common']) and $pErr['common']===true){
    $appRJ->response['result'].= "<div class='results success'>Updated SUCCESS</div>";
}if(isset($pErr['common']) and $pErr['common']===false){
    $appRJ->response['result'].= "<div class='results fail'>Updated FAIL</div>";
    print_r($pErr);
}
$appRJ->response['result'].= "<input type='hidden' name='flagField' value='editProduct'>".
    "<div class='input-line'><label for='prod_id'>prod_id:</label>".
    "<input type='text' name='prod_id' value='".$E_rd->result['prod_id']."' disabled></div>".
    "<div class='input-line'><label for='prodName'>Название:</label>".
    "<input type='text' name='prodName' id='targetName' ";
if($E_rd->result['prodName']){
    $appRJ->response['result'].= "value='".$E_rd->result['prodName']."'";
}
$appRJ->response['result'].= "><div class='field-err'>";
if(isset($pErr['prodName'])){
    $appRJ->response['result'].= $pErr['prodName'];
}
$appRJ->response['result'].= "</div></div>".
    "<div class='input-line'><label for='prodAlias'>Alias:</label>".
    "<input type='text' name='prodAlias' id='targetAlias' ";
if($E_rd->result['prodAlias']){
    $appRJ->response['result'].= "value='".$E_rd->result['prodAlias']."'";
}
$appRJ->response['result'].= "><input type='button' onclick='mkAlias()' value='mkAlias'>".
    "<div class='field-err'>";
if(isset($pErr['prodAlias'])){
    $appRJ->response['result'].= $pErr['prodAlias'];
}
$appRJ->response['result'].= "</div></div>";
/*
    "<div class='input-line'><label for='prodDescr'>Кр. описание:</label>".
    "<textarea rows='3' name='prodDescr'>". $E_rd->result['prodDescr'].
    "</textarea><div class='field-err'>";
if(isset($pErr['prodDescr'])){
    $appRJ->response['result'].= $pErr['prodDescr'];
}
$appRJ->response['result'].= "</div></div>";
*/
    $appRJ->response['result'].="<div class='input-line'><label for='prodCat_id'>prodCat_id:</label><select name='prodCat_id'>";
/*select options-->*/
$categList_text="select prodCat_id, prodCat_parId, catName from prodCat_dt ORDER BY catName ";
$categList_res=$DB->doQuery($categList_text);
if(mysql_num_rows($categList_res)>0){
    $findSelected=false;
    while ($categList_row=$DB->doFetchRow($categList_res)){
        $catSelectOptions.= "<option value='".$categList_row['prodCat_id']."' ";
        if($categList_row['prodCat_id'] == $E_rd->result['prodCat_id']){
            $findSelected=true;
            $catSelectOptions.= " selected";
        }
        $catSelectOptions.= ">".$categList_row['catName']."</option>";
    }
    if($findSelected){
        $catSelectOptions="<option value='none'>---</option>".$catSelectOptions;
    }else{
        $catSelectOptions="<option value='none' selected>---</option>".$catSelectOptions;
    }
}else{
    $catSelectOptions="<option value='none' selected>---</option>";
}
/*<--select options*/
$appRJ->response['result'].= $catSelectOptions."</select></div>".

    "<div class='input-line'><label for='activeFlag'>Показывать:</label><input type='checkbox' name='activeFlag' ";
if($E_rd->result['activeFlag']){
    $appRJ->response['result'].= "checked";
}
$appRJ->response['result'].= "></div>".
    "<div class='input-line'><label for='newFlag'>Новый:</label><input type='checkbox' name='newFlag' ";
if($E_rd->result['newFlag']){
    $appRJ->response['result'].= "checked";
}
$appRJ->response['result'].= "></div>".
    "<div class='input-line ta-left'><label for='content'>Длинное описание саженца:</label></div>";
$appRJ->response['result'].="<textarea name='content'>".
    $E_rd->result['longDescr']."</textarea>".

"<div class='input-line'><input type='submit' value='save'></div></form></div></div></div>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");

$appRJ->response['result'].= "</body></html>";