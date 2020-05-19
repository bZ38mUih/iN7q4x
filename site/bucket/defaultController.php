<?php
//unset($_SESSION['bucket']);
$appRJ->response['format'] = 'ajax';
if($_POST['bucket'] == 'addBucket'){
    $p_age = explode(",", $_POST['prod_age']);
    if($_SESSION['bucket'][$_POST['prod_id']][$p_age['0']]){
        $_SESSION['bucket'][$_POST['prod_id']][$p_age['0']]+= $_POST['qty'];
    }else{
        $_SESSION['bucket'][$_POST['prod_id']][$p_age['0']] = $_POST['qty'];
    }

    if($_SESSION['bucket'][$_POST['prod_id']][$p_age['0']] == 0){
        unset($_SESSION['bucket'][$_POST['prod_id']][$p_age['0']]);
    }

    foreach ($_SESSION['bucket'] as $product_id=>$product_age){
        if(!$product_age){
            unset($_SESSION['bucket'][$product_id]);
        }
    }
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/bucket/views/bucket.php");
    $appRJ->response['format']='json';
    $appRJ->response['result']['content'] = $bucket_txt;
    $appRJ->response['result']['amount'] = $bucket_amount;
    $appRJ->response['result']['count'] = $prod_count;

}elseif($_POST['bucket'] == 'removeProduct'){
    $p_age = explode(",", $_POST['prod_age']);
    unset($_SESSION['bucket'][$_POST['prod_id']][$p_age['0']]);
    foreach ($_SESSION['bucket'] as $product_id=>$product_age){
        if(!$product_age){
            unset($_SESSION['bucket'][$product_id]);
        }
    }

    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/bucket/views/bucket.php");

    $appRJ->response['format']='json';
    $appRJ->response['result']['content'] = $bucket_txt;
    $appRJ->response['result']['amount'] = $bucket_amount;
    $appRJ->response['result']['count'] = $prod_count;
}elseif ($_POST['bucket'] == "clearBucket"){
    unset($_SESSION['bucket']);

    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/bucket/views/bucket.php");
    $appRJ->response['format']='json';
    $appRJ->response['result']['content'] = $bucket_txt;
    $appRJ->response['result']['amount'] = $bucket_amount;
    $appRJ->response['result']['count'] = $prod_count;
}
else{
    $appRJ->errors['stab']['description']="Для оформления заказа позвоните по телефону. Идет отладка и заказ из корзины пока недоступен.";
    //echo "xxx";
}