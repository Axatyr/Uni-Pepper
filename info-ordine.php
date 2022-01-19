<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Info ordine";
$templateParams["nome"] = "info-ordine.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
//Home Template
$idordine = -1;
if(isset($_GET["id"])){
    $idordine = $_GET["id"];
}
$templateParams["ordine"] = $dbh->getOrdineById($idordine);
$templateParams["prodottiordine"] = $dbh->getProdottiFromOrdine($idordine);

require 'template/base.php';
?>