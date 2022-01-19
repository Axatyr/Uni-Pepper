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
    if($id!=false){
        $msg = "Registrazione avvenuta con successo!";
    }
    else{
        $msg = "Errore, registrazione non avvenuta!";
    }
    header("location: login.php?formmsg=".$msg);
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
        if($id!=false){
            $msg = "Inserimento avvenuto correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }
    header("location: gestione-prodotti.php?formmsg=".$msg);
}
/*Rifornimento <prodotto></prodotto>*/
if($_POST["action"]==3){
    //Aggiorno la quantità
    $quantita = htmlspecialchars($_POST["disponibilita"]);
    $idprodotto = htmlspecialchars($_POST["idprodotto"]);

    $dbh->rifornisciProdotto($idprodotto, $quantita);
    header("location: gestione-prodotti.php?formmsg=".$msg);
}
?>