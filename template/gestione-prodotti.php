<h1><span class="fab fa-pagelines"></span> I miei prodotti</h1>
<!-- Prodotti -->
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
<div class="product">
    <img src="<?php echo UPLOAD_DIR_VARIETY.$prodotto["ImmagineProdotto"]; ?>" alt="<?php echo $prodotto["NomeProdotto"]; ?>"/>
    <h3><a href="prodotto.html"><?php echo $prodotto["NomeProdotto"]; ?></a></h3>
    <p class="price"><?php echo $prodotto["PrezzoProdotto"]; ?> €</p>
    <p>Quantità: <?php echo $prodotto["QuantitaProdotto"]; ?></p>
    <p class="rifornisci"><span>Rifornisci</span></p> 
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="number" id="disponibilita" name="disponibilita" min="1" value="1"/>
        <input type="hidden" name="idprodotto" id="idprodotto" value="<?php echo $prodotto["IdProdotto"]; ?>" />                       
        <input type="hidden" name="action" id="action" value="3" />
        <button type="submit" style="width: 100%; margin-bottom: 0;">Invio</span></button>
    </form>
</div>
<?php endforeach; ?>
<button class="add-button" type="button" onclick="document.getElementById('aggiunta').style.display='block'">Aggiungi un nuovo prodotto</button>
<div id="aggiunta" class="modal">
    <span onclick="document.getElementById('aggiunta').style.display='none'" class="close" title="Close Modal">&times;</span>
    <form class="modal-content" action="processa-form.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <h1>Aggiunta prodotto</h1>
            <p>Completa i seguenti campi per aggiungere un nuovo prodotto.</p>
            <hr>
            <label for="nome"><b>Nome</b></label>
            <input type="text" placeholder="Inserisci Nome Prodotto" name="nome" required>
            
            <label for="prezzo"><b>Prezzo</b></label>
            <input type="text" placeholder="Inserisci Prezzo" name="prezzo" required>
            
            <label for="immagine"><b>Immagine prodotto:</b></label>
            <input type="file" name="immagine" id="immagine" required/>
                        
            <label for="descrizione"><b>Descrizione:</b></label>
            <br>
            <textarea class="form-control" name="descrizione" id="descrizione" required></textarea>
            <br>

            <label for="quantita">Quantit&agrave; disponibile in magazzino: </label>
            <input type="number" id="quantita" name="quantita" min="1" value="1" required/>   

            <input type="hidden" name="action" value="2" />
            <button type="submit">Aggiungi</button>
        </div>
    </form>
</div>
<script>
    // Get the modal
    var modal = document.getElementById('aggiunta');
            
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>