<?php

class Budget {
    //Attributs privés
    private int $id;
    private float $montant_limite;
    private string $semaine;
    private int $mois;
    private int $annee;
    private int $user_id;
    private int $categorie_id;


    //Constructeur
    public function __construct(
        string $semaine,
        float $montant_limite,
        int $mois,
        int $annee,
        int $user_id,
        int $categorie_id
    )
    {
        $this->semaine = $semaine;
        $this->montant_limite = $montant_limite;
        $this->mois = $mois;
        $this->annee = $annee;
        $this->user_id = $user_id;
        $this->categorie_id = $categorie_id;
    }

    //Methodes
    public function definirBudget(): bool
    {
        //Base de donnée
        return true;
    }
    public function verifierDeplassement(): float
    {
        return 0.0;
    }
    
}   

?>