<?php
$h1 ="Сад приморья";
$App['views']['social-block']=true;
$appRJ->response['result'].= "<!DOCTYPE html>".
    "<html lang='en-Us'>".
    "<head>".
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>".
    "<meta name='description' content='Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.'/>".
    //"<meta name='yandex-verification' content='e929004ef40cae1b' />".
    "<title>Магазин саженцев Сад Приморья в Иваново | Питомник растений | Садовый центр.</title>".
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>".
    "<script src='/source/js/jquery-3.2.1.js'></script>".
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>".
    "<link rel='stylesheet' href='/site/landing/css/default.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>";
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'].= "<div class='centerBlock ta-left'>";
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'><div class='catView'>".
    "<h2>Разделы каталога</h2>".
    $categories_txt."</div>".
    "<div class='catView'>".
    "<h2>Популярные категории</h2>".
    $popCats_text."</div>";

$appRJ->response['result'].= "<div class='lOffer'>".
    "<div class='lo-img'><img src='/site/landing/img/green_1.png'></div>".
    "<div class='lo-txt'>Интернет магазин саженцев «Сад пиморья» предлагает Вам большой
    ассортимент плодовых и декоративных растений. Все наши саженцы полностью
    адаптированы к климату Московской области и безболезненно приживаются.
    А это значит, что Вы получите сильные и здоровые растения по самым выгодным ценам.</div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/landing/views/newProducts.php");
$appRJ->response['result'].= "<div class='catView'><h2>Новые поступления</h2>".
    $newProd_txt.

    "</div>".


    "</div>"."<h2>Памятка садоводу</h2>";




$appRJ->response['result'].="</div></div></div>";
/*
$slDevArt_qry="select * from art_dt where (artCat_id=3 OR artCat_id=1) and activeFlag is true ORDER BY pubDate DESC limit 4";
$slDevArt_res = $DB->doQuery($slDevArt_qry);
$devArtMain=$DB->doFetchRow($slDevArt_res);
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>".
    "<div class='contentBlock-table'><div class='contentBlock-table-left'><h2>it-Блог</h2>";
while ($slDevArt_row=$DB->doFetchRow($slDevArt_res)){
    $appRJ->response['result'].= "<div class='list-item'>".
        "<div class='list-item-img'>".
        "<img src='".ARTS_IMG_PAPH."/".$slDevArt_row['art_id']."/preview/".$slDevArt_row['artImg']."' alt='artCover'>".
        "</div><div class='list-item-text'>".
        "<a href='/dev/".$slDevArt_row['artAlias']."' title='Читать статью'>".$slDevArt_row['artName']."</a>".
        "<span>".$slDevArt_row['artMeta']."</span>";
    if($slDevArt_row['refreshDate']){
        $appRJ->response['result'].= "<div class='line'>Обновлено: <b>".$slDevArt_row['refreshDate']."</b></div>";
    }else{
        $appRJ->response['result'].= "<div class='line'>Опубликовано: <b>".$slDevArt_row['pubDate']."</b></div>";
    }

    $appRJ->response['result'].= "</div></div>";
}
$appRJ->response['result'].= "<div class='list-item all'>".
    "<a href='/blog'>все статьи</a></div></div><div class='contentBlock-table-right'>".
    "<h2>Свежая статья</h2>";
if($devArtMain['refreshDate']){
    $appRJ->response['result'].= "<div class='line'>Обновлено: <b>".$devArtMain['refreshDate']."</b></div>";
}else{
    $appRJ->response['result'].= "<div class='line'>Опубликовано: <b>".$devArtMain['pubDate']."</b></div>";
}
$appRJ->response['result'].= "<img src='".ARTS_IMG_PAPH."/".$devArtMain['art_id']."/preview/".$devArtMain['artImg']."' alt='artCover'>".
    "<div class='list-item-text'><a href='/dev/".$devArtMain['artAlias']."' title='Читать статью'>".$devArtMain['artName']."</a>".
    "<span>".$devArtMain['artMeta']."</span></div></div></div></div></div></div>";

$appRJ->response['result'].="<div class='contentBlock-frame dark'><div class='contentBlock-center'>".
    "<div class='contentBlock-wrap'><h2>Полезные ссылки</h2>".
    "<div class='contentBlock-table'><div class='contentBlock-table-left'>".
    "<div class='list-item'><div class='list-item-img'><img src='/site/downloads/img/logo.png'></div>".
    "<div class='list-item-text'><a href='/downloads/' title='Ссылки на загрузки программ'>Загрузки</a>".
    "<span>Системное, офисное, популяное ПО. Ссылки на загрузки программ</span></div></div></div>".
    "<div class='contentBlock-table-left'><div class='list-item'><div class='list-item-img'>".
    "<img src='/site/handbook/img/logo.png'></div><div class='list-item-text'><a href='/handbook/'>Справочник</a>".
    "<span>Систематизированная информация о компьютерных технологиях</span>".
    "</div></div></div></div></div>".
    "</div></div>";

$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>".
    "<div class='contentBlock-table'><div class='contentBlock-table-left'><h2>Мои работы</h2>";
$appRJ->response['result'].= "<div class='list-item all'>".
    "<a href='/portfolio'>все работы</a></div></div><div class='contentBlock-table-right'>".
    "<h2>Свежая работа</h2>".
    "<img src='/site/gallery/img/logo-big.png' alt='artCover'>".
    "<div><a href='/gallery' title='Смотреть работу'>Галерея</a>".
    "<span>Альбомы фотографий на разные темы</span></div></div></div></div></div>";
*/
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";