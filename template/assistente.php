<h1><span class="fas fa-robot" ></span> <?php echo $templateParams["titolo_pagina"]; ?></h1>    
    <section class="assistente">
        <p>Rispondi alle seguenti domande e noi troveremo il peperoncino giusto per le tue esigenze!</p>
    </section>

    <!-- Algoritmo findPepper-->
    <?php $domanda = $templateParams["domanda"][0]; ?>
    <script >let numD="<?php echo $domanda["IdDomanda"];?>"; </script>
        <section class="assistente">
            <h3><?php echo $domanda["Domanda"]?></h3>
    </section>

    <section class="assistente">
        <?php if($risultato==-1) {?>
            <button onclick="redirectPepper(numD, 1);" type="button" class="btnAssistente"><?php echo $domanda["Risposta1"]?></button>   
            <button onclick="redirectPepper(numD, 2);" type="button" class="btnAssistente"><?php echo $domanda["Risposta2"]?></button>
        <?php } else {?>
            <button onclick="reset()" type="button" class="btnAssistente">Inizia di nuovo</button>
        <?php } ?>
    </section>
        
    <?php if($risultato!=-1) { $idvar = $templateParams["risultato"][0];?>
    <section class="assResult">
        
        <div>
        <img src="<?php echo UPLOAD_DIR_VARIETY.$idvar["ImmagineVarieta"];?>" alt="Immagine <?php echo $idvar["NomeVarieta"];?>"/>
        </div>
        <div>
        <h2><?php echo $idvar["NomeVarieta"];?></h2>
            <p><?php echo $idvar["DescrizioneVarieta"];?></p>
                <!-- Redirect alla pagina da fare-->
            <button  id="readMoreBtn">Ulteriori Info</button>
        </div>
    </section> 
    <?php }?>
