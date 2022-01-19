<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
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
        $stmt = $this->db->prepare("SELECT IdRicetta, NomeRicetta, ImmagineRicetta, Tempo, Costo FROM ricette ORDER BY RAND() LIMIT ?");
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


}
?>