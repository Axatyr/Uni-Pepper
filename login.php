<?php
require_once 'bootstrap.php';

//Home Template
if(isset($_POST["mail"]) && isset($_POST["password"])){
    $login = $dbh->checkLogin($_POST["mail"], $_POST["password"]);
    if(count($login)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Mail o Password errata!";
    }
    else{
        registerLoggedUser($login[0]);
    }
}
if(isUserLoggedIn()){
    $templateParams["titolo"] = "Uni-Pepper's - Area personale";
    if($_SESSION["tipo"]=='c'){
        $templateParams["nome"] = "login-home-cliente.php";
    }
    elseif($_SESSION["tipo"]=='f'){
        $templateParams["nome"] = "login-home-fornitore.php";
        
        //Controllo merce esaurimento
        $prodottiInEsaurimento= $dbh->getProdottiInEsaurimentoByIdFornitore($_SESSION["idutente"]);
        if(count($prodottiInEsaurimento)!= 0){
            //Inserire notifica
                foreach($prodottiInEsaurimento as $prodotto):
                $testo = "Sono rimaste solo ".$prodotto["QuantitaProdotto"]." unità del prodotto ".$prodotto["NomeProdotto"]; 
                $dbh->insertNotifica($testo, $_SESSION["idutente"]);
                endforeach;
        }
    }    
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}
else{
    $templateParams["titolo"] = "Uni-Pepper's - Login";
    $templateParams["nome"] = "login-form.php";
}
$templateParams["ricettecasuali"] = $dbh->getRandomRecipe(1);

require 'template/base.php';
?>