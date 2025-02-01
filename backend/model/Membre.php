<?php
class Membre extends User {
    private array $projets = [];
    private array $publications = [];

    public function ajouterProjet(Projet $projet): void {
        $this->projets[] = $projet;
        echo "Projet ajouté: " . $projet->getDescription() . "\n";
    }

    public function ajouterPublication(string $publication): void {
        $this->publications[] = $publication;
        echo "Publication ajoutée: " . $publication . "\n";
    }

    public function voirEtatProjets(): array {
        return $this->projets;
    }
}
?>