<?php
//$h1 = "Сад приморья";
$navPanel = "<ul><li><a href='/' title='на Главную'>Главная</a></li>".
    "<li><a href='#' title='Советы садоводам'>Советы садоводам</a></li>".
    "<li><a href='/memo/pravila-posadki-sazhencev' title='Правила посадки саженцев'>Правила посадки саженцев</a></li></ul>";
$App['views']['social-block'] = true;
$appRJ->response['result'] .= "<!DOCTYPE html>" .
    "<html lang='en-Us'>" .
    "<head>" .
    "<meta http-equiv='content-type' content='text/html; charset=utf-8'/>" .
    "<meta name='description' content='Советы садоводам - Правила посадки саженцев'/>" .
    "<meta name='yandex-verification' content='a28b37bc8b7582ac' />" .
    "<title>Советы садоводам - Правила посадки саженцев</title>" .
    "<link rel='SHORTCUT ICON' href='/site/landing/img/favicon.png' type='image/png'>" .
    "<script src='/source/js/jquery-3.2.1.js'></script>" .
    "<link rel='stylesheet' href='/site/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/siteHeader/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/css/mainFrame.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/contacts/css/default.css' type='text/css' media='screen, projection'/>" .
    "<link rel='stylesheet' href='/site/pay-and-delivery/css/payStyle.css' type='text/css' media='screen, projection'/>".
    "<script src='/site/siteHeader/js/modalHeader.js'></script>".
    "<script src='/site/bucket/js/bucket.js'></script>".
    "<link rel='stylesheet' href='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/css/preloader.css'/>".
    "<script src='/source/js/Elegant-Loading-Indicator-jQuery-Preloader/src/js/jquery.preloader.min.js'></script>";

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

$appRJ->response['result'].= "<div class='top-frame'><h1><hr><span>Правила посадки саженцев</span></h1>".
    "<div class='topImg'><img src='/site/memo/posadka.jpg'></div>".
    "<div class='pd-TxtBlock'>".
    "<div class='pdTb-bottom'>".
    "<p class='lgColor'>Для хорошего роста и развития плодовых и декоративных растений им необходима определенная площадь питания. 
Например, вот рекомендованные значения расстояний между растениями/между рядами для некоторых культур:</p>".
    "<p>
<ul>
<li>яблоня, груша — 4-5 м / 5-6 м</li>
<li>вишня, слива — 2,5-3 м / 3 м</li>
<li>смородина, крыжовник — 1,5-2 м / 1-1,5 м</li>
<li>малина — 30 -50 см / 2 м</li>
<li>облепиха — 2 м / 3 м</li>

</ul>
</p>".
    "<p class='lgColor'>От размера ямы и качества в ней почвы зависит, насколько быстро идет рост корней и приживаемость саженца. 
Растению должно быть комфортно и достаточно места. Ямы для посадки лучше делать круглыми, с отвесными стенками. 
Размеры ям для различных культур различаются (диаметр/глубина):</p>".
    "<p>
<ul>
<li>Яблони и груши на сильнорослых подвоях — 100-125 см / 60 см</li>
<li>Яблони на карликовом подвое — 90 см / 40 см</li>
<li>Вишня, слива, облепиха, черноплодная рябина — 80 см / 40 см</li>
<li>Смородина, крыжовник, малина, жимолость — 50 см / 40 см</li>
<li>облепиха — 2 м / 3 м</li>
</ul>
</p>".
    "<p class='pd1em'>Ямы выкапывают так: верхний плодородный слой почвы складывают на одну сторону 
(им потом засыпают яму перед посадкой), а нижний грунт — на другую.</p>".
    "<b>Посадочные ямы нужно готовить заблаговременно.</b>".
    "<p class='pd1em'>
Посадочные ямы заполняют удобренной почвой, и это делается за несколько дней до посадки, чтобы почва успела осесть. 
Предварительно снятый плодородный слой почвы, хорошо перемешанный с удобрениями (органическими и минеральными, золой), 
укладывают на дно ямы и далее подсыпают так, чтобы образовался холмик.  При глинистых почвах на дно ямы рекомендуется 
насыпать слой крупнозернистого песка (10 см), а на песчаных — слой глины (8-10 см), и равномерно распределить по дну ямы.
</p>".
    "<p class='pd1em'>
Хорошо также на дно посадочных ям насыпать слой битого красного кирпича, а на кислых почвах — из силикатного. 
Так корням можно обеспечить дополнительный дренаж, и растения будут еще лучше развиваться.
</p>".
    "<p class='pd1em'>
Посадку плодовых деревьев и кустарников желательно проводить с помощником: один держит саженец, другой засыпает яму землей. 
Почва должна быть рыхлой, рассыпчатой, дышащей. Саженец нужно время от времени слегка встряхивать, 
чтобы все промежутки между корнями хорошо заполнились землей. Когда корневая система будет вся покрыта землей, 
почву вокруг посаженного деревца нужно утоптать. А в конце сделать круговую лунку, и вылить туда два ведра воды.
</p>".
    "<p class='pd1em'>
После посадки саженец подвязывают к колу. Необходимо следить, чтобы корневая шейка саженца после осадки почвы должна находиться на уровне земли. 
Если дерево заглублено (корневая шейка ниже уровня почвы), его нужно приподнять.
</p>".


    "</div>";

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
