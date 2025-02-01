<!DOCTYPE html>
<html lang="fr">
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="https://r.mobirisesite.com/1137313/assets/images/logo.png?rnd=1737894518566" type="image/x-icon">
  <meta name="description" content="Cette plateforme offre un espace collaboratif pour les membres du laboratoire PSSII, facilitant la gestion des projets et publications tout en étant accessible sur divers appareils.">
  <title>PSSII Lab Hub</title>
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1737894518536">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/bootstrap/css/bootstrap.min.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/theme/css/style.css?rnd=1737894518537">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/css/mbr-additional.css?rnd=1737894518537" type="text/css">
  <link rel="stylesheet" href="..\frontend\css\admin_dashboard.css">

</head>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once 'core.php';
    include_once 'auth.php';
    // Vérification du rôle de l'utilisateur
    if (!isLoggedIn() || $_SESSION['user_role'] !== 'administrateur') {
        header('Location: login.php');
        exit();
    }
    $msg = null;
    // Traitement des actions des formulaires
    // Gestion des projets
        // if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add_projet'){
        //     if (hasPermission('modifier_projet', $_SESSION['user_role'])) {
        //         $titre = $_POST['titre'];
        //        $description = $_POST['description'];
        //         $date_debut = $_POST['date_debut'];
        //        $date_fin = $_POST['date_fin'];
        //         $financements = $_POST['financements'];

        //        $conn = connectDB();
        //          $sql = "INSERT INTO projets (titre, description, date_debut, date_fin, financements) VALUES (?, ?, ?, ?, ?)";
        //          $stmt = $conn->prepare($sql);
        //          $stmt->bind_param("sssss", $titre, $description, $date_debut, $date_fin, $financements);
        //          if($stmt->execute())
        //          {
        //            $msg = 'Projet ajouté';
        //            }
        //          else
        //          {
        //                $msg = 'Erreur lors de l\'ajout de projet';
        //          }
        //         $conn->close();
        //  }
        //  else
        //     {
        //        $msg = "Vous n'avez pas les droits pour cette action";
        //    }
// }


  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_projet'){
     
    $projet_id = $_POST['projet_id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    //$date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $financements = $_POST['financements'];
    $delete = isset($_POST['delete']) ? true : false;
    $projet = new Projet( $projet_id, $titre,$description,[],$financements,);
      
  }
  
  
  
  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_publication'){

  }


    // Gestion des membres
  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add_membre'){
        
  }



  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_membre'){
     
  }

 include 'header.php';
