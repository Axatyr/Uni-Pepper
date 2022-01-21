<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - I miei prodotti";
$templateParams["nome"] = "gestione-prodotti.php";
$templateParams["pagina"] = "gestione-prodotti.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Home Template
$templateParams["prodotti"] = $dbh->getProdottiByIdFornitore($_SESSION["idutente"]);

require 'template/base.php';
?>