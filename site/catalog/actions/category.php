<?php
if($appRJ->server['reqUri_expl'][2]){
    $find_qry = "select * from prodCat_dt where catAlias = '".$appRJ->server['reqUri_expl'][2]."' and catActive is true";
    $find_res = $DB->doQuery($find_qry);
    if(mysql_num_rows($find_res)>0){
        $find_row = $DB->doFetchRow($find_res);
        require_once($_SERVER["DOCUMENT_ROOT"]."/site/catalog/views/defaultView.php");
    }else{
        $appRJ->errors['404']['description']='неправильные параметры url catalog';
    }
}

