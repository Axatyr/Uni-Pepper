<h1><span class="fas fa-user-alt"></span> Login</h1>
<?php if(isset($templateParams["errorelogin"])): ?>
    <p><?php echo $templateParams["errorelogin"]; ?></p>
<?php endif; ?>
<?php if(isset($_SESSION["procediRegistrazione"])){
    if($_SESSION["procediRegistrazione"]==1){?>
        <section>
            <h3>E-mail gi&agrave; registrata</h3>
        </section>
    <?php }else if($_SESSION["procediRegistrazione"]==2){ ?>
        <section>
            <h3>Errore di registrazione</h3>
            <p>La password deve essere di almeno 7 caratteri e deve contenere almeno una lettera ed un numero</p>
        </section>
<?php } }
    unset($_SESSION["procediRegistrazione"]); ?>
<form action="#" method="post" class="login"> 
    <label for="mail"><b>E-mail: </b></label>
    <input type="text" placeholder="Inserisci E-mail" id="mail" name="mail" required>    
    <label for="password"><b>Password: </b></label>
    <input type="password" placeholder="Inserisci Password" id="password" name="password" required>
                
    <button type="submit">Accedi</button>
    <p><span>oppure</span></p>
</form>
<button class="reg-button" type="button" onclick="document.getElementById('registrazione').style.display='block'">Registrati</button>
<div id="registrazione" class="modal">
    <span onclick="document.getElementById('registrazione').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="processa-form.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h1>Registrati</h1>
            <p>Completa i seguenti campi per creare un account.</p>
            <hr>
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Inserisci E-mail" id="email" name="email" required/>
            
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" id="psw" name="password" required/>
                
            <label for="nome"><b>Nome</b></label>
            <input type="text" placeholder="Inserisci Nome" id="nome" name="nome" required/>
                        
            <label for="cognome"><b>Cognome</b></label>
            <input type="text" placeholder="Inserisci Cognome" id="cognome" name="cognome" required/>

            <input type="checkbox" class="form-check-input" id="tipo" name="tipo">
            <label class="form-check-label" for="tipo">Fornitore</label>                   
                
            <p>Creando un account acconsenti a <a href="termini.php" style="color:dodgerblue">Termini & Privacy</a>.</p>
            <input type="hidden" name="action" value="1"/>
            <button type="submit">Conferma</button>
        </div>
    </form>    
</div>
<script>
    // Get the modal
    var modal = document.getElementById('registrazione');
            
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>