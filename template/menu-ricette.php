<h1><span class="fas fa-book-open"></span> <?php echo $templateParams["titolo_pagina"]; ?></h1>
    <!-- Ricette -->
    <?php foreach($templateParams["ricette"] as $ricetta): ?>
    <section class="ricetta">
        <img src="<?php echo UPLOAD_DIR_RECIPES.$ricetta["ImmagineRicetta"]; ?>" alt="Immagine <?php echo $ricetta["NomeRicetta"]; ?>">
        <div class="content">
            <a href="ricetta.php?id=<?php echo $ricetta["IdRicetta"];?>"><h2><?php echo $ricetta["NomeRicetta"]; ?></h2></a>
            <footer>
                <p><span class="fas fa-concierge-bell"></span> <?php echo $ricetta["Difficolta"]?> </p>
                <p><span class="fas fa-users"></span> <?php echo $ricetta["Persone"]; ?> </p>
                <p><span class="fas fa-clock"></span> <?php echo $ricetta["Tempo"]; ?> </p>
                <p><span class="fas fa-euro-sign"></span> <?php echo $ricetta["Costo"]; ?> </p>
                <p><span class="fas fa-pepper-hot"></span> <?php echo $ricetta["GradoPiccantezza"]; ?> </p>
            </footer>
        </div>
    </section>
    <?php endforeach; ?>
        