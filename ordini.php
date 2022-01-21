<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - I miei ordini";
$templateParams["nome"] = "ordini.php";
$templateParams["pagina"] = "ordini.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Home Template
$templateParams["ordini"] = $dbh->getOrdini($_SESSION["idutente"]);

require 'template/base.php';
?>