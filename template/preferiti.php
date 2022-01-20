<h1><span class="fas fa-heart"></span> <?php echo $templateParams["titolo_pagina"]; ?></h1>
<!-- Prodotti -->
<?php foreach($templateParams["preferiti"] as $preferito): ?>
<div class="product">
    <img src="<?php echo UPLOAD_DIR_VARIETY.$preferito["ImmagineProdotto"]; ?>" alt="<?php echo $preferito["NomeProdotto"]; ?>"/>
    <h3><a href="prodotto.php"><?php echo $preferito["NomeProdotto"]; ?></a></h3>
    <p class="price"><?php echo number_format($preferito["PrezzoProdotto"],2); ?> €</p>
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idprodotto" value="<?php echo $preferito["IdProdotto"];?>" />
        <input type="hidden" name="action" value="7" />
        <input type="hidden" name="quantita" value="1" />
        <button type="submit"><span class="fas fa-cart-plus"></span></button>
    </form>
    <form action="processa-form.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idprodotto" value="<?php echo $preferito["IdProdotto"]; ?>" />
        <input type="hidden" name="action" value="4" />
        <button type="submit"><span class="fas fa-trash"></span></button>   
    </form>
</div>
<?php endforeach; ?>