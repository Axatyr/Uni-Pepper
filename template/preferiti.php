<h1><span class="fas fa-heart"></span> Preferiti</h1>
<!-- Prodotti -->
<?php foreach($templateParams["preferiti"] as $preferito): ?>
<div class="product">
    <img src="<?php echo UPLOAD_DIR_VARIETY.$preferito["ImmagineProdotto"] ?>" alt="<?php echo $preferito["NomeProdotto"] ?>"/>
    <h3><a href="prodotto.php"><?php echo $preferito["NomeProdotto"] ?></a></h3>
    <p class="price"><?php echo $preferito["PrezzoProdotto"] ?></p>
    <p><button type="button"><span class="fas fa-cart-plus"></span></button>
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idprodotto" value="<?php echo $preferito["IdProdotto"]; ?>" />
        <input type="hidden" name="action" value="4" />
        <button type="submit"><span class="fas fa-trash"></span></button>   
    </form>
    </p>
</div>
<?php endforeach; ?>