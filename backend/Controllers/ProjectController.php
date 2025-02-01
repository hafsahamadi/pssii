<?php

require_once "../config/database.php";
require_once "../models/Project.php";

class ProjectController {
    
    public function getAllProjects() {
        $projectModel = new Project();
        $projects = $projectModel->getAllProjects();
        return $projects;
    }

    public function getProjectById($id) {
        $projectModel = new Project();
        return $projectModel->getProjectById($id);
    }

    public function createProject() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = trim($_POST["title"]);
            $description = trim($_POST["description"]);
            $startDate = trim($_POST["start_date"]);
            $endDate = trim($_POST["end_date"]);
            $leaderId = trim($_POST["leader_id"]);

            $projectModel = new Project();
            if ($projectModel->createProject($title, $description, $startDate, $endDate, $leaderId)) {
                header("Location: /views/projects/list.php");
            } else {
                echo "Erreur lors de la création du projet.";
            }
        }
    }

    public function updateProject() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = trim($_POST["title"]);
            $description = trim($_POST["description"]);
            $startDate = trim($_POST["start_date"]);
            $endDate = trim($_POST["end_date"]);
            $leaderId = trim($_POST["leader_id"]);

            $projectModel = new Project();
            if ($projectModel->updateProject($id, $title, $description, $startDate, $endDate, $leaderId)) {
                header("Location: /views/projects/list.php");
            } else {
                echo "Erreur lors de la mise à jour du projet.";
            }
        }
    }

    public function deleteProject() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $projectModel = new Project();
            if ($projectModel->deleteProject($id)) {
                header("Location: /views/projects/list.php");
            } else {
                echo "Erreur lors de la suppression du projet.";
            }
        }
    }
}

?>