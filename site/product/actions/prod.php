<?php
if($appRJ->server['reqUri_expl'][2]){
    $find_qry = "select prodList_dt.*, prodCat_dt.catName, prodCat_dt.catAlias, prodCat_dt.catActive from prodList_dt ".
        "left join prodCat_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id ".
        "where prodList_dt.activeFlag is true and prodList_dt.prodAlias = '".$appRJ->server['reqUri_expl'][2]."'";
    $find_res = $DB->doQuery($find_qry);
    if($find_row = $DB->doFetchRow($find_res)){
        if($find_row['prodCat_id']){
            $navPanel = "<ul><li><a href='/'>Главная</a></li><li><a href='/catalog/'>Каталог</a></li>".
                "<li><a href='/catalog/".$find_row['catAlias']."'>".$find_row['catName']."</a></li>".
                "<li><a href='/product/".$find_row['prodAlias']."'>".$find_row['prodName']."</a></li>".
                "</ul>";

            $price_qry = "select prod_id, prodPrice from prodPrice_dt where prod_id = ".$find_row['prod_id']." and prodPrice is not null ".
                "and activeFlag is true ".
                "order by prodAge";
            //echo $price_qry;
            $price_res = $DB->doQuery($price_qry);
            //$tRes = $price_res;
            $minProdPrice = 0;
            $prodPrice_text = null;

            if(mysql_num_rows($price_res)>0){


                $tCounter = 0;
                $tPrice = 0;
                while ($price_row = $DB->doFetchRow($price_res)){
                    if($tCounter == 0){
                        $minProdPrice = $price_row['prodPrice'];
                    }
                    $prodPrice_text.= "<div class='price-line'>".
                        "<input type='radio' id='pChoice".$tCounter."' name='opt' value='".$price_row['prodAge'].",".$price_row['prodPrice']."' ";

                    if(!$tCounter){
                        $prodPrice_text.="checked";
                        $tPrice = $price_row['prodPrice'];
                    }
                    $prodPrice_text.=">
    <label for='pChoice".$tCounter."'>".$prodAge_conf[$price_row['prodAge']]." - <span class='pChoice'>".$price_row['prodPrice']."</span></label></div>";
                    $tCounter++;
                }

              //  $price_row = $DB->doFetchRow($tRes);
                /*
                $findSub_qry = "select * from prodList_dt where prodCat_id = '".$find_row['prodCat_id']."' and activeFlag is true and ".
                    "prodList_dt.prod_id <> ".$find_row['prod_id'];
                */
                $findSub_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
                    "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
                    " where prodList_dt.prodCat_id = '".$find_row['prodCat_id']."' and prodList_dt.activeFlag is true and prodList_dt.prod_id <> ".$find_row['prod_id'].
                    " group by prodList_dt.prod_id";

                $findSub_res = $DB->doQuery($findSub_qry);

                $sub_text = null;
                if(mysql_num_rows($findSub_res)>0){
                    //echo "yyy";
                    while($findSub_row = $DB->doFetchRow($findSub_res)){
                        $sub_text .= "<div class='catItem'><img src='";
                        if($findSub_row['prodImg']){
                            $sub_text.=GL_PROD_IMG_PAPH."/".$findSub_row['prod_id'].
                                "/preview/".$findSub_row['prodImg'];
                        }else{
                            $sub_text.="/data/default-img.png";
                        }
                        $sub_text.="'>".
                            "<a href='/product/".$findSub_row['prodAlias']."'>".$findSub_row['prodName']."</a>";
                        if($findSub_row['minPrice']){
                            $sub_text.=  "<span class='minPrice'>".$findSub_row['minPrice']."</span>";
                        }
                        $sub_text.="</div>";
                    }
                }else{
                    //$sub_text = "не введено никаких данных";
                }
                require_once ($_SERVER["DOCUMENT_ROOT"]."/site/product/views/prod.php");
            }else{
                $appRJ->errors['XXX']['description']="Цены на товар не заданы";
            }
        }else{
            $appRJ->errors['request']['description']="Такого товара не существует или товар не активен";
        }
    }else{
        $appRJ->errors['404']['description']="Такого товара не существует";
    }
}else{
    $appRJ->errors['404']['description']="нет prodAlias";
}


