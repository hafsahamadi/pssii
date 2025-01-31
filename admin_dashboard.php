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
        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add_projet'){
            if (hasPermission('modifier_projet', $_SESSION['user_role'])) {
                $titre = $_POST['titre'];
               $description = $_POST['description'];
                $date_debut = $_POST['date_debut'];
               $date_fin = $_POST['date_fin'];
                $financements = $_POST['financements'];

               $conn = connectDB();
                 $sql = "INSERT INTO projets (titre, description, date_debut, date_fin, financements) VALUES (?, ?, ?, ?, ?)";
                 $stmt = $conn->prepare($sql);
                 $stmt->bind_param("sssss", $titre, $description, $date_debut, $date_fin, $financements);
                 if($stmt->execute())
                 {
                   $msg = 'Projet ajouté';
                   }
                 else
                 {
                       $msg = 'Erreur lors de l\'ajout de projet';
                 }
                $conn->close();
         }
         else
            {
               $msg = "Vous n'avez pas les droits pour cette action";
           }
 }
  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_projet'){
      if (hasPermission('modifier_projet', $_SESSION['user_role'])) {
         $projet_id = $_POST['projet_id'];
             $titre = $_POST['titre'];
           $description = $_POST['description'];
           $date_debut = $_POST['date_debut'];
          $date_fin = $_POST['date_fin'];
            $financements = $_POST['financements'];
             $delete = isset($_POST['delete']) ? true : false;

            $conn = connectDB();
         if ($delete) {
                $sql = "DELETE FROM projets WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $projet_id);
                  if($stmt->execute())
               {
                      $msg = "Projet supprimé";
                }
                  else
                  {
                    $msg = "Problème lors de la suppression du projet";
                  }
           }
           else {
                 $sql = "UPDATE projets SET titre = ?, description = ?, date_debut = ?, date_fin = ?, financements = ? WHERE id = ?";
                  $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssssi", $titre, $description, $date_debut, $date_fin, $financements,$projet_id);
                   if($stmt->execute())
                     {
                       $msg = 'Projet modifié';
                      }
                   else
                      {
                         $msg = 'Erreur lors de la modification du projet';
                     }
            }
           $conn->close();
     }
         else
          {
             $msg = "Vous n'avez pas les droits pour cette action";
        }
  }
        // Gestion des publications
        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add_publication'){
             if (hasPermission('ajouter_publication', $_SESSION['user_role'])) {
                 $titre = $_POST['titre'];
                 $auteurs = $_POST['auteurs'];
               $type = $_POST['type'];
                 $date = $_POST['date'];
                $lien = $_POST['lien'];
                  $resume = $_POST['resume'];

                 $conn = connectDB();
                    $sql = "INSERT INTO publications (titre, auteurs, type, date, lien, resume) VALUES (?, ?, ?, ?, ?, ?)";
                     $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $titre, $auteurs, $type, $date, $lien, $resume);
                   if($stmt->execute())
                    {
                          $msg = 'Publication ajoutée';
                    }
                      else
                   {
                         $msg = 'Erreur lors de l\'ajout de la publication';
                    }
                       $conn->close();
             }
              else
                {
                     $msg = "Vous n'avez pas les droits pour cette action";
                }
         }
  if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_publication'){
         if (hasPermission('modifier_publication', $_SESSION['user_role'])) {
            $publication_id = $_POST['publication_id'];
            $titre = $_POST['titre'];
            $auteurs = $_POST['auteurs'];
             $type = $_POST['type'];
             $date = $_POST['date'];
              $lien = $_POST['lien'];
               $resume = $_POST['resume'];
            $delete = isset($_POST['delete']) ? true : false;

           $conn = connectDB();
            if ($delete) {
                 $sql = "DELETE FROM publications WHERE id = ?";
                 $stmt = $conn->prepare($sql);
                   $stmt->bind_param("i", $publication_id);
                  if($stmt->execute())
                     {
                           $msg = "Publication supprimée";
                      }
                else
                   {
                       $msg =  "Problème lors de la suppression de la publication";
                   }
            }
              else {
                     $sql = "UPDATE publications SET titre = ?, auteurs = ?, type = ?, date = ?, lien = ?, resume = ? WHERE id = ?";
                     $stmt = $conn->prepare($sql);
                      $stmt->bind_param("ssssssi", $titre, $auteurs, $type, $date, $lien, $resume, $publication_id);
                    if($stmt->execute())
                      {
                          $msg =  "Publication modifié";
                     }
                   else
                     {
                       $msg = "Erreur lors de la modification de la publication";
                    }
             }
            $conn->close();
       }
         else
           {
             $msg = "Vous n'avez pas les droits pour cette action";
           }

    }
    // Gestion des membres
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'add_membre'){
         if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
           $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
             $role = $_POST['role'];
             $axe_recherche_id = $_POST['axe_recherche'];
            $conn = connectDB();
              $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
               $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, axe_recherche_id, statut) VALUES (?, ?, ?, ?, ?, ?, 'actif')";
               $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $nom, $prenom, $email, $hashed_password, $role, $axe_recherche_id);

              if ($stmt->execute()) {
                    $msg = 'Membre ajouté';
              }
               else
              {
                     $msg =  'Erreur lors de l\'ajout du membre';
               }
              $conn->close();
        }
      else
         {
               $msg = "Vous n'avez pas les droits pour cette action";
          }

    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'edit_membre'){
      if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
           $membre_id = $_POST['membre_id'];
          $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
          $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
          $role = isset($_POST['role']) ? $_POST['role'] : '';
          $axe_recherche_id = isset($_POST['axe_recherche']) && is_numeric($_POST['axe_recherche']) ? $_POST['axe_recherche'] : NULL;

         $delete = isset($_POST['delete']) ? true : false;

         $conn = connectDB();
         if ($delete) {
               $sql = "DELETE FROM utilisateurs WHERE id = ?";
                 $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $membre_id);
                  if($stmt->execute())
               {
                    $msg =  'Membre supprimé';
                 }
                 else
                   {
                     $msg = "Erreur lors de la suppression du membre";
                 }
         }
             else {
                $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, role = ?, axe_recherche_id = ? WHERE id = ?";
                   $stmt = $conn->prepare($sql);
                 $stmt->bind_param("sssii", $nom, $prenom, $role, $axe_recherche_id,$membre_id);
                if($stmt->execute())
                   {
                       $msg =  'Membre modifié';
                   }
                   else
                 {
                     $msg = "Erreur lors de la modification du membre";
                }
       }
          $conn->close();
     }
      else
        {
          $msg = "Vous n'avez pas les droits pour cette action";
     }

 }

