<?php
/**
 * Created by PhpStorm.
 * User: mrSmitch
 * Date: 09.04.2020
 * Time: 17:01
 */

if($appRJ->server['reqUri_expl'][2]){
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/catalog/actions/category.php");
}else{
    require_once($_SERVER["DOCUMENT_ROOT"]."/site/catalog/actions/catalog.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/site/catalog/views/defaultView.php");
}
