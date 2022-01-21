<h1><span class="fas fa-user-alt"></span> <?php echo $_SESSION["nome"]; ?></h1>
<div class="admin">
    <div class="card">
        <img src="upload/user/ordini.jpg" alt="ordini" class="image">
        <div class="overlay"><a href="ordini.php">I miei ordini</a></div>
    </div>
    <div class="card">
        <img src="upload/user/avatar.png" alt="dati" class="image">
        <div class="overlay"><a href="dati.php">I miei dati</a></div>
    </div>
    <div class="card">
        <img src="upload/user/peperoncini.jpg" alt="preferiti" class="image">
        <div class="overlay"><a href="preferiti.php">Preferiti</a></div>
    </div>
</div>        
<a href="logout.php"><button type="button" class="logout">Logout</button></a>
    