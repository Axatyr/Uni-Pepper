<h1><span class="fas fa-user-alt"></span> <?php echo $_SESSION["nome"]; ?></h1>
<div class="admin">
    <div class="card">
        <img src="upload/user/order.jpg" alt="ordini" class="image">
        <div class="overlay"><a href="ordini.php">I miei ordini</a></div>
    </div>
    <div class="card">
        <img src="upload/user/avatar.jpg" alt="dati" class="image">
        <div class="overlay"><a href="dati.php">I miei dati</a></div>
    </div>
    <div class="card">
        <img src="upload/user/preferiti.jpg" alt="preferiti" class="image">
        <div class="overlay"><a href="preferiti.php">Preferiti</a></div>
    </div>
    <?php if($_SESSION["tipo"]=="f"): ?>
        <div class="card">
            <img src="upload/user/cart.jpg" alt="preferiti" class="image">
            <div class="overlay"><a href="gestione-prodotti.php">I miei prodotti</a></div>
    </div>
    <?php endif; ?>
</div>        
<a href="logout.php"><button type="button" class="logout">Logout</button></a>
    