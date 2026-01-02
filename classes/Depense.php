<?php
class Depense {
    //Attributs privés
    private int $id;
    private string $nom;
    private string $description;
    private int $user_id;
    private \DateTime $date_creation;
    private int $categorie_id;

    // Methodes
    public function __construct(
        int $id,
        string $nom,
        string $description,
        int $user_id,
        \DateTime $date_creation,
        int $categorie_id
    )
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->user_id = $user_id;
        $this->date_creation = new \DateTime();
    }

    public function ajouter():bool
    {
        return false;
    }

    public function modifier():bool
    {
        return false;
    }

    public function supprimer():bool
    {
        return false;
    }

    public function getUserId(): void
    {
        $this->user_id;
    }

    public function listerParUsers($user_id): array
    {
        return[];
    }

}

?>

