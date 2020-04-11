<?php
$delImg['result'] = false;
$delImg['data'] = null;
$E_rd = new recordDefault("prodList_dt", "prodList_id");
$E_rd->result['prod_id']=$_GET['delProdImg'];
if($E_rd->copyOne()){
    unlink ($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/".$E_rd->result['prodImg']);
    unlink ($_SERVER["DOCUMENT_ROOT"].GL_PROD_IMG_PAPH.$E_rd->result['prod_id']."/preview/".$E_rd->result['prodImg']);
    $E_rd->result['prodImg']=null;
    if($E_rd->updateOne()){
        $delImg['result'] = true;
        $delImg['data'] = "<img src='/data/default-img.png'>";
    }else{
        $delImg['data'] = "обновление неудачно";
    }
}else{
    $delImg['data'] = "неправильные параметры запроса cat_id";
}
$appRJ->response['format']='json';
$appRJ->response['result'] = $delImg;