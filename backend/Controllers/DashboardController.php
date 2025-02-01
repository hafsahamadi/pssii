<?php

require_once "../config/database.php";
require_once "../models/User.php";
require_once "../models/Project.php";
require_once "../models/Publication.php";

class DashboardController {
    
    public function getDashboardData() {
        session_start();
        if (!isset($_SESSION["user_id"])) {
            header("Location: /views/auth/login.php");
            exit();
        }

        $userModel = new User();
        $projectModel = new Project();
        $publicationModel = new Publication();

        $totalUsers = $userModel->getTotalUsers();
        $totalProjects = $projectModel->getTotalProjects();
        $totalPublications = $publicationModel->getTotalPublications();

        return [
            "totalUsers" => $totalUsers,
            "totalProjects" => $totalProjects,
            "totalPublications" => $totalPublications
        ];
    }

    public function getUserDashboard() {
        session_start();
        if (!isset($_SESSION["user_id"])) {
            header("Location: /views/auth/login.php");
            exit();
        }

        $userId = $_SESSION["user_id"];
        $projectModel = new Project();
        $publicationModel = new Publication();

        $userProjects = $projectModel->getProjectsByUser($userId);
        $userPublications = $publicationModel->getPublicationsByUser($userId);

        return [
            "userProjects" => $userProjects,
            "userPublications" => $userPublications
        ];
    }
}

?>
