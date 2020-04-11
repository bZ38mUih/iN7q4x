<?php
$editImg['result'] = false;
$editImg['data'] = null;
$E_rd = new recordDefault("prodList_dt", "prod_id");
$E_rd->result['prod_id']=$_POST['prod_id'];
if($E_rd->copyOne()){
    if (!file_exists($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id'])) {
        mkdir($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id'], 0777, true);
    }
    if (!file_exists($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview")) {
        mkdir($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview", 0777, true);
    }
    foreach ($_FILES as $file){
        if ($file['error'] !== 0){
        }else{
            if($E_rd->result['prodImg']){
                unlink ($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/".$E_rd->result['prodImg']);
                unlink ($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview/".$E_rd->result['prodImg']);
            }
            $path_parts = pathinfo(basename($file['name']));
            $E_rd->result['prodImg']=uniqid().".".$path_parts['extension'];
            if (move_uploaded_file($file['tmp_name'], $_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.
                $E_rd->result['prod_id']."/".$E_rd->result['prodImg'])) {
                /*create preview-->*/
                require_once ($_SERVER['DOCUMENT_ROOT']."/source/imageLib_class.php");
                $imageLib=new imageLib();
                $imageLib->createPreview(
                    $_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/".$E_rd->result['prodImg'],
                    $_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview/".$E_rd->result['prodImg'], 600, 600);
                /*<--create preview*/
                if($E_rd->updateOne()){
                    $editImg['result'] = true;
                    $editImg['data'] = "<img src='".GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview/".$E_rd->result['prodImg']."'>";
                }
            } else {
                $editImg['data']= "Возможная атака с помощью файловой загрузки!\n";
            }
        }
    }
}else{
    $editImg['data'] = "неправильный cat_id 2";
}
$appRJ->response['format']='json';
$appRJ->response['result'] = $editImg;