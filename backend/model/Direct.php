<?php
class Directeur extends User {
    private array $membres = [];
    private array $projets = [];

    public function voirTousLesProjets(): array {
        return $this->projets;
    }

    public function voirTousLesMembres(): array {
        return $this->membres;
    }
}

?>