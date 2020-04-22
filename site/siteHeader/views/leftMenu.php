<?php
$leftMenu_txt = "<div class='leftMenu'><ul>";
$categories_txt = null;
$popCats_text = null;

$leftMenu_qry = "select * from prodCat_dt WHERE prodCat_parId is null and catActive is true order by prodCat_id";
$leftMenu_res = $DB->doQuery($leftMenu_qry);

if(mysql_num_rows($leftMenu_res)>0){
    while($leftMenu_row = $DB->doFetchRow($leftMenu_res)){

        $categories_txt .= "<div class='catItem'><img src='";
        if($leftMenu_row['catImg']){
            $categories_txt.=GL_CATEG_IMG_PAPH."/".$leftMenu_row['prodCat_id'].
                "/preview/".$leftMenu_row['catImg'];
        }else{
            $categories_txt.="/data/default-img.png";
        }
        $categories_txt.="'>".
            "<a href='/catalog/".$leftMenu_row['catAlias']."'>".$leftMenu_row['catName']."</a></div>";

        //if()

        $leftMenu_txt.= "<li><a href='/catalog/".$leftMenu_row['catAlias']."'>".mb_strtoupper($leftMenu_row['catName'])."</a>";

        $parCat_qry = "select prodCat_dt.*, count(prodList_dt.prod_id) as cnt from prodCat_dt ".
            "left join prodList_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id ".
            " Where  prodCat_dt.prodCat_parId = '".$leftMenu_row['prodCat_id']."' and prodCat_dt.prodCat_parId is not null ".
            " and prodCat_dt.catActive is true group by prodCat_dt.prodCat_id order by prodCat_dt.prodCat_id";
        $parCat_res = $DB->doQuery($parCat_qry);

        if(mysql_num_rows($parCat_res)>0){
            $leftMenu_txt.="<ul>";
            while($parCat_row = $DB->doFetchRow($parCat_res)){
                $leftMenu_txt .= "<li><a href='/catalog/".$parCat_row['catAlias']."'>".$parCat_row['catName']." (".$parCat_row['cnt'].")</a></li>";


                if($parCat_row['popFlag'])
                    $popCats_text .= "<div class='catItem'><img src='".GL_CATEG_IMG_PAPH."/".$parCat_row['prodCat_id'].
                    "/preview/".$parCat_row['catImg']."'>".
                    "<a href='/catalog/".$parCat_row['catAlias']."'>".$parCat_row['catName']."</a></div>";


            }
            $leftMenu_txt.="</ul>";

        }
        $leftMenu_txt .= "</li>";
    }
}else{
    $leftMenu_txt = "не создано ни одной категории";
}

$leftMenu_txt .= "</ul></div>";

$appRJ->response['result'].= $leftMenu_txt;