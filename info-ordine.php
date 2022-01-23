<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Uni-Pepper's - Info ordine";
$templateParams["nome"] = "info-ordine.php";
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);
if(isset($_SESSION["idutente"])){
    $templateParams["notifica"] = $dbh->getNotifiche($_SESSION["idutente"]);
}
//Home Template
$idordine = -1;
if(isset($_GET["id"])){
    $idordine = $_GET["id"];
}
$templateParams["pagina"] = "info-ordine.php?id=".$idordine;
$templateParams["ordine"] = $dbh->getOrdineById($idordine);
$templateParams["prodottiordine"] = $dbh->getProdottiFromOrdine($idordine);
$ordine = $templateParams["ordine"];
$stato = $ordine[0]["StatoOrdine"];
if($stato == "Effettuato"){
    $dbh->updateStato($idordine, "Spedito");
    $dbh->insertNotifica("Ordine".$idordine." spedito",$_SESSION["idutente"]);
}else if($stato == "Spedito"){
    $dbh->updateStato($idordine, "Pronto per il ritiro");
    $dbh->insertNotifica("Ordine".$idordine." pronto per il ritiro",$_SESSION["idutente"]);
}else if($stato == "Pronto per il ritiro"){
    $dbh->updateStato($idordine, "Consegnato");
    $dbh->insertNotifica("Ordine".$idordine." consegnato",$_SESSION["idutente"]);
} 

require 'template/base.php';
?>