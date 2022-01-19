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
    <title>UniPeppers - Home</title>
</head>
<body>
    <header>
        <img src="../upload/logo.png" alt="logo"/>
    </header>
      
    <nav>
        <a href="home.html" class="active">Home</a>
        <a href="ricette.html">Ricette</a>
        <a href="varieta.html">Variet&agrave;</a>
        <a href="assistente.html">Assistente</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fas fa-bars"></i>
        </a>
        <a href="preferiti.html" class="right"><span class="fas fa-heart" alt="Preferiti"></span></a>
        <a href="carrello.html" class="right"><span class="fas fa-shopping-cart" alt="Carrello"></span></a>
        <a href="login.html" class="right"><span class="fas fa-user-alt" alt="Utente"></span></a>
    </nav>        
    <main>
        <?php if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
        }
        ?>
    </main>
    <aside>
        <h3>Potrebbe interessarti:</h3>
        <div class="aside">
            <img src="upload/recipes/penne-arrabbiata.jpg" alt="Ricetta">
            <div class="overlay">
                <a href="ricetta.html"><h4>Nome Ricetta</h4></a>
                <span class="fas fa-concierge-bell">difficoltà</span>
                <span class="fas fa-clock">tempo</span>
                <span class="fas fa-euro-sign">costo</span>
            </div>
        </div>
        <div class="aside">
            <img src="upload/peperonciniVar.jpg" alt="Varietà">
            <div class="overlay">
                <a href="ricetta.html"><h4>Scopri tutte le variet&agrave;!</h4></a>
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
            <a href="privacy.html">Politica sulla Privacy & Cookie</a>
            <a href="termini.html">Termini e Condizioni</a>
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