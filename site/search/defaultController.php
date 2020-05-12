<?php
$prod_find_text = null;
$prod_find_count = 0;
$cat_find_text = null;
$cat_find_count = 0;



if($_GET['sTemplate']){
    $appRJ->response['format']='ajax';
    if($_GET['sTemplate'] != ''){
        $prodWhere = "where prodList_dt.activeFlag is true";
        if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
            $prodWhere = null;
        }

        $findProd_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt ".
            "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null ".
            $prodWhere." group by prodList_dt.prod_id";
        $findProd_res = $DB->doQuery($findProd_qry);

        if(mysql_num_rows($findProd_res) > 0){
            while ($findProd_row = $DB->doFetchRow($findProd_res)){
                if(strpos(mb_strtolower(" ".$findProd_row['prodName']), mb_strtolower($_GET['sTemplate'])) or
                    strpos(mb_strtolower(" ".$findProd_row['prodAlias']), mb_strtolower($_GET['sTemplate']))
                ) {
                    $prod_find_count++;

                    $prod_find_text .= "<div class='find-line'>";
                    if ($findProd_row['prodImg']) {
                        $prod_find_text .= "<div class='fl-img'><a href='".GL_PROD_IMG_PAPH.$findProd_row['prod_id']."/preview/".$findProd_row['prodImg']."'>
                        <img src='" . GL_PROD_IMG_PAPH  . $findProd_row['prod_id'] .
                            "/preview/" . $findProd_row['prodImg'] . "'></a>";
                    } else {
                        $prod_find_text .= "<img src='/data/default-img.png'>";
                    }

                    $prod_find_text .= "</div><div class='fl-text'><a href='/product/" . $findProd_row['prodAlias'] . "' title='Смотреть на сайте'>" .
                        $findProd_row['prodName'] . "</a>";
                    if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
                        $prod_find_text .= "<a href='/siteMan/editProduct/?prod_id=" . $findProd_row['prod_id'] . "'  title='Править в админке' class='s-admin'>".
                            "<img src='/source/img/edit-icon.png'>изменить</a>";

                    }
                    $prod_find_text .= "</div><div class='fl-price'><span class='minPrice'>". $findProd_row['minPrice'] . "</span></div></div>";
                }
            }
        }
        $catWhere = "where prodCat_dt.catActive is true";
        if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
            $catWhere = null;
        }

        $parCat_qry = "select prodCat_dt.*, count(prodList_dt.prod_id) as cnt from prodCat_dt ".
            "left join prodList_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id ".
            $catWhere." group by prodCat_dt.prodCat_id order by prodCat_dt.prodCat_id";

        $findCat_res = $DB->doQuery($parCat_qry);

        if(mysql_num_rows($findCat_res) > 0){
            while ($findCat_row = $DB->doFetchRow($findCat_res)){
                if(strpos(mb_strtolower(" ".$findCat_row['catName']), mb_strtolower($_GET['sTemplate'])) or
                    strpos(mb_strtolower(" ".$findCat_row['catAlias']), mb_strtolower($_GET['sTemplate']))
                ) {
                    $cat_find_count++;

                    $cat_find_text .= "<div class='find-line'>";
                    if ($findCat_row['catImg']) {
                        $cat_find_text .= "<div class='fl-img'><a href='".GL_CATEG_IMG_PAPH.$findCat_row['prodCat_id']."/".
                            $findCat_row['catImg']."'><img src='" . GL_CATEG_IMG_PAPH . $findCat_row['prodCat_id'] .
                            "/preview/" . $findCat_row['catImg'] . "'></a>";
                    } else {
                        $cat_find_text .= "<img src='/data/default-img.png'>";
                    }

                    $cat_find_text .= "</div><div class='fl-text'><a href='/catalog/" . $findCat_row['catAlias'] . "' title='Смотреть на сайте'>" .
                        $findCat_row['catName'] . "</a>";
                    if(isset($_SESSION['groups']['2']) and $_SESSION['groups']['2']>=5) {
                        $cat_find_text .= "<a href='/siteMan/editCat/?cat_id=" . $findCat_row['prodCat_id'] . "'  title='Править в админке' class='s-admin'>".
                            "<img src='/source/img/edit-icon.png'>изменить</a>";

                    }
                    $cat_find_text .= "</div><div class='fl-price'></div></div>";
                }
            }
        }
        $appRJ->response['result'] .="<div class='find-title'>Найдено: <span>".($cat_find_count + $prod_find_count).
            "</span><img onclick='findClose()' src='/source/img/closeModal.png'></div>";
        if($prod_find_count){

            $appRJ->response['result'] .="<div class='find-title-res'>в Саженцах: <span>".$prod_find_count."</span></div>".$prod_find_text;
        }
            if($cat_find_count){
                $appRJ->response['result'] .="<div class='find-title-res'>в Категориях: <span>".$cat_find_count."</span></div>".$cat_find_text;
            }
            if(!$prod_find_count and !$cat_find_count ){
                $appRJ->response['result'] .="По вашему запросу ничего не найдено :(";
            }


        //if()
        //$appRJ->response['result'] = "в Саженцах: ".mysql_num_rows($findProd_res);
        //$appRJ->response['result'] = "<span class='err'>Условия поиска не заданы222</span>";

    }else{
        $appRJ->response['result'] .="<div class='find-title'>Найдено: <span>0</span><img onclick='findClose()' src='/source/img/closeModal.png'></div>".
            "<span class='err'>Условия поиска не заданы222</span>";
    }

}else{
    $appRJ->response['result'] .="<div class='find-title'>Найдено: <span>0</span><img onclick='findClose()' src='/source/img/closeModal.png'></div>";
    $appRJ->response['result'] .= "<span class='err'>Условия поиска не заданы</span>";

}
$appRJ->response['result'] .= "<div class='youSearch'>Вы искали: '<span>".$_GET['sTemplate']."</span>'</div>";