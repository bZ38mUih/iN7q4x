<?php
//echo "<pre>";
//print_r($_POST);
if($_POST){

    if(isset($_POST['flagField']) and $_POST['flagField']=='newCat'){
        require_once($_SERVER['DOCUMENT_ROOT']."/site/siteMan/actions/siteMan-newCat.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editCat') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editCat_post.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editCatLongDescr') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editCatLongDescr_post.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editProdLongDescr') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editProdLongDescr_post.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='newProd'){
        require_once($_SERVER['DOCUMENT_ROOT']."/site/siteMan/actions/siteMan-newProd.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editProduct') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editProd_post.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editProdPrice') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editProdPrice_post.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='newMemo') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-newMemo.php");
    }
    elseif (isset($_POST['cat_id']) and $_POST['cat_id']!==null){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editCatImg.php");
    }
    elseif (isset($_POST['prod_id']) and $_POST['prod_id']!==null){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editProdImg.php");
    }elseif($_POST['changePass']){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-changePass.php");
    }elseif ($_POST['resetPass']){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-resetPass.php");
    }elseif ($_POST['changeMail']){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-changeMail.php");
    }
}
elseif (isset($_GET['delProdImg']) and $_GET['delProdImg']!=null){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-delProdImg.php");
}

elseif (isset($_GET['delCatImg']) and $_GET['delCatImg']!=null){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-delCatImg.php");
}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="newcat"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newCat.php");
}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="newcat"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newCat.php");
}

elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="editcat"){
    if(empty($appRJ->server['reqUri_expl'][3])){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-editCat_get.php");
    }elseif($appRJ->server['reqUri_expl'][3] == 'longDescr'){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-editCatLongDescr.php");
        //echo 111;
        //exit;
    }else{
        $appRJ->errors['404']['description']='неправильные параметры url cat';
    }

}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="products"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-products.php");
}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="newproduct"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newProd.php");
}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="newmemo"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-newMemo.php");
}
elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="editproduct"){
    if(empty($appRJ->server['reqUri_expl'][3])){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-editProd_get.php");
    }elseif($appRJ->server['reqUri_expl'][3] == 'price'){
        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-editPrice_get.php");
    }elseif($appRJ->server['reqUri_expl'][3] == 'longDescr'){

        require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMan-editProdLongDescr.php");
        //echo 111;
        //exit;
    }else{
        $appRJ->errors['404']['description']='неправильные параметры url product';
    }

}elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="sitemap"){
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/actions/siteMap.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-siteMap.php");
}elseif(isset($appRJ->server['reqUri_expl'][2]) and strtolower($appRJ->server['reqUri_expl'][2])=="avatar"){


    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteMan/views/siteMan-avatar.php");
}
else{
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-defView.php");
}
