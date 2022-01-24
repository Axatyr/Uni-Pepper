<h1><span class="fas fa-user-alt"></span> I miei dati</h1>
<?php $utente= $templateParams["dati"][0]; ?>
<div class="dati">
    <img src="upload/user/avatar.png" class="avatar" alt="avatar">
    <p>Nome: <?php echo $utente["Nome"]; ?></p>
    <p>Cognome: <?php echo $utente["Cognome"]; ?></p>
    <p>E-mail: <?php echo $utente["Mail"]; ?></p>
</div>
<a href="logout.php"><button type="button" class="logout">Logout</button></a>
    