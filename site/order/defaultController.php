<?php
$pErr = null;
if($_POST['mkOrder']=='y'){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/order/actions/mkOrder.php");
    $navPanel = "<ul>".
        "<li><a href='/' title='На главную'>Главная</a></li>".
        "<li><a href='/order' title='оформить заказ'>Оформление заказа</a></li>".
        "</ul>";
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/order/views/defaultView.php");
}elseif ($_GET['viewOrder']){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/order/actions/viewOrder.php");
    $navPanel = "<ul>".
        "<li><a href='/' title='На главную'>Главная</a></li>".
        "<li><a href='#' title='Ваш заказ'>Ваш заказ</a></li>".
        "</ul>";
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/order/views/viewOrder.php");
}else{
    $navPanel = "<ul>".
        "<li><a href='/' title='На главную'>Главная</a></li>".
        "<li><a href='/order' title='оформить заказ'>Оформление заказа</a></li>".
        "</ul>";
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/order/views/defaultView.php");
}

