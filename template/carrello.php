<h1><span class="fas fa-shopping-cart"></span> <?php echo $templateParams["titolo_pagina"]; ?></h1>
    <!-- Modalita vuoto-->
    <?php if(count($currentCart) == 0) { ?>
        <section class="empty-cart">
            <span class="fas fa-cart-arrow-down"></span> 
            <div>
                <h4>Il tuo carrello è vuoto</h4>
                <p>Aggiungi degli elementi e procedi al pagamento</p>  
            </div>      
        </section>
    <?php } else { ?>
    <!-- Modalita con elementi-->    
    <div class="table-div">
          <div>
            <table>
              <thead>
                  <tr>
                    <th id="img"></th><th id="articolo">Articolo</th></th><th id="prezzo">Prezzo</th><th id="quantita">Quantit&agrave;</th><th id="button"></th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($templateParams["prodottoCarrello"] as $prodotto): ?>
                  <tr>
                      <td headers="img">
                        <a><img src="<?php echo UPLOAD_DIR_VARIETY.$prodotto["ImmagineProdotto"]; ?>" alt="Immagine <?php echo $prodotto["NomeProdotto"];?>"/></a>
                      </td>
                      <td headers="articolo">
                        <a href="#"><?php echo $prodotto["NomeProdotto"];?></a>
                      </td>
                      <td headers="prezzo">
                        <p><?php echo number_format($prodotto["PrezzoProdotto"],2);?> €</p>
                      </td>
                      <td headers="quantita">
                        <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"];?>" />
                          <input type="hidden" name="action" value="10" />
                          <input type="hidden" name="quantita" value="1" />
                          <button type="submit"><span class="fas fa-plus"></span></button>
                        </form>
                        <p> <?php echo $prodotto["QuantitaPr"];?></p>
                        <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"];?>" />
                          <input type="hidden" name="action" value="10" />
                          <input type="hidden" name="quantita" value="-1" />
                          <button type="submit"><span class="fas fa-minus"></span></button>
                        </form>
                      </td>
                      <td headers="button">
                        <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"];?>" />
                          <input type="hidden" name="action" value="6" />
                          <button type="submit"><span class="fas fa-heart"></span></button>
                        </form>
                        <form action="processa-form.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="idprodotto" value="<?php echo $prodotto["IdProdotto"]; ?>" />
                          <input type="hidden" name="action" value="9" />
                          <button type="submit"><span class="fas fa-trash"></span></button>   
                        </form>
                      </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
            <div class="container">
              <h4>Riepilogo ordine <span class="prezzo" style="color:black"><span class="fa fa-shopping-cart"></span> <b>4</b></span></h4>
              <?php foreach($templateParams["prodottoCarrello"] as $prodotto): ?>
              <p><a href="#"><?php echo $prodotto["NomeProdotto"];?></a> <span class="prezzo"><?php echo number_format($prodotto["PrezzoProdotto"]* $prodotto["QuantitaPr"],2);?> €</span></p>
              <?php endforeach;?>
              <hr>
              <p>Totale <span class="prezzo" style="color:black"><b>$30</b></span></p>
            </div>
        </div>
        <!--Riepilogo-->
        <div class="row">
            <div class="col-75">
              <div class="container">
                <form action="#">
                  <div class="row">
                    <div class="col-50">
                      <h3>Indirizzo di fatturazione: </h3>
                      <label for="indirizzo"><i class="fa fa-address-card-o"></i> Indirizzo</label>
                      <input type="text" id="indirizzo" name="address" placeholder="Via dell'Università, 50">
                      <label for="citta"><i class="fa fa-institution"></i> Citt&agrave;</label>
                      <input type="text" id="citta" name="citta" placeholder="Cesena">
          
                      <div class="row">
                        <div class="col-50">
                          <label for="cap">Cap</label>
                          <input type="text" id="cap" name="cap" placeholder="47125">
                        </div>
                      </div>
                    </div>
          
                    <div class="col-50">
                      <h3>Metodo di Pagamento</h3>
                      <label for="fname">Carte valide</label>
                      <div class="icon-container">
                        <span class="fab fa-cc-visa" style="color:navy;"></span>
                        <span class="fab fa-cc-amex" style="color:blue;"></span>
                        <span class="fab fa-cc-mastercard" style="color:red;"></span>
                      </div>
                      <label for="cname">Titolare carta</label>
                      <input type="text" id="titolare" name="titolare" placeholder="Mario Rossi">
                      <label for="ccnum">Numero carta</label>
                      <input type="text" id="numero" name="numero" placeholder="1111-2222-3333-4444">
                      <label for="expmonth">Mese di scadenza</label>
                      <input type="text" id="scadenzam" name="scadenzam" placeholder="Settembre">
                      <div class="row">
                        <div class="col-50">
                          <label for="expyear">Anno di scadenza</label>
                          <input type="text" id="scadenzaa" name="scadenzaa" placeholder="2022">
                        </div>
                        <div class="col-50">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="123">
                        </div>
                      </div>
                    </div>
                    
                </div>

                <!-- Procedi al pagamento -->
                <button onclick="document.getElementById('pagamento-avvenuto').style.display='block'" class="btn" >Procedi all'acquisto</button>

                <!-- The Modal (Contiene Pagamento avvenuto) -->
                <div id="pagamento-avvenuto" class="modal">
                    <form class="modal-content">
                        <div class="container-pay" >
                            <h1>Pagamento avvenuto con successo</h1>
                            <div>
                                <button type="button" class="btn">Continua</button>
                            </div>
                        </div>
                        <script>
                        // Get the modal
                        var modal = document.getElementById('pagamento-avvenuto');

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                        </script>
                    </form>
                </div>
                </form>
            </div>
        </div>
            
    </div>
    <?php } ?>



    
    

