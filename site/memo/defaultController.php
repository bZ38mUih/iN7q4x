<?php
if($appRJ->server['reqUri_expl'][2]=='pravila-posadki-sazhencev'){
    require_once ($_SERVER["DOCUMENT_ROOT"]."/site/memo/views/defaultView.php");
}else{
    $appRJ->errors['404']="Такой статьи в Советах садоводам не существует";
}