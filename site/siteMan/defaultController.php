<?php

define(GL_CATEG_IMG_PAPH, "/data/catalog/categories/");
define(GL_PROD_IMG_PAPH, "/data/catalog/products/");
/*
if ($_POST['setLike'] and $_POST['setLike']!=null){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/gallery/actions/setPhotoLike.php");
}
elseif(isset($_GET['writeComment']) and $_GET['writeComment']=='true'){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/gallery/actions/writeComments.php");
}
*/
/*test-->*/
/*
elseif(isset($appRJ->server['reqUri_expl'][2]) and $appRJ->server['reqUri_expl'][2]=='test') {
    require_once ($_SERVER['DOCUMENT_ROOT']."/site/gallery/test/testView.php");
}
*/
/*test<--*/
//else{
    if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/siteMan/siteManController.php");
    }else{
        $h1='требуется авторизация';
        require_once ($_SERVER["DOCUMENT_ROOT"]."/site/signIn/views/defaultView.php");
    }
//}