?>
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
   <link rel="stylesheet" href="admin_dashboard.css">
<style>
.navbar-fixed-top {
  top: auto;
}
#mobirisePromo.container-banner {
  height: 8rem;
  opacity: 1;
  -webkit-animation: 11s linear animationHeight;
  -moz-animation: 11s linear animationHeight;
    -o-animation: 11s linear animationHeight;
       animation: 11s linear animationHeight;
       transition: all  0.5s;
}
#mobirisePromo.container-banner.container-banner-closing {
  pointer-events: none;
  height: 0;
  opacity: 0;
  -webkit-animation: 0.5s linear animationClosing;
  -moz-animation:  0.5s linear animationClosing;
    -o-animation:  0.5s linear animationClosing;
       animation:  0.5s linear animationClosing;
}
#mobirisePromo .banner {
  min-height: 8rem;
  position:fixed;
  top: 0;
  left: 0;
  right: 0;
  background: #fff;
  padding: 10px;
  opacity:1;
  -webkit-animation: 11s linear animationBanner;
  -moz-animation: 11s linear animationBanner;
    -o-animation: 11s linear animationBanner;
       animation: 11s linear animationBanner;
  z-index: 1031;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
#mobirisePromo .banner p {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  animation: none;
  visibility: visible;
}
#mobirisePromo .buy-license {
  text-decoration: underline;
}
#mobirisePromo .banner .btn {
  margin: 0.3rem 0.5rem;
  animation: none;
  visibility: visible;
}
.navbar.opened {
    z-index: 1032;
}
.logo {
    display: flex; /* Permet de centrer facilement */
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement si dans un conteneur avec une hauteur définie */
    /* Ajoute un espace autour et centre le logo si dans un conteneur */
    max-width: 45px; /* Limite la taille maximale */
    height: auto; /* Garde les proportions de l'image */
}

.logo img {
    width: 100%; /* Ajuste à la largeur maximale définie par le conteneur .logo */
    height: auto; /* Maintient les proportions */
}

@-webkit-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 91% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-moz-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 91% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-o-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 91% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
   @keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 91% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-webkit-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 8rem; } }
@-moz-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 8rem; } }
@-o-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 8rem; } }
   @keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 8rem; } }

@-webkit-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@-moz-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@-o-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }

</style>
</head>
<body>

