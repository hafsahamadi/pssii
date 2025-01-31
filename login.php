<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once 'core.php';
    include_once 'auth.php';
    $msg = null;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $loginResult = loginUser($email, $mot_de_passe);
        if($loginResult === true){
            header('Location: index.php');
            exit();
        } else {
            $msg = $loginResult;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Laboratoire de Recherche</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 400;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            color: #333;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 1rem;
            color: #777;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: #ff4444;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion au Laboratoire</h2>
        <?php if ($msg !== null) echo '<p class="error-message">'. $msg .'</p>'; ?>
        <form action="login.php" method="post">
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>
            <button type="submit">Se connecter</button>
            <p>Pas encore membre ? <a href="register.php">Inscrivez-vous</a></p>
        </form>
    </div>
</body>
</html>