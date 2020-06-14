<?php

$find_qry = "select prodCat_dt.*,  catTable.catName as parCatName, catTable.catAlias as parCatAlias from prodCat_dt " .
    "left join prodCat_dt catTable on prodCat_dt.prodCat_parId = catTable.prodCat_id " .
    "where prodCat_dt.prodCat_id = '28'";
$find_res = $DB->doQuery($find_qry);
if (mysql_num_rows($find_res) > 0) {
    $find_row = $DB->doFetchRow($find_res);
    $navPanel = "<ul>" .
        "<li><a href='/'>Главная</a></li>" .
        "<li><a href='/harvest-2019'>Наш урожай 2019</a></li>".
        "</ul>";

    // = false;

    //$check_par_qry = "select * from prodCat_dt where catActive is true and prodCat_parId = " . $find_row['prodCat_id'];
    //$check_par_res = $DB->doQuery($check_par_qry);

    //if (mysql_num_rows($check_par_res) == 0) {
    //    $print_prod = true;
    //}

    //if (!$print_prod) {
    //    $findSub_qry = "select * from prodCat_dt where catActive is true and prodCat_parId = " . $find_row['prodCat_id'];
    //} else {
        //$print_prod = true;
        $findSub_qry = "select prodList_dt.*, min(prodPrice_dt.prodPrice) as minPrice from prodList_dt " .
            "left join prodPrice_dt on prodList_dt.prod_id = prodPrice_dt.prod_id and prodPrice_dt.activeFlag is true and prodPrice_dt.prodPrice is not null " .
            " where prodList_dt.prodCat_id = '" . $find_row['prodCat_id'] . "' and prodList_dt.activeFlag is true group by prodList_dt.prod_id";
    //}
    $findSub_res = $DB->doQuery($findSub_qry);

    $sub_text = null;
    if (mysql_num_rows($findSub_res) > 0) {
        while ($findSub_row = $DB->doFetchRow($findSub_res)) {
            /*
            if (!$print_prod) {
                $sub_text .= "<div class='catItem big2'><a href='/catalog/" . $findSub_row['catAlias'] . "'><img src='";
                if ($findSub_row['catImg']) {
                    $sub_text .= GL_CATEG_IMG_PAPH . "/" . $findSub_row['prodCat_id'] .
                        "/preview/" . $findSub_row['catImg'];
                } else {
                    $sub_text .= "/data/default-img.png";
                }
                $sub_text .= "'></a>" .
                    "<a href='/catalog/" . $findSub_row['catAlias'] . "'>" . $findSub_row['catName'] . "</a></div>";
            } else {
            */



            $alb_view.="<div class='swiper-slide'><div class='alb-block'>";
            $alb_view.="<div class='alb-img'>";
            //if(file_exists($_SERVER['DOCUMENT_ROOT'].GL_ALBUM_IMG_PAPH.$selectAlbums_row['album_id'].
            //    "/preview/".$selectAlbums_row['albumImg'])){
                $alb_view.="<img src='".GL_PROD_IMG_PAPH . "/" . $findSub_row['prod_id'] .
                    "/" . $findSub_row['prodImg']."' ";
                if($selectAlbums_row['transAlbImg']){
                    $alb_view.="style='transform: rotate(".$selectAlbums_row['transAlbImg']."deg)'";
                }
                $alb_view.=">";
            //}else{
            //    $alb_view.="<img src='/data/default-img.png'>";
            //}
            $alb_view.="</div>".
                "<div class='alb-descr'>";
            /*
            if($selectAlbums_row['metaDescr']){
                $alb_view.= $selectAlbums_row['metaDescr'];
            }else{
                $alb_view.="Описание не задано";
            }
            */

            $alb_view.= "</div><div class='alb-info'>".
                "<span class='photo-name'>".$findSub_row['prodName']."</span>".

                //"<a href='/gallery/category/".$selectAlbums_row['catAlias']."' class=flVal>".
                //$selectAlbums_row['catName']."</a>".
                "</div>".
                //"<div class='alb-info'>".
                //"<span class='flName'>В альбоме: </span>".
                //"<span class=flVal>".$selectAlbums_row['phQty']."</span><span class='flName'>фото</span>".
                //"</div>".
                //"<div class='alb-info'>".
                //"<span class='flName'>Опубликовано: </span>" .
                //"<span class=flVal>".$selectAlbums_row['dateOfCr']."</span>".
                //"</div>";
            //if($selectAlbums_row['refreshDate']){
            //    $alb_view.="<div class='alb-info'><span class='flName'>Обновлено: </span>" .
            //        "<span class=flVal>".$selectAlbums_row['refreshDate']."</span></div>";
            //}
            //$alb_view.="<a class='viewAlb-slider' href='/gallery/".$selectAlbums_row['albumAlias']."'>Смотреть</a>".
                "</div></div>";




            /*
                $sub_text .= "<div class='swiper-slide'><div class='alb-block'><img src='";
                if ($findSub_row['prodImg']) {
                    $sub_text .= GL_PROD_IMG_PAPH . "/" . $findSub_row['prod_id'] .
                        "/preview/" . $findSub_row['prodImg'];
                } else {
                    $sub_text .= "/data/default-img.png";
                }
                $sub_text .= "'><span class='photo-name'>" .
                    $findSub_row['prodName']."</span>";

                $sub_text .= "</div></div>";
            */
            //}
        }
    } else {
        $sub_text = "не введено никаких данных";
    }
    $sub_text.=$alb_view;
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/harvest-2019/views/defaultView.php");
} else {
    $appRJ->errors['404']['description'] = 'неправильные параметры url catalog';
}


