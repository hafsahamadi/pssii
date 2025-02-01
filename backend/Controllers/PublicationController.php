<?php

require_once "../config/database.php";
require_once "../models/Publication.php";

class PublicationController {
    
    public function getAllPublications() {
        $publicationModel = new Publication();
        $publications = $publicationModel->getAllPublications();
        return $publications;
    }

    public function getPublicationById($id) {
        $publicationModel = new Publication();
        return $publicationModel->getPublicationById($id);
    }

    public function createPublication() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST["title"]);
            $author = trim($_POST["author"]);
            $year = trim($_POST["year"]);
            $type = trim($_POST["type"]);
            $file = $_FILES["file"]; 

            if ($file["error"] == 0) {
                $targetDir = "../storage/publication_pdfs/";
                $targetFile = $targetDir . basename($file["name"]);
                move_uploaded_file($file["tmp_name"], $targetFile);
            } else {
                echo "Erreur lors du téléchargement du fichier.";
                return;
            }

            $publicationModel = new Publication();
            if ($publicationModel->createPublication($title, $author, $year, $type, $targetFile)) {
                header("Location: /views/publications/list.php");
            } else {
                echo "Erreur lors de la création de la publication.";
            }
        }
    }

    public function updatePublication() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = trim($_POST["title"]);
            $author = trim($_POST["author"]);
            $year = trim($_POST["year"]);
            $type = trim($_POST["type"]);

            $publicationModel = new Publication();
            if ($publicationModel->updatePublication($id, $title, $author, $year, $type)) {
                header("Location: /views/publications/list.php");
            } else {
                echo "Erreur lors de la mise à jour de la publication.";
            }
        }
    }

    public function deletePublication() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $publicationModel = new Publication();
            if ($publicationModel->deletePublication($id)) {
                header("Location: /views/publications/list.php");
            } else {
                echo "Erreur lors de la suppression de la publication.";
            }
        }
    }
}

?>