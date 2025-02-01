<?php

require_once "../config/database.php";
require_once "../models/User.php";

class AuthController {
    
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirm_password"]);

            if ($password !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user) {
                echo "L'utilisateur existe déjà.";
                return;
            }

            if ($userModel->createUser($name, $email, $hashedPassword)) {
                header("Location: /views/auth/login.php");
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_role"] = $user["role"];
                
                header("Location: /views/dashboard/admin.php");
                exit();
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /views/auth/login.php");
        exit();
    }
}

?>
