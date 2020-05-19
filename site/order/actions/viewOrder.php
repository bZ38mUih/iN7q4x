<?php
$order_txt = null;
$oTag = htmlspecialchars($_GET['viewOrder']);
$oFind_qry = "select * from orders_dt where oTag = '".$oTag."'";
$oFind_res=$DB->doQuery($oFind_qry);
if($oFind_row = $DB->doFetchRow($oFind_res)){
    //while ()
    $findList_qry = "select * from ordersList_dt inner join prodList_dt on ordersList_dt.prod_id = prodList_dt.prod_id ".
        "where ordersList_dt.oTag = '".$oTag."' order by ordersList_dt.prod_id, ordersList_dt.prodAge";
    //echo $findList_qry;
    $findList_res = $DB->doQuery($findList_qry);
    while ($findList_row = $DB->doFetchRow($findList_res)){
        $order_txt.= "<div class='hb-line'>".
            "<div class='hbl-img'>";
        if($findList_row['prodImg']){
            $order_txt.="<a href='".GL_PROD_IMG_PAPH.$findList_row['prod_id']."/".$findList_row['prodImg']."'>".
                "<img src='".GL_PROD_IMG_PAPH.$findList_row['prod_id']."/preview/".$findList_row['prodImg']."'></a>";
        }else{
            $order_txt.="><img src='/data/default-img.png'>";
        }
        $order_txt.="</div>";
        $order_txt.="<div class='hbl-name'><a href='/product/".$findList_row['prodAlias']."'>".$findList_row['prodName']."</a></div>";
        $order_txt.="<div class='hbl-action'>";


        $tPrice = $findList_row['prodCount']*$findList_row['prodPrice'];
        $order_txt.="<div class='hbla-line'>".
            "<div class='hblal-age'>".$prodAge_conf[$findList_row['prodAge']]."</div>".
            "<div class='hblal-input'><button class='hblali-add'></button>".
            "<input type='number' value='".$findList_row['prodCount'].
            "' readonly><button class='hblali-remove'></button> шт. на <span>".
            $tPrice."</span></div>".
            "</div>";
        $order_txt.="</div>";
    }

    //echo "<br>Okk";
}else{
    $appRJ->errors['404']['description']="Такой страницы не существует";
}