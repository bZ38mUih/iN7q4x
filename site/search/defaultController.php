<?php
if($_GET['sTemplate']){
    $appRJ->response['format']='ajax';
    if($_GET['sTemplate'] != ''){
        $prodWhere = " and prodList_dt.activeFlag is true";
        if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
            $prodWhere = null;
            $catWhere = null;
        }
        //$findProd_qry = "select * from prodList_dt where prodName like '%".$_GET['sTemplate']."%'";
        $findProd_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
            "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
            "where (LOWER(prodList_dt.prodName) like '%".strtolower($_GET['sTemplate'])."%' or LOWER(prodList_dt.prodAlias) like '%".strtolower($_GET['sTemplate'])."%' ".$prodWhere." group by prodList_dt.prod_id";
        $findProd_res = $DB->doQuery($findProd_qry);
        if(mysql_num_rows($findProd_res) > 0){
            $appRJ->response['result'] = "в Саженцах: ".mysql_num_rows($findProd_res);
            while ($findProd_row = $DB->doFetchRow($findProd_res)){
                $appRJ->response['result'] .= "<div class='find-line'>";
                if($findProd_row['prodImg']){
                    $appRJ->response['result'] .= "<div class='fl-img'><img src='".GL_PROD_IMG_PAPH."/".$findProd_row['prod_id'].
                        "/preview/".$findProd_row['prodImg']."'>";
                }else{
                    $appRJ->response['result'] .= "<img src='/data/default-img.png'>";
                }

                $appRJ->response['result'] .= "</div><div class='fl-text'><a href='/product/".$findProd_row['prodAlias']."'>".$findProd_row['prodName']."</a>";
                if($findProd_row['minPrice']){
                    $appRJ->response['result'] .= "<span class='minPrice'>".$findProd_row['minPrice']."</span>";
                }
                $appRJ->response['result'] .= "</div></div>";
            }
        }else{
            $appRJ->response['result'] = "<span class='err'>Ничего не найдено</span>";
        }
        //$appRJ->response['result'] = "<span class='err'>Условия поиска не заданы222</span>";

    }else{
        $appRJ->response['result'] = "<span class='err'>Условия поиска не заданы</span>";
    }

}else{
    $appRJ->response['result'] = "<span class='err'>Условия поиска не заданы</span>";
}