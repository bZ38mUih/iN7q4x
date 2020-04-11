<?php
$newProd_txt = null;
$newProd_qry = "select * from prodList_dt WHERE activeFlag is TRUE and newFlag is TRUE ";
$newProd_res = $DB->doQuery($newProd_qry);
if(mysql_num_rows($newProd_res)>0){
    while($newProd_row = $DB->doFetchRow($newProd_res)){
        $newProd_txt .= "<div class='catItem'><img src='".GL_PROD_IMG_PAPH."/".$newProd_row['prod_id'].
            "/preview/".$newProd_row['prodImg']."'>".
            "<a href='/catalog/".$newProd_row['prodAlias']."'>".$newProd_row['prodName']."</a></div>";
    }
}else{
    $newProd_txt .= "нет новых поступлений саженцев";
}