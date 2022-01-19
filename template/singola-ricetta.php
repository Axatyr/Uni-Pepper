<?php if(count($templateParams["ricetta"])==0): ?>
    <article>
        <h1>Ci dispiace, qualcosa è andato storto</h1>
    </article>

<?php else: $ricetta = $templateParams["ricetta"][0]; ?>
    <div class="info-ricetta">
        <img src="<?php echo UPLOAD_DIR_RECIPES.$ricetta["ImmagineRicetta"]; ?>" alt="Immagine <?php echo $ricetta["NomeRicetta"];?>"/>
        <div class="livello">
            <h1><?php echo $ricetta["NomeRicetta"];?></h1>            
            <p><span class="fas fa-concierge-bell"></span> <?php echo $ricetta["Difficolta"];?></p>
            <p><span class="fas fa-users"></span> <?php echo $ricetta["Persone"];?></p>
            <p><span class="fas fa-clock"></span> <?php echo $ricetta["Tempo"];?></p>
            <p><span class="fas fa-euro-sign"></span> <?php echo $ricetta["Costo"];?></p>
            <p><span class="fas fa-pepper-hot"></span> <?php echo $ricetta["GradoPiccantezza"];?></p>
                
        </div>
        <div class="ingredienti">
            <h3>Ingredienti:</h3>
            <?php foreach ($ingredientiRicetta as $ingredienti) :?>
            <ul>
                <li><?php echo $ingredienti;?></li>
            </ul>
            <?php endforeach;?>
        </div>
        <div class="procedimento">
            <h3>Procedimento:</h3>
            <p><?php echo $ricetta["Procedimento"];?></p>
        </div>                                        
    </div>
<?php endif; ?>