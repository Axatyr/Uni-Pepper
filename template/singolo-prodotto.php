<?php if(count($templateParams["prodotto"])==0): ?>
    <article>
        <h1>Ci dispiace, qualcosa è andato storto</h1>
    </article>

<?php else: $prodotto = $templateParams["prodotto"][0]; ?>
<div class="info">
    <img src="<?php echo UPLOAD_DIR_VARIETY.$prodotto["ImmagineProdotto"]; ?>" alt="Immagine <?php echo $prodotto["NomeProdotto"]; ?>"/>
    <h2><?php echo $prodotto["NomeProdotto"]; ?></h2>
    <p>Prezzo: <?php echo number_format($prodotto["PrezzoProdotto"],2);?> €</p><br>
    <label for="quantita">Quantit&agrave;:</label>
    <input type="number" id="quantita" name="quantita" min="1" value="1"/>
    <br>
    <button type="button"><span class="fas fa-cart-plus"></span></button>
    <button type="button"><span class="fas fa-heart"></span></button> 
    <h3>Descrizione:</h3>
    <p><?php echo $prodotto["DescrizioneProdotto"]?></p>                                        
</div>
<?php endif; ?>