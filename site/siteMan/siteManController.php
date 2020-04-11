<?php

if($_POST){

    if(isset($_POST['flagField']) and $_POST['flagField']=='newCat'){
        require_once($_SERVER['DOCUMENT_ROOT']."/site/siteMan/actions/siteMan-newCat.php");
    }
    /*
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='newAlbum'){
        require_once($_SERVER['DOCUMENT_ROOT']."/site/gallery/actions/glMan-newAlbum.php");
    }
    */
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
    /*
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editAlbum') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-editAlbum.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='editAlbumAccess') {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-editAlbumAccess.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='delAlbAttach'
        and isset($_POST['photo_id']) and $_POST['photo_id']!=null) {
        $appRJ->response['format']='ajax';
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-delPhotoAttach.php");
    }elseif(isset($_POST['flagField']) and $_POST['flagField']=='delAlbVideoAttach'
        and isset($_POST['video_id']) and $_POST['video_id']!=null) {
        $appRJ->response['format']='ajax';
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-delVideoAttach.php");
    }
    elseif(isset($_POST['flagField']) and $_POST['flagField']=='updateAlbAttach'
        and isset($_POST['photo_id']) and $_POST['photo_id']!=null) {
        $appRJ->response['format']='ajax';
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-updatePhotoAttach.php");
    }elseif(isset($_POST['flagField']) and $_POST['flagField']=='updateVideoAttach'
        and isset($_POST['video_id']) and $_POST['video_id']!=null) {
        $appRJ->response['format']='ajax';
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-updateVideoAttach.php");
    }
    */
    elseif (isset($_POST['cat_id']) and $_POST['cat_id']!==null){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editCatImg.php");
    }
    elseif (isset($_POST['prod_id']) and $_POST['prod_id']!==null){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-editProdImg.php");
    }
    /*
    elseif (isset($_POST['alb_id']) and $_POST['alb_id']!==null){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-editAlbumImg.php");
    }
    elseif (isset($_POST['fieldName']) and $_POST['fieldName']=='alb_id' and isset($_POST['fieldId']) and
        $_POST['fieldId']!=null){
        $appRJ->response['format']='ajax';
        //if()
        require_once ($_SERVER["DOCUMENT_ROOT"]."/site/gallery/actions/glMan-addPhotos.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/views/glMan-photoAttachForm.php");
    }elseif (isset($_POST['fieldName']) and $_POST['fieldName']=='video' and isset($_POST['fieldId']) and
        $_POST['fieldId']!=null and isset($_POST['videoName']) and $_POST['videoName']!=null){
        $appRJ->response['format']='ajax';
        require_once ($_SERVER["DOCUMENT_ROOT"]."/site/gallery/actions/glMan-addVideo.php");
    }
    elseif($_POST['reAssignCateg'] == 'y'){
        $ajaxRes['err']=0;
        $ajaxRes['data']= null;
        $glCat_rd = new recordDefault("galleryMenu_dt", "glCat_id");
        $glCat_rd->result['glCat_id'] = $_POST['glCat_id'];
        $glPhoto = new recordDefault("galleryPhotos_dt", "photo_id");
        $glPhoto->result['photo_id'] = $_POST['photo_id'];
        if($glCat_rd->copyOne()){
            if($glPhoto->copyOne()){
                $albumsInCateg_qry = "select * from galleryAlb_dt where glCat_id = ".$glCat_rd->result['glCat_id'].
                    " order by albumName";
                $albumsInCateg_res = $DB->doQuery($albumsInCateg_qry);
                while($albumsInCateg_row=$DB->doFetchRow($albumsInCateg_res)){
                    if($albumsInCateg_row['album_id'] != $glPhoto->result['album_id']){
                        $ajaxRes['data'] .= "<option value='".$albumsInCateg_row['album_id']."'>".
                            $albumsInCateg_row['albumName']."</option>";
                    }
                    //$ajaxRes['data'] =
                }
                //echo "reAssignCateg - ok";
            }else{
                $ajaxRes['err']=1;
                $ajaxRes['data'] = "problem reAssignCateg - 2";
            }
        }else{
            $ajaxRes['err']=1;
            $ajaxRes['data'] = "problem reAssignCateg - 1";
        }
        $appRJ->response['format'] = "json";
        $appRJ->response['result'] = $ajaxRes;
        //if()
        //echo "<pre>";
        //print_r($_POST);
    }elseif($_POST['reAssignPhoto']=='y'){
        $ajaxRes['err']=0;
        $ajaxRes['data']= null;

        $glAlb_rd = new recordDefault("galleryAlb_dt", "album_id");

        $glAlb_rd->result['album_id'] = $_POST['album_id'];
        $glPhoto = new recordDefault("galleryPhotos_dt", "photo_id");
        $glPhoto->result['photo_id'] = $_POST['photo_id'];

        if($glAlb_rd->copyOne()){
            if($glPhoto->copyOne()){
                //if(copy(GL_ALBUM_IMG_PAPH."/".$glAlb_rd->result['album_id']."/photoAttach"))
                if(rename($_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glPhoto->result['album_id']."/photoAttach/".$glPhoto->result['photoLink'],
                    $_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glAlb_rd->result['album_id']."/photoAttach/".$glPhoto->result['photoLink'])){
                    if(rename($_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glPhoto->result['album_id']."/photoAttach/preview/".$glPhoto->result['photoLink'],
                        $_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glAlb_rd->result['album_id']."/photoAttach/preview/".$glPhoto->result['photoLink'])){
                        //if(unlink(GL_ALBUM_IMG_PAPH.$glPhoto->result['album_id']."/photoAttach/".$glPhoto->result['photoLink'])){
                            //if(unlink(GL_ALBUM_IMG_PAPH.$glPhoto->result['album_id']."/photoAttach/preview/".$glPhoto->result['photoLink'])){
                                $glPhoto->result['album_id'] = $glAlb_rd->result['album_id'];
                                if($glPhoto->updateOne()){
                                    //http://oc3a.local/gallery/glManager/editAlbum/photo?alb_id=264
                                    $ajaxRes['data'] = "перемещено: <a href='/gallery/glManager/editAlbum/photo?alb_id=".
                                        $glAlb_rd->result['album_id']."'>Смотреть</a>";
                                }else{
                                    $ajaxRes['err']=1;
                                    $ajaxRes['data'] = "problem reAssignPhoto - update record";
                                }
                            //}else{
                            //    $ajaxRes['err']=1;
                            //    $ajaxRes['data'] = "problem reAssignPhoto - unlink preview";
                            //}
                        //}else{
                        //    $ajaxRes['err']=1;
                        //    $ajaxRes['data'] = "problem reAssignPhoto - unlink img";
                        //}
                    }else{
                        $ajaxRes['err']=1;
                        $ajaxRes['data'] = "problem reAssignPhoto - copy preview";
                    }
                }else{
                    $ajaxRes['err']=1;
                    $ajaxRes['data'] = "problem reAssignPhoto - copy img ".$_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glPhoto->result['album_id'].
                        "/photoAttach/".$glPhoto->result['photoLink']."   xxx   ".
                        $_SERVER["DOCUMENT_ROOT"].GL_ALBUM_IMG_PAPH.$glAlb_rd->result['album_id']."/photoAttach/".$glPhoto->result['photoLink'];
                }
            }else{
                $ajaxRes['err']=1;
                $ajaxRes['data'] = "problem reAssignPhoto - 2";
            }
        }else{
            $ajaxRes['err']=1;
            $ajaxRes['data'] = "problem reAssignPhoto - 1 - id=".$glAlb_rd->result['album_id'];
        }
        $appRJ->response['format'] = "json";
        $appRJ->response['result'] = $ajaxRes;

    }
    */
}
elseif (isset($_GET['delProdImg']) and $_GET['delProdImg']!=null){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-delProdImg.php");
}

elseif (isset($_GET['delCatImg']) and $_GET['delCatImg']!=null){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/actions/siteMan-delCatImg.php");
}
/*
elseif (isset($_GET['mkAlias'])){
require_once($_SERVER['DOCUMENT_ROOT'] . "/source/accessorial_class.php");
$appRJ->response['result'].= accessorialClass::mkAlias($_GET['mkAlias']);
}
elseif (isset($_GET['uploadAlbums'])){
$appRJ->response['format']='ajax';
if($_GET['uploadAlbums']!=null){
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/gallery/actions/glMan-uploadAlbums.php");
}else{
    $appRJ->response['result'].= "folder не задано";
}

}*/
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

}
else{
    require_once($_SERVER['DOCUMENT_ROOT'] . "/site/siteMan/views/siteMan-defView.php");
}
