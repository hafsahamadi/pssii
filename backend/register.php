<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
include_once 'core.php';
include_once 'auth.php';
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];
     $axe_recherche_id = $_POST['axe_recherche'];
    $msg =  registerUser($nom, $prenom, $email, $mot_de_passe, $role, $axe_recherche_id);
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
            <?php if ($msg !== null) echo '<p>'. $msg .'</p>'; ?>
        <form action="register.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required>
            <label for="email">Email :</label>
            <input type="email" name="email" required>
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>
            <label for="role">Rôle :</label>
                <select name="role" required>
                  <option value="chercheur">Chercheur</option>
                   <option value="doctorant">Doctorant</option>
                 <option value="administrateur">Administrateur</option>
                  <option value="partenaire">Partenaire</option>
                 </select>

             <label for="axe_recherche">Axe de Recherche :</label>
                <select name="axe_recherche" required>
                    <?php
                        $conn = connectDB();
                        $sql = "SELECT id, nom FROM axes_recherche";
                        $result = $conn->query($sql);

                      if(!$result)
                        {
                            echo "Erreur lors de l'exécution de la requête :". $conn->error . '<br>';
                        }
                           else if ($result->num_rows > 0) {
                               echo  "Nombre d'axe de recherche :" . $result->num_rows  . '<br>';

                           while($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                                }
                        }
                        else {
                             echo "Aucun axes de recherche trouvé.";
                        }
                            $conn->close();
                        ?>
                  </select>
            <button type="submit" style="display:block; width: 100%; padding: 12px;background-color: var(--accent-color);border: none;border-radius: 5px;color: var(--light-color);font-weight: bold;cursor: pointer;transition: background-color 0.3s ease;font-family: 'Rubik', sans-serif; margin-top: 10px;">S'inscrire</button>
            <p>Déjà membre ? <a href="login.php">Connectez-vous</a></p>
        </form>
    </div>
</body>
</html>