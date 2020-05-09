<?php
$navPanel = "<ul>".
    "<li><a href='/'>Главная</a></li>".
    "<li><a href='/catalog'>Каталог</a></li>".
    "</ul>";
$find_qry = "select * from prodCat_dt where prodCat_parId is null and catActive is true";
$find_res = $DB->doQuery($find_qry);

$catView = null;
//$catView = "sad23423423";

if(mysql_num_rows($find_res)>0){
    while ($find_row = $DB->doFetchRow($find_res)){
        $catView.="<div class='catPresent'>";
        $catView .= "<div class='catItem'><img src='";
        if($find_row['catImg']){
            $catView.=GL_CATEG_IMG_PAPH."/".$find_row['prodCat_id'].
                "/preview/".$find_row['catImg'];
        }else{
            $catView.="/data/default-img.png";
        }
        $catView.="'>".
            "<a href='/catalog/".$find_row['catAlias']."' title='перейти к описанию категории ".$find_row['catName']."'>".$find_row['catName']."</a></div>";
        $catView.="<div class='cp-list'>";
        $sub_qry = "select * from prodCat_dt where prodCat_parId = ".$find_row['prodCat_id']." and catActive is true";
        $sub_res = $DB->doQuery($sub_qry);
        while ($sub_row = $DB->doFetchRow($sub_res)){
            $catView.="<a href='/catalog/".$sub_row['catAlias']."'  title='перейти к описанию и товарам ".$sub_row['catName']."'>";
            $catView .= "<img src='";
            if($sub_row['catImg']){
                $catView.=GL_CATEG_IMG_PAPH."/".$sub_row['prodCat_id'].
                    "/preview/".$sub_row['catImg'];
            }else{
                $catView.="/data/default-img.png";
            }
            $catView.="'>";
            $catView.= $sub_row['catName']."</a>";
        }
        $catView."</div>";
        $catView.="</div>";
        $catView.="</div>";
    }
}else{

}

//echo $catView;
