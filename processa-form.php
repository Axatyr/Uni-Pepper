<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_POST["action"])){
    header("location: login.php");
}
/*Registrazione utente*/
if($_POST["action"]==1){
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);
    $email = htmlspecialchars($_POST["email"]);
    $mail = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    if(isset($_POST["tipo"])){
        $tipo = "f";
    }
    else{
        $tipo = "c";
    }
    $id = $dbh->inserisciUtente($nome, $cognome, $mail, $password, $tipo);
    header("location: login.php");
}
/*Aggiunta prodotto*/
if($_POST["action"]==2){
    $nomeprodotto = htmlspecialchars($_POST["nome"]);
    $prezzo = htmlspecialchars($_POST["prezzo"]);
    $descrizioneprodotto = htmlspecialchars($_POST["descrizione"]);
    $quantita = htmlspecialchars($_POST["quantita"]);
    $fornitore = $_SESSION["idutente"];

    list($result, $msg) = uploadImage(UPLOAD_DIR_VARIETY, $_FILES["immagine"]);
    if($result != 0){
        $imgprodotto = $msg;
        $id = $dbh->inserisciProdotto($nomeprodotto, $imgprodotto, $prezzo, $descrizioneprodotto, $quantita, $fornitore, $fornitore);
    }
    header("location: gestione-prodotti.php");
}
/*Rifornimento prodotto*/
if($_POST["action"]==3){
    //Aggiorno la quantità
    $quantita = htmlspecialchars($_POST["disponibilita"]);
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);

    $dbh->rifornisciProdotto($idprodotto, $quantita);
    header("location: gestione-prodotti.php");
}
/*Rimuovi dai preferiti*/
if($_POST["action"]==4){
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);
    $utente = $_SESSION["idutente"];

    $dbh->removeFromPreferiti($idprodotto, $utente);

    header("location: preferiti.php");
}
/*Aggiungi a preferiti*/
if($_POST["action"]==5 || $_POST["action"]==6){
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);
    $utente = $_SESSION["idutente"];

    $res = $dbh->checkProductInPreferiti($idprodotto, $utente);
    if(count($res)==0){
        $dbh->moveToPreferiti($idprodotto, $utente);
    }
    if($_POST["action"]==5){
        header("location: index.php");
    }
    else{
        header("location: carrello.php");
    }
}

/*Aggiungi al carrello*/
if($_POST["action"]==7 || $_POST["action"]==8){
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);
    $quantita = htmlspecialchars($_POST["quantita"]);

    $utente = $_SESSION["idutente"];
    
    // Aggiungi ordine
    if(count($dbh->checkEmptyCart($utente)) == 0){
        $dbh->createNewCart($utente);
    } 
    $idOrdine = $dbh->checkEmptyCart($utente);
        //Aggiungi prodotto
        $quantitaProdotto = $dbh->checkProductOnCart($idOrdine[0]["IdOrdine"], $idprodotto);
        if(count($quantitaProdotto) == 0){
            $dbh->createNewProductOnCart($idOrdine[0]["IdOrdine"], $idprodotto, $quantita);
        }
        else {
            $quantitaProdotto[0]["QuantitaPr"] = $quantitaProdotto[0]["QuantitaPr"] + $quantita;
            $dbh->setQuantityProduct($idOrdine[0]["IdOrdine"], $idprodotto, $quantitaProdotto[0]["QuantitaPr"]);
        }

        //Aggiorna totale ordine
        $prezzoProdotto= $dbh->getPriceProduct($idprodotto);
        $totale = $prezzoProdotto[0]["PrezzoProdotto"] * $quantita;
        $dbh->updateTotalCart($idOrdine[0]["IdOrdine"], $totale);

    //Da andare nella home o prodotto o preferiti
    if($_POST["action"]==7) { 
        header("location: index.php");
    } else if($_POST["action"]==8) {
        header("location: preferiti.php");
    }     
}

/*Rimuovi dal carrello*/
if($_POST["action"]==9){
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);

    $utente = $_SESSION["idutente"];
    
    $idOrdine = $dbh->checkEmptyCart($utente);

    if(count($idOrdine) != 0){
        $quantitaProdotto = $dbh->checkProductOnCart($idOrdine[0]["IdOrdine"], $idprodotto);
        $prezzoProdotto= $dbh->getPriceProduct($idprodotto);
        $totaleDaSottrarre = -($prezzoProdotto[0]["PrezzoProdotto"] * $quantitaProdotto[0]["QuantitaPr"]);
        $dbh->removeFromCart($idOrdine[0]["IdOrdine"], $idprodotto);
        $dbh->updateTotalCart($idOrdine[0]["IdOrdine"], $totaleDaSottrarre);
    }
    header("location: carrello.php");
}

/*Aggiorna carrello*/
if($_POST["action"]==10){
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);
    $quantita = htmlspecialchars($_POST["quantita"]);
    $utente = $_SESSION["idutente"];
    
    $idOrdine = $dbh->checkEmptyCart($utente);

    // Controllo ordine
    if(count($idOrdine) != 0){
        //Aggiungi prodotto
        $quantitaProdotto = $dbh->checkProductOnCart($idOrdine[0]["IdOrdine"], $idprodotto);
        $quantitaProdotto[0]["QuantitaPr"] = $quantitaProdotto[0]["QuantitaPr"] + $quantita;
        $prezzoProdotto= $dbh->getPriceProduct($idprodotto);
        //Controllo che la quantita non sia scesa a 0, in tal caso elimino l'elemento
        if($quantitaProdotto[0]["QuantitaPr"] == 0) {
            $totaleDaSottrarre = $prezzoProdotto[0]["PrezzoProdotto"] * $quantita;
            $dbh->removeFromCart($idOrdine[0]["IdOrdine"], $idprodotto);
            $dbh->updateTotalCart($idOrdine[0]["IdOrdine"], $totaleDaSottrarre);
        } else{
            $dbh->setQuantityProduct($idOrdine[0]["IdOrdine"], $idprodotto, $quantitaProdotto[0]["QuantitaPr"]);
            //Aggiorna totale ordine
            $totale = $prezzoProdotto[0]["PrezzoProdotto"] * $quantita;
            $dbh->updateTotalCart($idOrdine[0]["IdOrdine"], $totale);
        }
        header("location: carrello.php");
    }
}

if($_POST["action"]==11) {
    $idOrdine = htmlspecialchars($_POST["idOrdine"]);
    $utente = $_SESSION["idutente"];
    //Inserire notifica
    //Modificare tutti gli stati nell'ordine
    $stato = "Effettuato";
    $testo = "Ordine ".$idOrdine." ".$stato; 
    $dbh->insertNotifica($testo, $utente);
    $dbh->updateStato($idOrdine, $stato);
    //gestisciOrdine($idOrdine, $utente, 1);

    header("location: carrello.php");
}
/*cancella notifica*/
if($_POST["action"]==12){
    $idnotifica = htmlspecialchars($_POST["idnotifica"]);
    $dbh->deleteNotifica($idnotifica);
    $page = htmlspecialchars($_POST["page"]);
    header("location: $page");
}

/*Aggiorna stato notifica*/
if($_POST["action"]==13){
    $utente = $_SESSION["idutente"];
    $dbh->updateStatoNotifiche($utente);

    $page = htmlspecialchars($_POST["page"]);
    header("location: $page");
}

?>