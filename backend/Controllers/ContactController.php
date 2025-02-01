<?php

require_once "../models/Contact.php";

class ContactController {
    
    public function sendMessage() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $subject = trim($_POST["subject"]);
            $message = trim($_POST["message"]);

            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
                echo "Tous les champs sont requis.";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Adresse e-mail invalide.";
                return;
            }

            $contactModel = new Contact();
            if ($contactModel->saveMessage($name, $email, $subject, $message)) {
                echo "Message envoyé avec succès.";
            } else {
                echo "Erreur lors de l'envoi du message.";
            }
        }
    }

    public function getAllMessages() {
        $contactModel = new Contact();
        return $contactModel->getAllMessages();
    }
}

?>