?>




    <div class="container">
           <h1>Tableau de bord administrateur</h1>
            <?php if ($msg !== null) echo '<p>'. $msg .'</p>'; ?>
            
        <section class="admin-section">
                <h2>Modifier/Supprimer un Projet</h2>
                <form action="admin_dashboard.php" method="post">
                    <input type="hidden" name="action" value="edit_projet">
                    <label for="projet_id">ID du projet à modifier :</label>
                       <input type="text" name="projet_id" required>
                    <label for="titre">Nouveau titre (si modification):</label>
                        <input type="text" name="titre">
                      <label for="description">Nouvelle description (si modification):</label>
                          <textarea name="description"></textarea>
                         <label for="date_debut">Date de début (si modification):</label>
                            <input type="date" name="date_debut">
                        <label for="date_fin">Date de fin (si modification):</label>
                           <input type="date" name="date_fin">
                        <label for="financements">Nouveaux financements (si modification):</label>
                           <textarea name="financements"></textarea>
                         <label for="delete">Cochez pour supprimer le projet</label>
                          <input type="checkbox" name="delete">
                      <button type="submit">Modifier/Supprimer</button>
                 </form>
            </section>
                <?php
                
                ?>
       <!-- <section class="admin-section">
                 <h2>Ajouter une Publication</h2>
                  <?php if (hasPermission('ajouter_publication', $_SESSION['user_role'])) { ?>
                 <form action="admin_dashboard.php" method="post">
                    <input type="hidden" name="action" value="add_publication">
                   <label for="titre">Titre :</label>
                    <input type="text" name="titre" required>
                   <label for="auteurs">Auteurs :</label>
                        <input type="text" name="auteurs" required>
                    <label for="type">Type :</label>
                        <input type="text" name="type" required>
                    <label for="date">Date :</label>
                       <input type="date" name="date" required>
                   <label for="lien">Lien :</label>
                        <input type="text" name="lien">
                     <label for="resume">Résumé :</label>
                        <textarea name="resume" required></textarea>
                     <button type="submit">Ajouter</button>
                 </form>
            </section> -->
                <?php } ?>
     <section class="admin-section">
                <h2>Modifier/Supprimer une Publication</h2>
                 <?php if (hasPermission('modifier_publication', $_SESSION['user_role'])) {
                    ?>
                <form action="admin_dashboard.php" method="post">
                    <input type="hidden" name="action" value="edit_publication">
                    <label for="publication_id">ID de la publication à modifier :</label>
                       <input type="text" name="publication_id" required>
                   <label for="titre">Nouveau titre (si modification):</label>
                        <input type="text" name="titre">
                     <label for="auteurs">Nouveaux auteurs (si modification):</label>
                         <input type="text" name="auteurs">
                     <label for="type">Nouveau type (si modification) :</label>
                        <input type="text" name="type">
                    <label for="date">Nouvelle date (si modification):</label>
                       <input type="date" name="date">
                    <label for="lien">Nouveau lien (si modification):</label>
                          <input type="text" name="lien">
                       <label for="resume">Nouveau résumé (si modification):</label>
                         <textarea name="resume"></textarea>
                         <label for="delete">Cochez pour supprimer la publication</label>
                          <input type="checkbox" name="delete">
                    <button type="submit">Modifier/Supprimer</button>
                 </form>
            </section>
                    <?php
                }
                ?>
    <section class="admin-section">
                 <h2>Ajouter un Membre</h2>
                    <?php if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
                    ?>
               <form action="admin_dashboard.php" method="post">
                 <input type="hidden" name="action" value="add_membre">
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
                              while($row = $result->fetch_assoc()) {
                                  echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                             }
                               $conn->close();
                        ?>
                         </select>
                   <button type="submit">Ajouter</button>
                  </form>
            </section>
             <?php
                }
                ?>
     <section class="admin-section">
                <h2>Modifier/Supprimer un Membre</h2>
                    <?php if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
                    ?>
              <form action="admin_dashboard.php" method="post">
                   <input type="hidden" name="action" value="edit_membre">
                   <label for="membre_id">ID du membre à modifier :</label>
                        <input type="text" name="membre_id" required>
                     <label for="nom">Nouveau Nom (si modification):</label>
                       <input type="text" name="nom">
                   <label for="prenom">Nouveau Prénom (si modification) :</label>
                        <input type="text" name="prenom">
                       <label for="role">Nouveau Rôle (si modification) :</label>
                       <select name="role">
                           <option value="chercheur">Chercheur</option>
                           <option value="doctorant">Doctorant</option>
                            <option value="administrateur">Administrateur</option>
                           <option value="partenaire">Partenaire</option>
                       </select>
                    <label for="axe_recherche">Axe de Recherche (si modification) :</label>
                       <select name="axe_recherche">
                       <?php
                            $conn = connectDB();
                            $sql = "SELECT id, nom FROM axes_recherche";
                            $result = $conn->query($sql);
                             while($row = $result->fetch_assoc()) {
                                  echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                            }
                             $conn->close();
                       ?>
                       </select>
                   <label for="delete">Cochez pour supprimer le membre</label>
                     <input type="checkbox" name="delete">
                   <button type="submit">Modifier/Supprimer</button>
             </form>
              <?php } ?>
         </section>
    <section class="admin-section">
                <h2>Utilisateurs en attente de validation</h2>
                 <div class="list_membre">
            <?php
                $conn = connectDB();
                $sql = "SELECT id, nom, prenom, email, role FROM utilisateurs WHERE statut = 'en attente'";
                $stmt = $conn->prepare($sql);
                 $stmt->execute();
               $result_en_attente = $stmt->get_result();
            if ($result_en_attente->num_rows > 0) {
                 while($row = $result_en_attente->fetch_assoc()) {
                    echo '<div class="member-card">';
                     echo ' <p>'. htmlspecialchars($row['nom']) .' '. htmlspecialchars($row['prenom']) .' ('. htmlspecialchars($row['role']) .')</p>';
                   echo '<form action="admin_dashboard.php" method="post">
                         <input type="hidden" name="action" value="edit_membre">
                            <input type="hidden" name="membre_id" value="'. $row["id"] .'">
                            <select name="role">
                               <option value="chercheur">Chercheur</option>
                                 <option value="doctorant">Doctorant</option>
                                <option value="administrateur">Administrateur</option>
                                <option value="partenaire">Partenaire</option>
                           </select>
                            <button type="submit">Valider l\'inscription</button>
                         </form>';
                    echo '</div>';
                  }
             }
            else
                {
                   echo "Aucun membre en attente de validation.";
                 }
                  $conn->close();

             ?>
             </div>
      </section>

    </div>
   

    <?php
include 'footer.php'
?>


</html>