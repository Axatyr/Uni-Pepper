<h1><span class="fas fa-pepper-hot"></span><?php echo $templateParams["titolo_pagina"]; ?></h1>
        <section class="sec-varieta">
            <div>
            <h1>La scala di Wilbur Scoville</h1>
                <p>La scala di Scoville fu ideata per la prima volta dal chimico Wilbur Lincoln Scoville per misurare la pincattezza dei peperoncini, a volte la scala di scoville può essere abbreviata con la sigla SHU (Scoville Heat Units) che indica la quantità di capsicina contenuta quindi, quando trovate la sigla SHU nel nostro partale niente panico! Inizialmente i primi test furono fatti diluendo l'estratto di peperoncino con zucchero ed acqua, più il prodotto risultava diluito e maggiore è la sua gradazione scoville, il test veniva eseguito da 5 assaggiatori fino a trovare il punto zero. Successivamente con lo sviluppo tecnologico sono stati in grado di realizzare macchine molto sofisticate come HPLC (High performance liquid chromatography) adesso la scala scoville non si basa più sulla sensibilità dell'uomo ma si misura con sofisticate e precise macchine.</p>  
            </div>
            <div>
                <h2>Top 3 più piccanti:</h2>
                <ul>
                    <?php foreach($templateParams["varieta"] as $varieta): ?>
                    <li class="top-varieta">
                        <img src="<?php echo UPLOAD_DIR_VARIETY.$varieta["ImmagineVarieta"]; ?>" alt="Immagine <?php echo $varieta["NomeVarieta"]; ?>">
                        <a href="#"><?php echo $varieta["NomeVarieta"];?></a>
                    </li>
                    <?php if($varieta["IdVarieta"]==3){break;} endforeach; ?> 
                </ul>  
            </div>       
        </section>

        <section>
            <h2>Descrizione prodotti:</h2>
            <?php foreach($templateParams["varieta"] as $varieta): ?>
            <div class="varieta" id="<?php echo $varieta["IdVarieta"];?>">
                <div>
                    <img src="<?php echo UPLOAD_DIR_VARIETY.$varieta["ImmagineVarieta"]; ?>" alt="Immagine <?php echo $varieta["NomeVarieta"]; ?>" />
                </div>
                <div>
                    <h2><?php echo $varieta["NomeVarieta"];?></h2>
                        <div class="progress piccantezza" style="width: <?php echo $varieta["Piccantezza"];?>0%""></div>
                        <p>Piccantezza: <?php echo $varieta["Piccantezza"];?></p>
                        <div class="progress gusto" style="width: <?php echo $varieta["Gusto"];?>0%""></div>
                        <p>Gusto: <?php echo $varieta["Gusto"];?></p>
                        <div class="progress estetica" style="width: <?php echo $varieta["Estetica"];?>0%""></div>
                        <p>Estetica: <?php echo $varieta["Estetica"];?></p> 
                </div> 
                <p><?php echo $varieta["DescrizioneVarieta"];?></p>
            </div>
            <?php endforeach; ?> 
        </section>