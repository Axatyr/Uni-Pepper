function ReadMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("readMoreBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Ulteriori Info";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Riduci";
      moreText.style.display = "inline";
    }
  }


function redirectPepper(domanda, ris){
    
    //Funzione per id domanda
    if(domanda==1){
        if(ris==1){
            // Reindirizza al 2
            document.cookie = "iddomanda=2";
            document.cookie = "risposta1=cibo";
        }
        if(ris==2){
            // Reindirizza al 4
            document.cookie = "iddomanda=4";
            document.cookie = "risposta1=drink";
        } 
    }
    else if(domanda==2){
        // Reindirizza al 3
        document.cookie = "iddomanda=3";
        if(ris==1){
            // Salvo la risposta
            document.cookie = "risposta2=primo";
        }
        if(ris==2)
        {
            // Salvo la risposta
            document.cookie = "risposta2=secondo";
        }
    }
    else if(domanda==3){
        // Reindirizza al 5
        document.cookie = "iddomanda=5";
        if(ris==1){
            // Salvo la risposta
            document.cookie = "risposta3=carne";
        }
        if(ris==2)
        {
            // Salvo la risposta
            document.cookie = "risposta3=pesce";
        }  
    }
    else if(domanda==4){
        // Reindirizza al 5
        document.cookie = "iddomanda=5";
        if(ris==1){
            // Salvo la risposta
            document.cookie = "risposta4=secco";
        }
        if(ris==2)
        {
            // Salvo la risposta
            document.cookie = "risposta4=dolce";
        }    
    }
    else if(domanda==5){
        if(ris==1){
            // Calcolo risultato in base ai parametri precedenti
            document.cookie = "risposta5=leggero";
        }
        if(ris==2)
        {
            // Calcolo risultato in base ai parametri precedenti
            document.cookie = "risposta5=forte";
        } 
        findPepper();
    }
    location.reload(true);
}

function findPepper(){
    
    if(getCookie("risposta1") == "cibo"){
        if(getCookie("risposta2") == "primo"){
            if(getCookie("risposta3") == "carne"){
                if(getCookie("risposta5") == "leggero"){
                    //risultato
                    document.cookie="risultato=7";
                }
                else if(getCookie("risposta5") == "forte"){
                    //risultato
                    document.cookie="risultato=3";
                }
            }
            else if(getCookie("risposta3") == "pesce"){
                if(getCookie("risposta5") == "leggero"){
                    //risultato
                    document.cookie="risultato=7";
                }
                else if(getCookie("risposta5") == "forte"){
                    //risultato
                    document.cookie="risultato=5";
                }
            }
        }
        else if(getCookie("risposta2") == "secondo"){
            if(getCookie("risposta3") == "carne"){
                if(getCookie("risposta5") == "leggero"){
                    //risultato
                    document.cookie="risultato=4";
                }
                else if(getCookie("risposta5") == "forte"){
                    //risultato
                    document.cookie="risultato=2";
                }
            }
            else if(getCookie("risposta3") == "pesce"){
                if(getCookie("risposta5") == "leggero"){
                    //risultato
                    document.cookie="risultato=6";
                }
                else if(getCookie("risposta5") == "forte"){
                    //risultato
                    document.cookie="risultato=1";
                }
            }
        }
    }
    else if(getCookie("risposta1") == "drink"){        
        if(getCookie("risposta4") == "secco"){
            if(getCookie("risposta5") == "leggero"){
                //risultato
                document.cookie="risultato=7";
            }
            else if(getCookie("risposta5") == "forte"){
                //risultato
                document.cookie="risultato=1";
            }
        }
        else if(getCookie("risposta4") == "dolce"){
            if(getCookie("risposta5") == "leggero"){
                //risultato
                document.cookie="risultato=4";
            }
            else if(getCookie("risposta5") == "forte"){
                //risultato
                document.cookie="risultato=5";
            }
        }
    }
}

function reset(){
    document.cookie = "iddomanda=1";
    document.cookie = "risultato=-1";
    location.reload(true);

}

let elements = getCookie("elements");

function addCart(idProd, quantita){
    if(elements == 0){
        elements ++;
    }
    let present = 0;
    //deleteAllCookie();
    if(quantita == 0){
        quantita = document.getElementById("quantitaInput").value;
    }

    for(i=1; i<elements; i++){
        let temp = getCookie("prodottoCarrello"+i);
        if(temp == idProd){
            let tempvalue = getCookie("quantitaProdCarrello"+i);
            tempvalue = parseFloat(tempvalue) + parseFloat(quantita); 
            document.cookie = "quantitaProdCarrello"+i+"="+tempvalue;
            present=1;
        }
    }
    
    if(present == 0){ 
        document.cookie = "elements=" + elements;
        document.cookie = "prodottoCarrello" + elements + "=" + idProd;
        document.cookie = "quantitaProdCarrello" + elements + "=" + quantita;
        elements++;
    }

}

let favElem= getCookie("favElem");

function addFavourite(idProd){
    let present = 0;
    if(favElem == 0){
        favElem ++;
    }

    for(i=1; i<favElem; i++){
        let temp = getCookie("prodottoPreferiti"+i);
        if(temp == idProd){
            present = 1;
        }
    }

    if(present == 0){
        document.cookie = "prodottoPreferiti" + favElem + "=" + idProd;
        favElem++;
    }
}

function deleteProductFromFavourite(){
    for(i=1; i<favElem; i++){
        let temp = getCookie("prodottoPreferiti"+i);
        if(temp == idProd){
            document.cookie = "prodottoPreferiti" + i + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    }
    favElem --;
    document.cookie = "favElem=" + favElem;

    location.reload(true);
}

function deleteProductFromCart(idProd){
    for(i=1; i<elements; i++){
        let temp = getCookie("prodottoCarrello"+i);
        if(temp == idProd){
            document.cookie = "prodottoCarrello" + i + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "quantitaProdCarrello" + i + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    }
    elements --;
    document.cookie = "elements=" + elements;

    location.reload(true);
}



function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

// Non usata da modificare
function deleteCookieCarrello(){
    let name = "prodotto";
    for(i=0; i<5; i++){
        document.cookie = name + i +"=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

// Non usata
function deleteAllCookie(){
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substring(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