<section data-bs-version="5.1" class="menu menu1 careerm5 cid-uAZlXssoJO" once="menu" id="menu-1-uAZlXssoJO">
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="menu_box container-fluid">
             <div class="logo">
                  <img src="images/lapssii.png" alt="Logo du laboratoire PSSII">
              </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-brand d-none d-lg-flex">
                </div>
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Accueil</a></li>
                      <li class="nav-item"><a class="nav-link link text-black display-4 dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Le Laboratoire</a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="projets.php">Projets</a>
                            <a class="dropdown-item" href="publications.php">Publications</a>
                           <a class="dropdown-item" href="membres.php">Membres</a>
                       </div>
                      </li>
                      
                     <li class="nav-item"><a class="nav-link link text-black display-4" href="contact.html">Contact</a></li>
                     <li class="nav-item"><a class="nav-link link text-black display-4" href="a-propos.html">À Propos</a></li>
                    <?php
                      
                      if (!isLoggedIn()) {
                          echo '<li class="nav-item"><a class="nav-link link text-black display-4 login-button" href="login.php">Accès sécurisé</a></li>';
                      } else {
                          if($_SESSION['user_role'] === 'administrateur'){
                              echo '<li class="nav-item"><a class="nav-link link text-black display-4" href="admin_dashboard.php">Tableau de Bord</a></li>';
                            }
                          
                            echo '<li class="nav-item"><a class="nav-link link text-black display-4" href="logout.php">Déconnexion</a></li>';
                      }
                     ?>
                  </ul>

                <div class="mbr-section-btn-main" role="tablist">
                    <a class="btn btn-black-outline display-4" href="#">
                        <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                        Contact us
                    </a>
                </div>
                <div class="offcanvas_box">
                    <button class="btn_offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            
                            <h3 class="mbr-section-subtitle mbr-fonts-style display-5">PSSII</h3>
                            <div class="offcanvas_contact">
                                <p class="mbr-text mbr-fonts-style display-7">Plateforme dynamique pour les chercheurs et partenaires du laboratoire PSSII.</p>
                                <p class="text_widget mbr-fonts-style display-4">
                                    <a href="mailto:contact@pssii.com" class="text-black">contact@pssii.com</a>
                                    <br><br>
                                    <a href="tel:+33 1 23 45 67 89" class="text-black">+33 1 23 45 67 89</a>
                                </p>
                            </div>
                            
                            <div class="mbr-section-btn"><a class="btn btn-black-outline display-4" href="#">
                                    <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                    Rejoignez-nous
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</section>

    <div class="container">
           <h1>Tableau de bord administrateur</h1>
            <?php if ($msg !== null) echo '<p>'. $msg .'</p>'; ?>
            <section class="admin-section">
                <?php if (hasPermission('modifier_projet', $_SESSION['user_role'])) {
                    ?>
                 <h2>Ajouter un Projet</h2>
                  <form action="admin_dashboard.php" method="post">
                        <input type="hidden" name="action" value="add_projet">
                          <label for="titre">Titre :</label>
                           <input type="text" name="titre" required>
                        <label for="description">Description :</label>
                            <textarea name="description" required></textarea>
                         <label for="date_debut">Date de début :</label>
                           <input type="date" name="date_debut" required>
                         <label for="date_fin">Date de fin :</label>
                           <input type="date" name="date_fin" required>
                            <label for="financements">Financements :</label>
                         <textarea name="financements"></textarea>

                            <button type="submit">Ajouter</button>
                    </form>
        </section>
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
                }
                ?>
       <section class="admin-section">
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
            </section>
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
   


    <section data-bs-version="5.1" class="footer1 careerm5 cid-uAZlXtgzRP" once="footers" id="footer-1-uAZlXtgzRP">
<div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-6">
                <div class="title-wrapper">
                    <h3 class="mbr-section-title mbr-fonts-style display-5">À Propos</h3>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="contacts-wrapper">
                    <h4 class="mbr-section-subtitle mbr-fonts-style display-7">Suivez-Nous</h4>
                    <ul class="list mbr-fonts-style display-4">
                        <li class="item-wrap">                            Adresse:
                             Morocco</li>
                        <li class="item-wrap">Téléphone: 
                            <a href="tel:01 23 45 67 89" class="text-white">01 23 45 67 89</a></li>
                        <li class="item-wrap">Email:
                            <a href="mailto:contact@pssii.fr" class="text-white">contact@pssii.fr</a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="list-wrapper">
                    <h4 class="mbr-section-subtitle mbr-fonts-style display-7">Liens Utiles</h4>
                    <ul class="list mbr-fonts-style display-4">
                        <li class="item-wrap"><a href="index.php" class="text-white">Accueil</a></li>
                        <li class="item-wrap"><a href="projets.php" class="text-white">Projets</a></li>
                        <li class="item-wrap"><a href="publications.php" class="text-white">Publications</a></li>
                        <li class="item-wrap"><a href="membres.php" class="text-white">Membres</a></li>
                        <li class="item-wrap"><a href="contact.html" class="text-white">Contact</a></li>
            
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-6">
                <div class="soc-wrapper">
                    <h4 class="mbr-section-subtitle mbr-fonts-style display-7">Réseaux Sociaux</h4>
                    <ul class="list mbr-fonts-style display-4">
                        <li class="item-wrap"><a href="#" class="text-white">Facebook</a></li>
                        <li class="item-wrap"><a href="#" class="text-white">Twitter</a></li>
                        <li class="item-wrap"><a href="#" class="text-white">LinkedIn</a></li>
                        <li class="item-wrap"><a href="#" class="text-white">Instagram</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <p class="copyright mbr-fonts-style display-4">© 2025 PSSII. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</section>
</html>