<?php
$prodOnPage = 12;
$curPage = 1;

if($_GET['prodOnPage']){
    $prodOnPage = $_GET['prodOnPage'];
}
if($_GET['newPodPage']){
    $curPage = $_GET['newPodPage'];
}



$newProd_txt = null;
$newProd_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
    "inner join prodCat_dt on prodList_dt.prodCat_id = prodCat_dt.prodCat_id ".
    "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
    " where prodList_dt.newFlag is TRUE and prodList_dt.activeFlag is true ".
    "and prodCat_dt.catActive is true ".
    "group by prodList_dt.prod_id ".
    " order by prodList_dt.prod_id desc ".
    "LIMIT ".(($curPage-1)*$prodOnPage).", ".$prodOnPage;
//echo $newProd_qry;
//"


$newProd_count_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
    "inner join prodCat_dt on prodList_dt.prodCat_id = prodCat_dt.prodCat_id ".
    "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
    " where prodList_dt.newFlag is TRUE and prodList_dt.activeFlag is true ".
    "and prodCat_dt.catActive is true ".
    "group by prodList_dt.prod_id ";


$newProd_count_res = $DB->doQuery($newProd_count_qry);



$newProd_res = $DB->doQuery($newProd_qry);
$newProd_count = mysql_num_rows($newProd_count_res);


$pages_text = null;

if($newProd_count>0){
    $tPage = 1;
    $pages_text.="<div class='pgn'><div class='pgn-num'>Стр. ";
    while ($newProd_count - $prodOnPage*($tPage-1) >=1){

        $pages_text .= "<a href='?newPodPage=".$tPage."&prodOnPage=".$prodOnPage."' ";
        if($tPage == $curPage){
            $pages_text.="class='active'";
        }
        $pages_text.=" onclick='event.preventDefault(); showNew(".$tPage.", ".$prodOnPage.")'>".$tPage."</a>, ";
        $tPage++;
    }

    $pages_text = substr($pages_text, 0 , strlen($pages_text)-2);
    $pages_text.="</div><div class='pgn-on'>по <a href='?prodOnPage=12' ";
    if($prodOnPage == 12){
        $pages_text.=" class='active'";
    }
    $pages_text.=">12</a>, <a href='?prodOnPage=24'";
    if($prodOnPage == 24){
        $pages_text.=" class='active'";
    }
    $pages_text.=">24</a>, <a href='?prodOnPage=48'";
    if($prodOnPage == 48){
        $pages_text.=" class='active'";
    }
    $pages_text.=">48</a></div></div>";

    $newProd_txt.=$pages_text;
    while($newProd_row = $DB->doFetchRow($newProd_res)){
        $newProd_txt .= "<div class='catItem'>";
        if($newProd_row['prodImg']){
            $newProd_txt .= "<a href='/product/".$newProd_row['prodAlias']."'><img src='".GL_PROD_IMG_PAPH."/".$newProd_row['prod_id'].
            "/preview/".$newProd_row['prodImg']."'>";
        }else{
            $newProd_txt .= "<img src='/data/default-img.png'>";
        }

        $newProd_txt .="</a><a href='/product/".$newProd_row['prodAlias']."'>".$newProd_row['prodName']."</a>";
        if($newProd_row['minPrice']){
            $newProd_txt.=  "<span class='minPrice'>".$newProd_row['minPrice']."</span>";
        }
        $newProd_txt.="</div>";

    }
}else{
    $newProd_txt .= "нет новых поступлений саженцев";
}