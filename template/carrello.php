<h1><span class="fas fa-shopping-cart"></span> Carrello</h1>
        <div class="table-div">
          <div>
            <table>
              <thead>
                  <tr>
                    <th id="img"></th><th id="articolo">Articolo</th></th><th id="prezzo">Prezzo</th><th id="quantita">Quantit&agrave;</th><th id="button"></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td headers="img">
                        <a><img src="../upload/variety/Cayenne.jpg" alt="Nome Prodotto"/></a>
                      </td>
                      <td headers="articolo">
                        <a href="#">Nome Prodotto</a>
                      </td>
                      <td headers="prezzo">
                          <p>10,50€</p>
                      </td>
                      <td headers="quantita">
                          <input type="number" id="quantita" name="quantita" min="1" value="1"/>
                      </td>
                      <td headers="button">
                        <button type="button"><span class="fas fa-heart"></span></button>
                        <button type="button"><span class="fas fa-trash"></span></button>
                      </td>
                  </tr>
                  <tr>
                    <td headers="img">
                      <a><img src="../upload/variety/Cayenne.jpg" alt="Nome Prodotto"/></a>
                    </td>
                    <td headers="articolo">
                      <a href="#">Nome Prodotto</a>
                    </td>
                    <td headers="prezzo">
                        <p>10,50€</p>
                    </td>
                    <td headers="quantita">
                        <input type="number" id="quantita" name="quantita" min="1" value="1"/>
                    </td>
                    <td headers="button">
                      <button type="button"><span class="fas fa-heart"></span></button>
                      <button type="button"><span class="fas fa-trash"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td headers="img">
                      <a><img src="../upload/variety/Cayenne.jpg" alt="Nome Prodotto"/></a>
                    </td>
                    <td headers="articolo">
                      <a href="#">Nome Prodotto</a>
                    </td>
                    <td headers="prezzo">
                        <p>10,50€</p>
                    </td>
                    <td headers="quantita">
                        <input type="number" id="quantita" name="quantita" min="1" value="1"/>
                    </td>
                    <td headers="button">
                      <button type="button"><span class="fas fa-heart"></span></button>
                      <button type="button"><span class="fas fa-trash"></span></button>
                    </td>
                  </tr>
                  <tr>
                    <td headers="img">
                      <a><img src="../upload/variety/Cayenne.jpg" alt="Nome Prodotto"/></a>
                    </td>
                    <td headers="articolo">
                      <a href="#">Nome Prodotto</a>
                    </td>
                    <td headers="prezzo">
                        <p>10,50€</p>
                    </td>
                    <td headers="quantita">
                        <input type="number" id="quantita" name="quantita" min="1" value="1"/>
                    </td>
                    <td headers="button">
                      <button type="button"><span class="fas fa-heart"></span></button>
                      <button type="button"><span class="fas fa-trash"></span></button>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
            <div class="container">
              <h4>Riepilogo ordine <span class="prezzo" style="color:black"><span class="fa fa-shopping-cart"></span> <b>4</b></span></h4>
              <p><a href="#">Prodotto 1</a> <span class="prezzo">$15</span></p>
              <p><a href="#">Prodotto 2</a> <span class="prezzo">$5</span></p>
              <p><a href="#">Prodotto 3</a> <span class="prezzo">$8</span></p>
              <p><a href="#">Prodotto 4</a> <span class="prezzo">$2</span></p>
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
                  <input type="submit" value="Procedi all'acquisto" class="btn">
                </form>
              </div>
            </div>
            
          </div>