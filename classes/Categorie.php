<?php

include_once __DIR__ . '/../config/database.php';

class Categorie {
    private $id_categorie;
    private $nom;
    private $couleur;

    public function __construct(
        $id_categorie, 
        $nom, 
        $couleur
        ) {
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->couleur = $couleur;
    }

    // Méthode pour ajouter une catégorie
    public static function ajouter($nom, $couleur) {
        global $bdd;
        $sql = "INSERT INTO categorie (nom, couleur) 
                VALUES (:nom, :couleur)";
        $req = $bdd->prepare($sql);
        $req->execute(['nom' => $nom, 'couleur' => $couleur]);
        return $bdd->lastInsertId();
    }

    // Méthode pour récupérer toutes les catégories
    public static function getAll($bdd = null) {
        if ($bdd === null) {
            global $bdd;
        }
        
        if (!$bdd) { return []; }

        $sql = "SELECT id_categorie, nom, couleur FROM categorie";
        $req = $bdd->query($sql);
        return $req->fetchAll(PDO::FETCH_ASSOC); //Ici on retourne toutes les ligens du resultat de sql sous forme de tableau associatif
    }

    // Getters
    public function getIdCategorie() { return $this->id_categorie; }
    public function getNom() { return $this->nom; }
    public function getCouleur() { return $this->couleur; }
}
?>