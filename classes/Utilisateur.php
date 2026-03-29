<?php
include_once __DIR__ . '/../config/database.php';
class Utilisateur {
    //Attributs privés
    private  $id_utilisateur;
    private  $nom;
    private  $email;
    private  $motdepasse;
    private  $date_inscription;


    //Constructeur
    public function __construct(
        $id_utilisateur,
        $nom,
        $email,
        $motdepasse,
        $date_inscription
    )
    {   
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->date_inscription = $date_inscription;
    }

    //Methodes pour faire l'inscription au niveau d'un utilisateur
    public static function inscrire(
        $bdd, 
        $nom, 
        $email, 
        $motdepasse
        ) 
        {
        try {
            $motdepasse_hash = password_hash($motdepasse, PASSWORD_DEFAULT);
            $date_inscription = date('Y-m-d H:i:s');

            // Insertion dans la base de données avec la méthode prepare pour éviter les injections SQL
            $req = $bdd->prepare("INSERT INTO utilisateur (nom, email, motdepasse, date_inscription)
                                  VALUES (:nom, :email, :motdepasse, :date_inscription)");
            $req->execute(array(
                'nom' => $nom,
                'email' => $email,
                'motdepasse' => $motdepasse_hash,
                'date_inscription' => $date_inscription
            ));
            return $bdd->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'inscription: " . $e->getMessage());
            return false;
        }
    }


// Méthode pour la connexion d'un utilisateur
    public static function connecter(
        $bdd, 
        $email, 
        $motdepasse
        ) 
        {
        try {
            $req = $bdd->prepare("SELECT id_utilisateur, nom, email, motdepasse, date_inscription
                                  FROM utilisateur WHERE email = :email");
            $req->execute(array('email' => $email));
            $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

            // Vérification du mot de passe
            if ($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])) {
                return new Utilisateur(
                    $utilisateur['id_utilisateur'],
                    $utilisateur['nom'],
                    $utilisateur['email'],
                    $utilisateur['motdepasse'],
                    $utilisateur['date_inscription']
                );
            }
                return null; //Pour juste dire qu'il y a une erreur de connexion
        }
        catch (PDOException $e) {
            error_log("Erreur lors de la connexion: " . $e->getMessage());
            return null;
        }
    }

    //Methode pour la deconnexion d'un utilisateur
    public static function deconnecter() {
        session_destroy();
    }

    //Accesseur (getter) pour le profil de l'utilisateur
    public function getIdUtilisateur(){
        return $this->id_utilisateur;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getDateInscription(){
        return $this->date_inscription;
    }
        
    // Mutateurs (setters) pour mettre à jour les informations de l'utilisateur
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMotdepasse($motdepasse) {
        $this->motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
    }

    // Vérifie si l'utilisateur est connecté
    public static function estConnecte() {
        return isset($_SESSION['utilisateur_id']) && !empty($_SESSION['utilisateur_id']);
    }
}



