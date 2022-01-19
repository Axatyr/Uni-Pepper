<h1><span class="fas fa-home"></span> <?php echo $templateParams["titolo_pagina"]; ?></h1>
        <!-- Prodotti -->
        <?php foreach($templateParams["prodotti"] as $prodotto): ?>
        <div class="product">
            <img src="<?php echo UPLOAD_DIR_VARIETY.$prodotto["ImmagineProdotto"]; ?>" alt="Immagine <?php echo $prodotto["NomeProdotto"]; ?>"/>
            <h3><a href="prodotto.php?id=<?php echo $prodotto["IdProdotto"]; ?>"> <?php echo $prodotto["NomeProdotto"]; ?></a></h3>
            <p class="price"><?php echo number_format($prodotto["PrezzoProdotto"], 2); ?> €</p>
            <p><button type="button"><span class="fas fa-cart-plus"></span></button>
            <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"]; ?>" />
                <input type="hidden" name="action" value="5" />
                <button type="submit"><span class="fas fa-heart"></span></button>
            </p>
        </div>
        <?php endforeach; ?> 
        
