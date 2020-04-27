<?php
$newProd_txt = null;
$newProd_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
    "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
    " where prodList_dt.newFlag is TRUE and prodList_dt.activeFlag is true group by prodList_dt.prod_id";

$newProd_res = $DB->doQuery($newProd_qry);
if(mysql_num_rows($newProd_res)>0){
    while($newProd_row = $DB->doFetchRow($newProd_res)){
        $newProd_txt .= "<div class='catItem'>";
        if($newProd_row['prodImg']){
            $newProd_txt .= "<img src='".GL_PROD_IMG_PAPH."/".$newProd_row['prod_id'].
            "/preview/".$newProd_row['prodImg']."'>";
        }else{
            $newProd_txt .= "<img src='/data/default-img.png'>";
        }

        $newProd_txt .="<a href='/product/".$newProd_row['prodAlias']."'>".$newProd_row['prodName']."</a>";
        if($newProd_row['minPrice']){
            $newProd_txt.=  "<span class='minPrice'>".$newProd_row['minPrice']."</span>";
        }
        $newProd_txt.="</div>";

    }
}else{
    $newProd_txt .= "нет новых поступлений саженцев";
}