<?php
class Projet {

    private string $description;
    private string $titre;
    private int $projet_id;
    private array $membresImpliques;
    private float $financements;
    private array $livrables;

    public function __construct(int $projet_id,String $titre,String $description, array $membresImpliques, float $financements) {
       
       
        $this->projet_id = $projet_id;
        $this->titre = $titre;
        $this->description = $description;
        $this->membresImpliques = $membresImpliques;
        $this->financements = $financements;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getprojet_id(): int {
        return $this->projet_id;
    }

    public function getMembresImpliques(): array {
        return $this->membresImpliques;
    }

    public function getFinancements(): float {
        return $this->financements;
    }

    public function getLivrables(): array {
        return $this->livrables;
    }

    public function ajouterMembre(User $membre): void {
        $this->membresImpliques[] = $membre;
    }

    public function ajouterLivrable(string $livrable): void {
        $this->livrables[] = $livrable;
    }
}

?>