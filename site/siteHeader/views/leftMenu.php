<?php
$leftMenu_txt = "<div class='lm-btn'><img src='/site/siteHeader/img/icons8-menu-100.png'><span> - Меню</span></div>".
    "<div class='leftMenu'>".
    "<div class='lm-title'><div class='lmt-text'><img src='/site/siteHeader/img/site-logo.png'>Меню интернет магазина саженцев «".F_NAME."»</div>".
    "<div class='lmt-close'><img src='/source/img/closeModal.png'></div> </div>".

    "<ul>";
$categories_txt = null;
$popCats_text = null;

$leftMenu_qry = "select * from prodCat_dt WHERE prodCat_parId is null and catActive is true order by prodCat_id";
$leftMenu_res = $DB->doQuery($leftMenu_qry);

if(mysql_num_rows($leftMenu_res)>0){
    while($leftMenu_row = $DB->doFetchRow($leftMenu_res)){

        $categories_txt .= "<div class='catItem big'><a href='/catalog/".$leftMenu_row['catAlias']."'><img src='";
        if($leftMenu_row['catImg']){
            $categories_txt.=GL_CATEG_IMG_PAPH."/".$leftMenu_row['prodCat_id'].
                "/preview/".$leftMenu_row['catImg'];
        }else{
            $categories_txt.="/data/default-img.png";
        }
        $categories_txt.="'></a>".
            "<a href='/catalog/".$leftMenu_row['catAlias']."'>".$leftMenu_row['catName']."</a></div>";

        //if()

        $leftMenu_txt.= "<li><a href='/catalog/".$leftMenu_row['catAlias']."' title='перейти к описанию ".$leftMenu_row['catName']."'>".mb_strtoupper($leftMenu_row['catName'])."</a>";

        $parCat_qry = "select prodCat_dt.*, count(prodList_dt.prod_id) as cnt from prodCat_dt ".
            "left join prodList_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id ".
            " Where  prodCat_dt.prodCat_parId = '".$leftMenu_row['prodCat_id']."' and prodCat_dt.prodCat_parId is not null ".
            " and prodCat_dt.catActive is true group by prodCat_dt.prodCat_id having cnt > 0 order by prodCat_dt.prodCat_id";
        $parCat_res = $DB->doQuery($parCat_qry);

        if(mysql_num_rows($parCat_res)>0){
            $leftMenu_txt.="<ul>";
            while($parCat_row = $DB->doFetchRow($parCat_res)){
                $leftMenu_txt .= "<li><a href='/catalog/".$parCat_row['catAlias']."' title='перейти к описанию и саженцам ".$parCat_row['catName']."'>".$parCat_row['catName']." (".$parCat_row['cnt'].")</a></li>";


                if($parCat_row['popFlag'])
                    $popCats_text .= "<div class='catItem big2'><a href='/catalog/".$parCat_row['catAlias']."'><img src='".GL_CATEG_IMG_PAPH."/".$parCat_row['prodCat_id'].
                    "/preview/".$parCat_row['catImg']."'></a>".
                    "<a href='/catalog/".$parCat_row['catAlias']."'>".$parCat_row['catName']."</a></div>";


            }
            $leftMenu_txt.="</ul>";

        }
        $leftMenu_txt .= "</li>";
    }
}else{
    $leftMenu_txt = "не создано ни одной категории";
}

$leftMenu_txt .= "</ul>";

$viewCount = 0;
if($appRJ->server['reqUri_expl'][1] == 'product'){
    $viewCount_limit = 4;
}else{
    $viewCount_limit = 3;
}

$harvest2019 = "<div class='harvest2019'>".
    "<div class='ga-title'><span class='ga-title'><a href='/harvest-2019'>Наш урожай 2019</a></span><span class='after'></span></div>".
    //"<a href='/memo/pravila-posadki-sazhencev'>Правила посадки саженцев</a>".
    "</div>";
$leftMenu_txt .= $harvest2019;

$grovAdvices = "<div class='grovAdvice'>".
    "<div class='ga-title'><span class='ga-title'>Советы садоводам</span><span class='after'></span></div>".
    "<a href='/memo/pravila-posadki-sazhencev'>Правила посадки саженцев</a>".
    "</div>";
$leftMenu_txt .= $grovAdvices;


$lastView = null;
$lastView_flag = false;

$lastView .= "<div class='lastView'>".
"<span class='lv-title'>ПОСЛЕДНИЕ ПРОСМОТРЫ</span>";
if($_SESSION['lastView']){
    foreach (array_reverse($_SESSION['lastView']) as $prodAlias=>$prodData){
        $viewCount++;
        if($viewCount==1 and $viewCount_limit == 4){

        }elseif (($viewCount==1 and $viewCount_limit == 3) or ($viewCount!= 1 and $viewCount<=$viewCount_limit)){
            $lastView_flag = true;
            $lastView .= "<div class='lv-line'>";
            $lastView .= "<div class='lv-line-img'><a href='/product/".$prodAlias."'>";
            if($prodData['prodImg']){
                $lastView.="<img src='".GL_PROD_IMG_PAPH."/".$prodData['prod_id'].
                    "/preview/".$prodData['prodImg']."'>";
            }else{
                $lastView.="<img src='/data/default-img.png'>";
            }
            $lastView .= "</a></div>";
            $lastView .= "<div class='pv-text'>";
            $lastView .= "<a href='/product/".$prodAlias."'>".$prodData['prodName']."</a>";
            $lastView .=  "<span class='minPrice'>".$prodData['prodPrice']."</span>";
            $lastView .= "</div>";
            $lastView .= "</div>";
        }elseif($viewCount>5){
            unset($_SESSION['lastView'][$prodAlias]);
        }
    }
}

$lastView .= "</div>";

if($lastView_flag){
    $leftMenu_txt .= $lastView;
}

$leftMenu_txt .= "</div>";

$appRJ->response['result'].= $leftMenu_txt;