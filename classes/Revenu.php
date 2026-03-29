<?php
include_once __DIR__ . '/../config/database.php';
class Revenu {
    private $id_revenu;
    private $montant;
    private $source;
    private $date;
    private $id_utilisateur;  
    
    //Constructeur
    public function __construct(
        $id_revenu, 
        $montant, 
        $source, 
        $date, 
        $id_utilisateur
        )
        
        {
        $this->id_revenu = $id_revenu;
        $this->montant = $montant;
        $this->source = $source;
        $this->date = $date;
        $this->id_utilisateur = $id_utilisateur;
    }

    //Methode pour ajouter un revenu
    public static function ajouter(
        $bdd = null, 
        $montant = null, 
        $source = null, 
        $date = null, 
        $id_utilisateur = null
        )
        {
        if ($source === null && $montant !== null) {
            $id_utilisateur = $date;
            $date = $source;
            $source = $montant;
            $montant = $bdd;
            global $bdd;
        }
        if ($bdd === null) {
            global $bdd;
        }
        $req = $bdd->prepare("INSERT INTO revenu (montant, source, date, id_utilisateur)
                            VALUES (:montant, :source, :date, :id_utilisateur)");
        $req->execute(array(
            'montant' => $montant,
            'source' => $source,
            'date' => $date,
            'id_utilisateur' => $id_utilisateur
        ));
        return $bdd->lastInsertId();
    }

    //Methode pour recuperer les revenus d'un utilisateur
    public static function getByUtilisateur($bdd = null, $id_utilisateur = null){
        if ($id_utilisateur === null && $bdd !== null && !is_object($bdd)) {
            $id_utilisateur = $bdd;
            global $bdd;
        }
        if ($bdd === null) {
            global $bdd;
        }
        $req = $bdd->prepare("SELECT id_revenu, montant, source, date, id_utilisateur FROM revenu 
                            WHERE id_utilisateur = :id_utilisateur");
        $req->execute(array(
            'id_utilisateur'=> $id_utilisateur
        ));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    //Getters
    public function getIdRevenu(){
        return $this->id_revenu;
    }
    public function getMontant(){
        return $this->montant;
    }
    public function getSource(){
        return $this->source;
    }
    public function getDate(){
        return $this->date;
    }
    public function getIdUtilisateur(){
        return $this->id_utilisateur;
    }
        
}
?>


