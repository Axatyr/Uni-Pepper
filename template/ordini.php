<h1><span class="fas fa-shopping-bag"></span> I miei ordini</h1>
<!-- Ordini -->
<?php foreach($templateParams["ordini"] as $ordine): ?>
<div class="order">
    <div>
        <span class="fas fa-clipboard-list"></span>
    </div>            
    <h3>Numero ordine: <?php echo $ordine["IdOrdine"] ?></h3>
    <p>Data ordine: <?php echo $ordine["DataOrdine"] ?></p>
    <p>Stato: <?php echo $ordine["StatoOrdine"] ?></p>
    <a href="info-ordine.php?id=<?php echo $ordine["IdOrdine"]; ?>"><button type="button"><span class="fas fa-info-circle"></span> Info ordine</button></a>

</div>
<?php endforeach; ?>