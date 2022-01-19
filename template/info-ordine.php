<h1><span class="fas fa-info-circle"></span> Info ordine</h1>
<section class="info-ordine">
    <?php if(count($templateParams["ordine"])==0): ?>
    <article>
        <h1>Ci dispiace, qualcosa è andato storto</h1>
    </article>
    <?php else: $ordine = $templateParams["ordine"][0]; ?>
    <img src="<?php echo UPLOAD_DIR_VARIETY.$ordine["ImmagineProdotto"] ?>" alt="<?php echo $ordine["NomeProdotto"]; ?>">
    <ul>
        <li><h3>Numero Ordine: <?php echo $ordine["IdOrdine"]; ?></h3></li>
        <li>Data: <?php echo $ordine["DataOrdine"]; ?></li>
        <li>Totale: <?php echo $ordine["TotalePrezzo"]; ?>€</li>
        <li>Stato: <?php echo $ordine["StatoOrdine"]; ?></li>
        <li>Prodotti ordinati:</li>
        <ul>
        <?php foreach($templateParams["prodottiordine"] as $prodotto): ?>
            <li><?php echo $prodotto["NomeProdotto"]; ?></li>
        <?php endforeach; ?>
        </ul>
    </ul>
    <?php 
                        
    if($ordine["StatoOrdine"]=="Ordine effettuato"): ?>
    <style>
        .effettuato{
            color: black;
        }
        .spedito, .arrivato, .consegnato{
            color: gray;
        }
    </style>
    <?php elseif($ordine["StatoOrdine"]=="Spedito"): ?>
    <style>
        .effettuato, .spedito{
            color: black;
        }
        .arrivato, .consegnato{
            color: gray;
        }
    </style>
    <?php elseif($ordine["StatoOrdine"]=="Pronto per il ritiro"): ?>
    <style>
        .effettuato, .spedito, .arrivato{
           color: black;
        }
        .consegnato{
           color: gray;
        }
    </style>
    <?php elseif($ordine["StatoOrdine"]=="Consegnato"): ?>
    <style>
        .effettuato, .spedito, .arrivato, .consegnato{
           color: black;
        }
    </style>
    <?php endif; ?>
    <h3><span class="fas fa-route"></span> Spedizione</h3>
    <div class="stato">
        <div class="effettuato">
            <span class="fas fa-clipboard-check"></span>
            <p>Ordine effettuato</p>
        </div>
        <div class="spedito">
            <span class="fas fa-truck"></span>
            <p>Ordine spedito</p>
        </div>
        <div class="arrivato">
            <span class="fas fa-truck-loading"></span>
            <p>Ordine arrivato</p>
        </div>
        <div class="consegnato">
            <span class="fas fa-check-circle"></span>
            <p>Ordine ritirato</p>
        </div>
    </div> 
<?php endif; ?>                         
</section>