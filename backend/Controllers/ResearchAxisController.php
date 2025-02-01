<?php

require_once "../config/database.php";
require_once "../models/ResearchAxis.php";

class ResearchAxisController {
    
    public function getAllResearchAxes() {
        $researchAxisModel = new ResearchAxis();
        return $researchAxisModel->getAllResearchAxes();
    }

    public function getResearchAxisById($id) {
        $researchAxisModel = new ResearchAxis();
        return $researchAxisModel->getResearchAxisById($id);
    }

    public function createResearchAxis() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $description = trim($_POST["description"]);

            $researchAxisModel = new ResearchAxis();
            if ($researchAxisModel->createResearchAxis($name, $description)) {
                header("Location: /views/research_axes/list.php");
            } else {
                echo "Erreur lors de la création de l'axe de recherche.";
            }
        }
    }

    public function updateResearchAxis() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $name = trim($_POST["name"]);
            $description = trim($_POST["description"]);

            $researchAxisModel = new ResearchAxis();
            if ($researchAxisModel->updateResearchAxis($id, $name, $description)) {
                header("Location: /views/research_axes/list.php");
            } else {
                echo "Erreur lors de la mise à jour de l'axe de recherche.";
            }
        }
    }

    public function deleteResearchAxis() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $researchAxisModel = new ResearchAxis();
            if ($researchAxisModel->deleteResearchAxis($id)) {
                header("Location: /views/research_axes/list.php");
            } else {
                echo "Erreur lors de la suppression de l'axe de recherche.";
            }
        }
    }
}

?>