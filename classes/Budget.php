<?php
include_once __DIR__ . '/../config/database.php';

class Budget {
    private $id_budget;
    private $montant_limite;
    private $mois;
    private $annee;
    private $id_categorie;
    private $id_utilisateur;

    public function __construct(
        $id_budget, 
        $montant_limite, 
        $mois, 
        $annee,
        $id_categorie, 
        $id_utilisateur
        ) 
        {
        $this->id_budget = $id_budget;
        $this->montant_limite = $montant_limite;
        $this->mois = $mois;
        $this->annee = $annee;
        $this->id_categorie = $id_categorie;
        $this->id_utilisateur = $id_utilisateur;
    }


    public static function ajouter(
        $bdd, 
        $montant_limite, 
        $mois, 
        $annee, 
        $id_utilisateur, 
        $id_categorie
        )
        {
        $sql = "INSERT INTO budget (montant_limite, mois, annee, id_utilisateur, id_categorie) 
                VALUES (:montant_limite, :mois, :annee, :id_utilisateur, :id_categorie)";
        
        $req = $bdd->prepare($sql);
        
        return $req->execute([
            'montant_limite' => $montant_limite,
            'mois'           => $mois,
            'annee'          => $annee,
            'id_utilisateur' => $id_utilisateur,
            'id_categorie'   => $id_categorie
        ]);
    }

    public static function getByUtilisateur($id_utilisateur, $mois = null, $annee = null) {
        global $bdd;

        if ($mois === null) {
            $mois = date('m');
        }
        if ($annee === null) {
            $annee = date('Y');
        }
        $sql = "SELECT b.*, c.nom as nom_categorie FROM budget b 
                JOIN categorie c ON b.id_categorie = c.id_categorie 
                WHERE b.id_utilisateur = :id_utilisateur AND b.mois = :mois AND b.annee = :annee";
        $req = $bdd->prepare($sql);
        $req->execute(['id_utilisateur' => $id_utilisateur, 'mois' => $mois, 'annee' => $annee]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getters
    public function getIdBudget() { 
        return $this->id_budget; 
        }
    public function getMontantLimite() { 
        return $this->montant_limite; 
        }
    public function getMois() { 
        return $this->mois; 
        }
    public function getAnnee() { 
        return $this->annee; 
        }
    public function getIdCategorie() { 
        return $this->id_categorie; 
        }
    public function getIdUtilisateur() { 
        return $this->id_utilisateur; 
        }
    }
?>
