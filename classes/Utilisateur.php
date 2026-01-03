<?php

class Utilisateur {
    //Attributs privés
    private int $id;
    private string $nom;
    private string $email;
    private string $motdepasse;
    private string $date_inscription;


    //Constructeur
    public function __construct(
        string $nom,
        string $email,
        string $motdepasse,
        string $date_inscription
    )
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->date_inscription = date("Y-m-d");
    }

    //Methodes
    public function inscription(): bool
    {
        //Base de donnée
        return true;
    }

    public function connexion(string $motdepasse): bool
    {
        return password_verify($motdepasse, $this->motdepasse);
    }

    public function deconnexion(): void
    {
        session_destroy();
    }

    //Accesseur
    public function getProfil(): array
    {
        return[
            "nom" => $this->nom,
            "email" => $this->email,
            "date_inscription" => $this->date_inscription
        ];
    }
}

?>
