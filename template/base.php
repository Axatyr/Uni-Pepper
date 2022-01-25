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
    <nav class="topnav" id="myTopnav">
        <a href="index.php" title="home" <?php isActive("index.php");?>>Home</a>
        <a href="ricette.php" title="ricette" <?php isActive("ricette.php");?>>Ricette</a>
        <a href="varieta.php" title="varieta" <?php isActive("varieta.php");?>>Variet&agrave;</a>
        <a href="assistente.php" title="assistente" <?php isActive("assistente.php");?>>Assistente</a>
        <a href="#" class="icon" onclick="resize()" title="menu" ><span class="fas fa-bars" title="Menu"></span></a> 
        <a id="main" onclick="openNav()" class="right" title="notifiche" ><span class="fas fa-bell" title="Notifiche"></span></a>
        <a href="preferiti.php" title="preferiti" class="right <?php isEchoActive("preferiti.php");?>"><span class="fas fa-heart" title="Preferiti"></span></a>
        <a href="carrello.php" title="carrello" class="right <?php isEchoActive("carrello.php");?>"><span class="fas fa-shopping-cart" title="Carrello"></span></a>
        <a href="login.php" title="login" class="right <?php isEchoActive("login.php");?>"><span class="fas fa-user-alt" title="Utente"></span></a>
    </nav>    
    <script>
        function resize() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <div id="mySidebar" class="sidebar">
        <form action="processa-form.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="page" value="<?php echo $templateParams["pagina"];?>">
            <input type="hidden" name="action" value="13" />
            <button type="submit" class="closebtn" onclick="closeNav()">&times;</button>     
        </form>
            
            <?php if(isset($_SESSION["idutente"])) { foreach($templateParams["notifica"] as $notifica): ?>
                <div class="container-notifica">
                    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="idnotifica" value="<?php echo $notifica["IdNotifica"];?>"/>
                        <input type="hidden" name="action" value="12"/>
                        <input type="hidden" name="page" value="<?php echo $templateParams["pagina"];?>">
                        <button type="submit"><span class="fas fa-trash"></span></button>
                    </form>
                    <p><?php echo $notifica["Testo"];?></p>
                </div>
            <?php endforeach; }?>
    </div>
    <main>
        <!-- Controllo notifiche presenti-->
        <?php if(isset($templateParams["notifica"]) && $templateParams["notifica"]!= 0):
            foreach($templateParams["notifica"] as $notifica):
                if($notifica["StatoNotifica"] == 0): ?>
                    <script>getNotifica();</script>
        <?php   endif;
            endforeach;
        endif; ?>

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
            <a href="http://www.facebook.com" title="facebook" ><span class="fab fa-facebook-f" title="Facebook" style="color: #4267B2;"></span></a>
            <a href="http://instagram.com" title="instagram" ><span class="fab fa-instagram" title="Instagram" style="color: orange;"></span></a>
            <a href="http://twitter.com" title="twitter" ><span class="fab fa-twitter" title="Twitter" style="color: #1DA1F2;"></span></a>
        </section>
        <section class="contatti">
            <p>©2021 Uni-Pepper Tutti i Diritti Riservati</p>
            <a href="privacy.php">Politica sulla Privacy & Cookie</a>
            <a href="termini.php">Termini e Condizioni</a>
        </section>
        <section class="pagamenti">
            <p>Pagamenti con:</p>
            <a href="http://americanexpress.com" title="americanexpress" ><span class="fab fa-cc-amex" title="American Express" style="color: rgb(4, 4, 199);"></span></a>
            <a href="http://visa.com" title="visa" ><span class="fab fa-cc-visa" title="Visa" style="color: navy;"></span></a>
            <a href="http://mastercard.com" title="mastercard" ><span class="fab fa-cc-mastercard" title="Mastercard" style="color: red;"></span></a>
        </section>
    </footer>
</body>
</html>