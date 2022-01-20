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
    <br>
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"];?>" />
        <input type="hidden" name="action" value="7" />
        <input type="number" id="quantita" name="quantita" min="1" value="1"/>
        <button type="submit"><span class="fas fa-cart-plus"></span></button>
    </form>
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"];?>" />
        <input type="hidden" name="action" value="5" />
        <button type="submit"><span class="fas fa-heart"></span></button>
    </form>
    <h3>Descrizione:</h3>
    <p><?php echo $prodotto["DescrizioneProdotto"]?></p>                                        
</div>
<?php endif; ?>