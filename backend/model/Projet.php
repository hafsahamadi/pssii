<?php
class Projet {
    private string $description;
    private array $membresImpliques;
    private float $financements;
    private array $livrables;

    public function __construct(string $description, array $membresImpliques, float $financements, array $livrables) {
        $this->description = $description;
        $this->membresImpliques = $membresImpliques;
        $this->financements = $financements;
        $this->livrables = $livrables;
    }

    public function getDescription(): string {
        return $this->description;
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