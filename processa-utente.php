<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_POST["action"])){
    header("location: login.php");
}
if($_POST["action"]==1){
    //Registro l'utente
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
?>