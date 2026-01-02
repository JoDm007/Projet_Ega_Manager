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
    {}

}   

?>