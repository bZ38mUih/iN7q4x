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
    "<link rel='stylesheet' href='/site/landing/css/slider.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    " <script src='/source/js/jssor.slider-28.0.0.min.js' type='text/javascript'></script>".
    "<script src='/site/landing/js/slider.js'></script>";
if($App['views']['social-block']){
    $appRJ->response['result'].= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'].= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'].= "<div class='contentBlock-frame'>".
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'].= "<div class='centerBlock ta-left'>".
"<div class='navPanel'></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");
$appRJ->response['result'].= "<div class='top-frame'>";

$appRJ->response['result'].= "
<div class='sFrame'>
<div id='jssor_1' style='position:relative;margin:0 auto;top:0px;left:0px;width:882px;height:300px;overflow:hidden;visibility:hidden;'>
        <!-- Loading Screen -->
        <div data-u='loading' class='jssorl-009-spin' style='position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);'>
            <img style='margin-top:-19px;position:relative;top:50%;width:38px;height:38px;' src='img/spin.svg' />
        </div>
        <div data-u='slides' style='cursor:default;position:relative;top:0px;left:0px;width:1150px;height:400px;overflow:hidden;'>
            <div>
                <img data-u='image' src='/site/landing/img/garden.jpg' />
                <span class='sText' style='background-color: rgba(104,104,100, 0.6);'>Сад приморья - саженцы пладовых деревьев и кустарников</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/strawberry.jpg' />
                <span class='sText'>Клубника - витамины и вкусное варенье</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/apple.jpg' />
                <span class='sText'>Яблони - саженцы от 1 до 7 лет</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/raspberry.jpg' />
                <span class='sText'>Летние ягоды - кустарники малина, ежевика, смородина</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/pear.jpg' />
                <span class='sText'>Груши - можно кушать</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/cherry.jpg' />
                <span class='sText'>Вишня - до 600 кг с м2</span>
            </div>
            <div>
                <img data-u='image' src='/site/landing/img/plum.jpg' />
                <span class='sText'>Слива - в компот на сухофрукты или просто кушать</span>
            </div>
        </div><a data-scale='0' href='https://www.jssor.com' style='display:none;position:absolute;'>design web</a>
        <!-- Bullet Navigator -->
        <div data-u='navigator' class='jssorb072' style='position:absolute;bottom:16px;right:16px;' data-autocenter='1' data-scale='0.5' data-scale-bottom='0.75'>
            <div data-u='prototype' class='i' style='width:24px;height:24px;font-size:12px;line-height:24px;'>
                <svg viewbox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;'>
                    <circle class='b' cx='8000' cy='8000' r='6666.7'></circle>
                </svg>
                <div data-u='numbertemplate' class='n'></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u='arrowleft' class='jssora073' style='width:40px;height:50px;top:0px;left:30px;' data-autocenter='2' data-scale='0.75' data-scale-left='0.75'>
            <svg viewbox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                <path class='a' d='M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z'></path>
            </svg>
        </div>
        <div data-u='arrowright' class='jssora073' style='width:40px;height:50px;top:0px;right:30px;' data-autocenter='2' data-scale='0.75' data-scale-right='0.75'>
            <svg viewbox='0 0 16000 16000' style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                <path class='a' d='M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z'></path>
            </svg>
        </div>
    </div>
    </div>
    <script type='text/javascript'>jssor_1_slider_init();
    </script>";

$appRJ->response['result'].="<div class='catView'>".
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

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'].= "</body></html>";