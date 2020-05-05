<?php
//echo "<pre>";
//print_r($_SESSION);
$bucket_txt = null;
$prod_count = 0;
$bucket_amount = 0;

foreach ($_SESSION['bucket'] as $prod_id => $prod_age){
    $prod_rd = new recordDefault("prodList_dt", "prod_id");
    $prod_rd->result['prod_id'] = $prod_id;
    if($prod_rd->copyOne()){
        $age_list = null;

        foreach ($prod_age as $age=>$qty){
            $age_list.=$age.", ";
            //echo "<pre>";
            //print_r($age);
        }

        $age_list = substr($age_list, 0, strlen($age_list) -2);
        $find_qry = "select prodList_dt.*, prodPrice_dt.prodPrice, prodPrice_dt.prodAge from prodList_dt ".
            "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
            " where prodList_dt.prod_id = '".$prod_id."' and prodPrice_dt.prodAge in (".$age_list.") and prodList_dt.activeFlag is true
         group by prodList_dt.prod_id, prodPrice_dt.prodAge order by prodPrice_dt.prodAge";
        $find_res = $DB->doQuery($find_qry);

        $bucket_txt.= "<div class='hb-line'>".
            "<div class='hbl-img'>";
        if($prod_rd->result['prodImg']){
            $bucket_txt.="<a href='".GL_PROD_IMG_PAPH.$prod_rd->result['prod_id']."/".$prod_rd->result['prodImg']."'>".
                "<img src='".GL_PROD_IMG_PAPH.$prod_rd->result['prod_id']."/preview/".$prod_rd->result['prodImg']."'></a>";
        }else{
            $bucket_txt.="><img src='/data/default-img.png'>";
        }
        $bucket_txt.="</div>";
        $bucket_txt.="<div class='hbl-name'><a href='/product/".$prod_rd->result['prodAlias']."'>".$prod_rd->result['prodName']."</a></div>";
        $bucket_txt.="<div class='hbl-action'>";

        while ($find_row = $DB->doFetchRow($find_res)){
            $tPrice = $_SESSION['bucket'][$prod_id][$find_row['prodAge']]*$find_row['prodPrice'];
            $bucket_txt.="<div class='hbla-line'>".
                "<div class='hblal-age'>".$prodAge_conf[$find_row['prodAge']]."</div>".
                "<div class='hblal-input'><button class='hblali-add' onclick='bucketAddOne(".$prod_id.", ".$find_row['prodAge'].")'></button>".
                "<input type='number' value='".$_SESSION['bucket'][$prod_id][$find_row['prodAge']].
                "' readonly><button class='hblali-remove' onclick='bucketRemoveOne(".$prod_id.", ".$find_row['prodAge'].")'></button> шт. на <span>".
                $tPrice."</span><button class='hblali-clear' onclick='bucketRemoveProduct(".$prod_id.", ".$find_row['prodAge'].")'></div>".
                "</div>";
            $prod_count+=$_SESSION['bucket'][$prod_id][$find_row['prodAge']];
            $bucket_amount+=$tPrice;

        }
        $bucket_txt.="</div>";

        /*
        if($find_row = $DB->doFetchRow($find_res)){


*/
        $bucket_txt.="</div>";
        //}

    }
}
$_SESSION['count'] = $prod_count;
$_SESSION['amount'] = $bucket_amount;