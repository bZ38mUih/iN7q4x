<?php
$find_qry = "select * from prodCat_dt where catAlias = '".$appRJ->server['reqUri_expl'][2]."' and catActive is true";
$find_res = $DB->doQuery($find_qry);
if(mysql_num_rows($find_res)>0){
    $find_row = $DB->doFetchRow($find_res);
    $navPanel = "<ul>".
        "<li><a href='/'>Главная</a></li>".
        "<li><a href='/catalog'>Каталог</a></li>".
        "<li><a href='/catalog/".$find_row['catAlias']."'>".$find_row['catName']."</a></li>".
        "</ul>";
    if(!$find_row['prodCat_parId']){
        $findSub_qry = "select * from prodCat_dt where catActive is true and prodCat_parId = ".$find_row['prodCat_id'];
    }else{
        $findSub_qry = "select * from prodList_dt where prodCat_id = '".$find_row['prodCat_id']."' and activeFlag is true";
    }
    $findSub_res = $DB->doQuery($findSub_qry);

    $sub_text = null;
    if(mysql_num_rows($findSub_res)>0){
        while($findSub_row = $DB->doFetchRow($findSub_res)){
            if(!$find_row['prodCat_parId']){
                $sub_text .= "<div class='catItem'><img src='";
                if($findSub_row['catImg']){
                    $sub_text.=GL_CATEG_IMG_PAPH."/".$findSub_row['prodCat_id'].
                        "/preview/".$findSub_row['catImg'];
                }else{
                    $sub_text.="/data/default-img.png";
                }
                $sub_text.="'>".
                    "<a href='/catalog/".$findSub_row['catAlias']."'>".$findSub_row['catName']."</a></div>";
            }else{
                $sub_text .= "<div class='catItem'><img src='";
                if($findSub_row['prodImg']){
                    $sub_text.=GL_PROD_IMG_PAPH."/".$findSub_row['prod_id'].
                        "/preview/".$findSub_row['prodImg'];
                }else{
                    $sub_text.="/data/default-img.png";
                }
                $sub_text.="'>".
                    "<a href='/product/".$findSub_row['prodAlias']."'>".$findSub_row['prodName']."</a></div>";
            }
        }
    }else{
        $sub_text = "не введено никаких данных";
    }

    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/catalog/views/catView.php");
}else{
    $appRJ->errors['404']['description']='неправильные параметры url catalog';
}

