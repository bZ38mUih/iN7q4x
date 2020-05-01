<?php
$site_url = "http://sad-primorya.ru";
$site_map_text = null;

$site_map_text .= "<h2>Карта сайта</h2>";
$siteMap="<?xml version='1.0' encoding='UTF-8'?>\n";
$siteMap.="<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\n";

$site_map_text .= "<ul>";
$site_map_text .= "<li><a href='".$site_url."' target='_blank'>Главная ; priority - 1.0; daily</a></li>";

$siteMap.="<url>";
$siteMap.="<loc>".$site_url."</loc>";
$siteMap.="<changefreq>daily</changefreq>";
$siteMap.= "<priority>1.0</priority>";
$siteMap.="</url>\n";

$site_map_text .= "<li><a href='".$site_url."' target='_blank'>Каталог ; priority - 0.8; daily</a></li>";
$site_map_text .= "<ul>";
$siteMap.="<url>";
$siteMap.="<loc>".$site_url."/catalog</loc>";
$siteMap.="<changefreq>daily</changefreq>";
$siteMap.= "<priority>0.8</priority>";
$siteMap.="</url>\n";

$сat_qry = "select prodCat_dt.prodCat_id, prodCat_dt.catName, prodCat_dt.catAlias, count(prodList_dt.prod_id) as cnt from prodCat_dt ".
    "left join prodList_dt on prodCat_dt.prodCat_id = prodList_dt.prodCat_id ".
    " Where prodCat_dt.catActive is true group by prodCat_dt.prodCat_id order by prodCat_dt.prodCat_id";

$сat_res = $DB->doQuery($сat_qry);
while ($сat_row = $DB->doFetchRow($сat_res)){

    $site_map_text .= "<li><a href='".$site_url."/catalog/".$сat_row['catAlias']."' target='_blank'>".$сat_row['catName']."</a>; priority - 0.8; daily";

    $siteMap.="<url>";
    $siteMap.="<loc>".$site_url."/catalog/".$сat_row['catAlias']."</loc>";
    $siteMap.="<changefreq>daily</changefreq>";
    $siteMap.= "<priority>0.8</priority>";
    $siteMap.="</url>\n";

    if($сat_row['cnt']){

        $prod_qry = "select prodPrice_dt.prod_id, min(prodPrice_dt.prodPrice) as minPrice, prodList_dt.prodAlias, prodList_dt.prodName, prodList_dt.prod_id from prodPrice_dt ".
            "inner join prodList_dt on prodPrice_dt.prod_id = prodList_dt.prod_id where prodList_dt.prodCat_id = '".$сat_row['prodCat_id']."' ".
        "and prodList_dt.activeFlag is true and prodPrice_dt.activeFlag is true group by prodList_dt.prod_id having minPrice is not null";

        $prod_res = $DB->doQuery($prod_qry);
        if(mysql_num_rows($prod_res) > 0){
            $site_map_text .= "<ul>";
            while ($prod_row = $DB->doFetchRow($prod_res)){
                $site_map_text .= "<li><a href='".$site_url."/product/".$prod_row['prodAlias']."'>".$prod_row['prodName']."</a></li>";

                $siteMap.="<url>";
                $siteMap.="<loc>".$site_url."/product/".$prod_row['prodAlias']."</loc>";
                $siteMap.="<changefreq>daily</changefreq>";
                $siteMap.= "<priority>0.8</priority>";
                $siteMap.="</url>\n";
            }
            $site_map_text .= "</ul>";
        }


    }
    $site_map_text .= "</li>";
}
$site_map_text .= "</ul>";

$site_map_text .= "<li><a href='".$site_url."/about' target='_blank'>О питомнике ; priority - 0.8; monthly</a></li>";
$siteMap.="<url>";
$siteMap.="<loc>".$site_url."/about</loc>";
$siteMap.="<changefreq>monthly</changefreq>";
$siteMap.= "<priority>0.8</priority>";
$siteMap.="</url>\n";

$site_map_text .= "<li><a href='".$site_url."/pay-and-delivery' target='_blank'>Оплата и доставка ; priority - 0.8; monthly</a></li>";
$siteMap.="<url>";
$siteMap.="<loc>".$site_url."/pay-and-delivery</loc>";
$siteMap.="<changefreq>monthly</changefreq>";
$siteMap.= "<priority>0.8</priority>";
$siteMap.="</url>\n";

$site_map_text .= "<li><a href='".$site_url."/contacts' target='_blank'>Контакты ; priority - 0.8; monthly</a></li>";
$siteMap.="<url>";
$siteMap.="<loc>".$site_url."/contacts</loc>";
$siteMap.="<changefreq>monthly</changefreq>";
$siteMap.= "<priority>0.8</priority>";
$siteMap.="</url>\n";



/*

$siteMap.="<loc>https://rightjoint.ru/parse-ad</loc>";
$siteMap.="<changefreq>weekly</changefreq>";
$siteMap.= "<priority>0.3</priority>";
$siteMap.="</url>\n";
*/
$siteMap.="</urlset>";
file_put_contents($_SERVER["DOCUMENT_ROOT"]."/sitemap.xml", $siteMap);
//exit;