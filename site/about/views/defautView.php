<?php
//$h1 = "Сад приморья";
$navPanel = "<ul><li><a href='/' title='на Главную'>Главная</a></li><li><a href='/about' title='Информация о фирме'>О питомнике</a></li></ul>";
$App['views']['social-block'] = true;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='О питомнике: наши саженцы и цели'/>" .
    "<meta name='yandex-verification' content='a28b37bc8b7582ac' />" .
    "<title>О питомнике: наши саженцы и цели</title>" .
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>" .
    "<script src='/source/js/jquery-3.2.1.js'></script>" .
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/contacts/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/pay-and-delivery/css/payStyle.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>";

if ($App['views']['social-block']) {
    $appRJ->response['result'] .= "<script src='/site/js/social-block.js'></script>";
}
$appRJ->response['result'] .= "</head><body>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/defaultView.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/refPanel.php");
$appRJ->response['result'] .= "<div class='contentBlock-frame'>" .
    "<div class='contentBlock-center'><div class='contentBlock-wrap'>";


$appRJ->response['result'] .= "<div class='centerBlock ta-left'>" .
    "<div class='navPanel'>" . $navPanel . "</div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/leftMenu.php");

$appRJ->response['result'].= "<div class='top-frame'><h1><hr><span>О питомнике</span></h1>".
    "<div class='topImg'><img src='/site/about/img/about.jpg'></div>".
    "<div class='pd-TxtBlock'>".
    "<div class='pdTb-top'>".
    "<div class='pdTop-left'><h3>Мы являемся производителем</h3>".
    "<p>Питомник производит посадочный материал плодовых и ягодных культур, представленных широким ассортиментом сортов. 
Мы выращиваем саженцы не только самых популярных и востребованных культур, но и экзотических и декоративных. </p>".
    "<p>Вся продукция в питомнике проводится собственноручно, мы используем только собственные посадочные материалы и подвои, 
работаем без участия посредников, именно поэтому мы можем смело гарантировать высокое качество и приемлемую цену на продукцию.</p>".
    "</div>".
    "<div class='pdTop-right'>".
    "<p>Все саженцы выращиваются под контролем агронома, с соблюдением всех норм, а именно - поддержание благоприятной температуры, 
грамотный и бережный полив, постоянный контроль состава почвы. Все это позволяет нам предлагать 
Вам только самые крепкие и здоровые саженцы, которые в дальнейшем будут украшать Ваш сад. 
Кроме этого все породы <b>адаптированы к суровым климатическим условиям</b> и проходят тщательную проверку качества.</p>".
    "<p class='lgColor'>Мы постоянно расширяем ассортимент своей продукции, пополняем свои коллекции новинками, отбираем 
только хорошо зарекомендовавшие себя сорта.</p>".
    "</div>".
    "</div>".
    "<div class='pdTb-bottom'><h3>Мы растем и развиваемся каждый день</h3>".
"<p>
Главное для нас это качество продукции и ее доступность!
</p>".
"<p>
На сайте Вы можете задать вопросы о правильной посадке и уходе за саженцами и мы с радостью ответим на них как можно быстрее.
</p>".
"<p class='lgColor'>
Мы работаем с розничной и оптовой реализацией, имея при этом широкий и конкурентоспособный ассортимент.
</p>".
"<p>
Красочные картинки, подробные характеристики и описания помогут определиться с выбором и подобрать те саженцы, которые подойдут вашему, именно Вашему саду!
</p>".
"<p>
Если у вас возникнут трудности при выборе саженца или вопросы о правильной посадке и уходе за растением, 
Вы можете обратиться к нашим менеджерам. Они с радостью ответят на ваши вопросы и помогут с выбором.
</p>";


$appRJ->response['result'] .= "</div></div></div>";

require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteFooter/views/footerDefault.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalOrder.php");
//require_once($_SERVER["DOCUMENT_ROOT"] . "/site/siteHeader/views/modalMenu.php");
$appRJ->response['result'] .= "</body></html>";
