<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
        die("Connection failed: " /*. $db->connect_error*/);
        }        
    }

    public function getProduct($n=-1){
        $query = "SELECT IdProdotto, NomeProdotto, ImmagineProdotto, DescrizioneProdotto, PrezzoProdotto, QuantitaProdotto FROM prodotti";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id){
        $query = "SELECT IdProdotto, NomeProdotto, ImmagineProdotto, DescrizioneProdotto, PrezzoProdotto, QuantitaProdotto FROM prodotti WHERE IdProdotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByIdOnCart($id){
        $query = "SELECT IdProdotto, NomeProdotto, ImmagineProdotto, PrezzoProdotto FROM prodotti WHERE IdProdotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecipe($n=-1){
        $query = "SELECT IdRicetta, NomeRicetta, ImmagineRicetta, Ingredienti, Procedimento, Difficolta, Persone, Tempo, Costo, GradoPiccantezza FROM ricette";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomRecipe($n){
        $stmt = $this->db->prepare("SELECT IdRicetta, NomeRicetta, ImmagineRicetta, Difficolta, Tempo, Costo FROM ricette ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecipeById($id){
        $query = "SELECT IdRicetta, NomeRicetta, ImmagineRicetta, Ingredienti, Procedimento, Difficolta, Persone, Tempo, Costo, GradoPiccantezza FROM ricette WHERE IdRicetta=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVariety($n=-1){
        $query = "SELECT IdVarieta, NomeVarieta, ImmagineVarieta, DescrizioneVarieta, Piccantezza, Gusto, Estetica FROM varieta";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVarietyById($id){
        $query = "SELECT IdVarieta, NomeVarieta, ImmagineVarieta, DescrizioneVarieta, Piccantezza, Gusto, Estetica FROM varieta WHERE IdVarieta=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuestionById($id){
        $query = "SELECT IdDomanda, Domanda, Risposta1, Risposta2 FROM assistente WHERE IdDomanda=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPreferiti($id){
        $query = "SELECT preferiti.IdProdotto, NomeProdotto, ImmagineProdotto, PrezzoProdotto FROM preferiti, prodotti WHERE IdUtente=? AND preferiti.IdProdotto=prodotti.IdProdotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOrdini($id){
        $query = "SELECT ordini.IdOrdine, DataOrdine, StatoOrdine, TotalePrezzo, ImmagineProdotto, NomeProdotto FROM ordini, utenti, ordiniprodotti, prodotti WHERE ordini.IdUtente = ? AND ordini.IdOrdine = ordiniprodotti.IdOrdine AND ordiniprodotti.IdProdotto = prodotti.IdProdotto GROUP BY ordiniprodotti.IdOrdine";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getOrdineById($id){
        $query = "SELECT ordini.IdOrdine, DataOrdine, StatoOrdine, TotalePrezzo, ImmagineProdotto, NomeProdotto FROM ordini, ordiniprodotti, prodotti WHERE ordini.IdOrdine=? AND ordini.IdOrdine = ordiniprodotti.IdOrdine AND ordiniprodotti.IdProdotto = prodotti.IdProdotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getProdottiFromOrdine($id){
        $query = "SELECT NomeProdotto FROM prodotti, ordiniprodotti WHERE IdOrdine=? AND ordiniprodotti.IdProdotto = prodotti.IdProdotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getDati($id){
        $query = "SELECT Nome, Cognome, Mail FROM utenti WHERE IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function checkLogin($email, $password){
        $query = "SELECT IdUtente, Nome, Mail, Password, TipologiaUtente FROM utenti WHERE Mail = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function inserisciUtente($nome, $cognome, $mail, $password, $tipo){
        $query = "INSERT INTO utenti (Nome, Cognome, Mail, Password, TipologiaUtente) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $nome, $cognome, $mail, $password, $tipo);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function inserisciProdotto($nomeprodotto, $imgprodotto, $prezzo, $descrizioneprodotto, $quantita, $fornitore){
        $query = "INSERT INTO prodotti (NomeProdotto, ImmagineProdotto, DescrizioneProdotto, PrezzoProdotto, QuantitaProdotto, IdFornitore) VALUES (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssdii',$nomeprodotto, $imgprodotto, $descrizioneprodotto, $prezzo, $quantita, $fornitore);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function rifornisciProdotto($idprodotto, $quantita)
    {
        $query = "UPDATE prodotti SET QuantitaProdotto = QuantitaProdotto + ? WHERE IdProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$quantita, $idprodotto);
        $stmt->execute();
    }

    public function updateStato($id, $stato){
        $query = "UPDATE ordini SET StatoOrdine = ? WHERE IdOrdine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$stato, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getProdottiByIdFornitore($id){
        $query = "SELECT IdProdotto, NomeProdotto, ImmagineProdotto, PrezzoProdotto, QuantitaProdotto FROM prodotti WHERE IdFornitore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function moveToPreferiti($idprodotto, $utente){
        $query = "INSERT INTO preferiti (IdUtente, IdProdotto) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $utente, $idprodotto);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function removeFromPreferiti($idprodotto, $utente){
        $query = "DELETE FROM preferiti WHERE IdProdotto = ? AND IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $idprodotto, $utente);
        $stmt->execute();
    }


}
?>