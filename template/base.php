<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Icone -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="css/styleClass.css" >
    <link rel="stylesheet" href="css/carrello.css" >
    <link rel="stylesheet" href="css/notifiche.css" >
    <!-- Script -->
    <script type="text/javascript" src="js/functions.js"></script>
    <title><?php echo $templateParams["titolo"]; ?></title>
</head>
<body>
    <header>
        <img src="upload/logo.png" alt="logo"/>
    </header>
    <nav>
        <a href="index.php" <?php isActive("index.php");?>>Home</a>
        <a href="ricette.php" <?php isActive("ricette.php");?>>Ricette</a>
        <a href="varieta.php" <?php isActive("varieta.php");?>>Variet&agrave;</a>
        <a href="assistente.php" <?php isActive("assistente.php");?>>Assistente</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()"><span class="fas fa-bars"></span></a> 
        <a id="main" onclick="openNav()" class="right"><span class="fas fa-bell" alt="Notifiche"></span></a>
        <a href="preferiti.php" class="right <?php isEchoActive("preferiti.php");?>"><span class="fas fa-heart" alt="Preferiti"></span></a>
        <a href="carrello.php" class="right <?php isEchoActive("carrello.php");?>"><span class="fas fa-shopping-cart" alt="Carrello"></span></a>
        <a href="login.php" class="right <?php isEchoActive("login.php");?>"><span class="fas fa-user-alt" alt="Utente"></span></a>
    </nav>    
    <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <?php if(isset($_SESSION["idutente"])) { foreach($templateParams["notifica"] as $notifica): ?>
                <div class="container-notifica">
                    <p><?php echo $notifica["Testo"];?></p>
                </div>
            <?php endforeach; }?>
    </div>
    <main>
        <!-- Controllo notifiche presenti -->
        <?php if($templateParams["notifica"] != null){ ?>
        <script>getNotifica();</script>
        <?php } ?>

        <?php if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
        }
        ?>
    </main>
    <aside>
        <h3>Potrebbe interessarti:</h3>
        <?php $ricettacasuale = $templateParams["ricettecasuali"][0];?>
        <div class="aside">
            <img src="<?php echo UPLOAD_DIR_RECIPES.$ricettacasuale["ImmagineRicetta"]?>" alt="Immagine <?php echo $ricettacasuale["NomeRicetta"]?>">
            <div class="overlay">
                <a href="ricetta.php?id=<?php echo $ricettacasuale["IdRicetta"]; ?>"><h4><?php echo $ricettacasuale["NomeRicetta"]?></h4></a>
                <span class="fas fa-concierge-bell"> <?php echo $ricettacasuale["Difficolta"]?></span>
                <span class="fas fa-clock"> <?php echo $ricettacasuale["Tempo"]?></span>
                <span class="fas fa-euro-sign"> <?php echo $ricettacasuale["Costo"]?></span>
            </div>
        </div>
        <div class="aside">
            <img src="upload/peperonciniVar.jpg" alt="Varietà">
            <div class="overlay">
                <a <?php isActive("varieta.php");?> href="varieta.php"><h4>Scopri tutte le variet&agrave;!</h4></a>
            </div>
        </div>
    </aside>      
    <footer>
        <section class="social">
            <p>Trovaci su:</p>
            <a href="http://www.facebook.com"><span class="fab fa-facebook-f" alt="Facebook" style="color: #4267B2;"></span></a>
            <a href="http://instagram.com"><span class="fab fa-instagram" alt="Instagram" style="color: orange;"></span></a>
            <a href="http://twitter.com"><span class="fab fa-twitter" alt="Twitter" style="color: #1DA1F2;"></span></a>
        </section>
        <section class="contatti">
            <p>©2021 Uni-Pepper Tutti i Diritti Riservati</p>
            <a href="privacy.php">Politica sulla Privacy & Cookie</a>
            <a href="termini.php">Termini e Condizioni</a>
        </section>
        <section class="pagamenti">
            <p>Pagamenti con:</p>
            <a href="http://americanexpress.com"><span class="fab fa-cc-amex" alt="American Express" style="color: rgb(4, 4, 199);"></span></a>
            <a href="http://visa.com"><span class="fab fa-cc-visa" alt="Visa" style="color: navy;"></span></a>
            <a href="http://mastercard.com"><span class="fab fa-cc-mastercard" alt="Mastercard" style="color: red;"></span></a>
        </section>
    </footer>
</body>
</html>