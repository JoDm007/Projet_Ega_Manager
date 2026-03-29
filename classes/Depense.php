<?php
include_once __DIR__ . '/../config/database.php';

class Depense {
    private $id_depense;
    private $montant;
    private $date_creation;
    private $description;
    private $id_categorie;
    private $id_utilisateur;

    public function __construct(
        $id_depense,
        $montant,
        $date_creation,
        $description,
        $id_categorie,
        $id_utilisateur
    ) {
        $this->id_depense = $id_depense;
        $this->montant = $montant;
        $this->date_creation = $date_creation;
        $this->description = $description;
        $this->id_categorie = $id_categorie;
        $this->id_utilisateur = $id_utilisateur;
    }

    public static function ajouter(
        $bdd, 
        $montant, 
        $date, 
        $description, 
        $id_categorie, 
        $id_utilisateur
    ) 
        {
        try {
            $sql = "INSERT INTO depense (montant, date, description, id_categorie, id_utilisateur)
                    VALUES (:montant, :date, :description, :id_categorie, :id_utilisateur)";
            $req = $bdd->prepare($sql);
            $req->execute([
                'montant' => $montant,
                'date' => $date,
                'description' => $description,
                'id_categorie' => $id_categorie,
                'id_utilisateur' => $id_utilisateur
            ]);
            return $bdd->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'ajout de la dépense: " . $e->getMessage());
            return false;
        }
    }

    public static function getByUtilisateur($bdd = null, $id_utilisateur = null) {
        if ($id_utilisateur === null && $bdd !== null && !is_object($bdd)) {
            $id_utilisateur = $bdd;
            global $bdd;
        }
        if ($bdd === null) {
            global $bdd;
        }
        try {
            $sql = "SELECT id_depense, montant, date, description, id_categorie, id_utilisateur 
            FROM depense WHERE id_utilisateur = :id_utilisateur ORDER BY date DESC";

            $req = $bdd->prepare($sql);
            $req->execute(['id_utilisateur' => $id_utilisateur]);
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des dépenses: " . $e->getMessage());
            return [];
        }
    }

    public static function getByIdUtilisateur($bdd, $id_depense, $id_utilisateur) {
        try {
            $sql = "SELECT id_depense, montant, date, description, id_categorie, id_utilisateur 
            FROM depense WHERE id_depense = :id_depense AND id_utilisateur = :id_utilisateur LIMIT 1";

            $req = $bdd->prepare($sql);
            $req->execute(['id_depense' => $id_depense, 'id_utilisateur' => $id_utilisateur]);
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de la dépense: " . $e->getMessage());
            return false;
        }
    }

    public static function modifier(
        $bdd, 
        $id_depense, 
        $id_utilisateur, 
        $montant, 
        $date, 
        $description, 
        $id_categorie
        ) 
        {
        try{
            $sql = "UPDATE depense 
                    SET montant = :montant, date = :date, description = :description, id_categorie = :id_categorie 
                    WHERE id_depense = :id_depense AND id_utilisateur = :id_utilisateur"; 
            
            $req = $bdd->prepare($sql);
            return $req->execute([
                'montant' => $montant,
                'date' => $date,
                'description' => $description,
                'id_categorie' => $id_categorie,
                'id_depense' => $id_depense,
                'id_utilisateur' => $id_utilisateur
            ]);
        } catch (PDOException $e){
            error_log("Erreur: " . $e->getMessage());
            return false;
        }
   }

    public static function supprimer(
        $bdd, 
        $id_depense, 
        $id_utilisateur
        ) 
        {
        try {
            $sql = "DELETE FROM depense WHERE id_depense = :id_depense AND id_utilisateur = :id_utilisateur";
            $req = $bdd->prepare($sql);
            return $req->execute(['id_depense' => $id_depense, 'id_utilisateur' => $id_utilisateur]);
        } catch (PDOException $e) {
            error_log("Erreur lors de la suppression de la dépense: " . $e->getMessage());
            return false;
        }
    }

    // Getters
    public function getIdDepense() {
        return $this->id_depense;
    }
    public function getMontant() {
        return $this->montant;
    }
    public function getDate() {
        return $this->date_creation;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getIdCategorie() {
        return $this->id_categorie;
    }
    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }
}
?>
