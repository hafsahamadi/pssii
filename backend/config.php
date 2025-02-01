<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'labo_pssii');

function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }
    return $conn;
}

function getProjects() {
    $conn = connectDB();
    $sql = "SELECT * FROM projets";
    $result = $conn->query($sql);
    
    $projects = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }
    $conn->close();
    return $projects;
}

function getPublications() {
    $conn = connectDB();
    $sql = "SELECT * FROM publications";
    $result = $conn->query($sql);
    
    $publications = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $publications[] = $row;
        }
    }
    $conn->close();
    return $publications;
}
?>
