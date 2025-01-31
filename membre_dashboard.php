<?php
    include_once 'core.php';
    include_once 'auth.php';
    // Vérification du rôle de l'utilisateur
    if (!isLoggedIn() || $_SESSION['user_role'] === 'administrateur') {
        header('Location: login.php');
        exit();
    }
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
       $conn = connectDB();
      // Récupérer les informations sur les projets de l'utilisateur
   $sql_projets = "SELECT projets.id, titre, description FROM projets
                INNER JOIN utilisateurs_projets ON projets.id = utilisateurs_projets.projet_id
                WHERE utilisateurs_projets.utilisateur_id = ?";
         $stmt = $conn->prepare($sql_projets);
         $stmt->bind_param("i", $user_id);
         $stmt->execute();
        $result_projets = $stmt->get_result();

       // Récupérer les informations sur les publications de l'utilisateur
      $sql_publications = "SELECT publications.id, titre, auteurs FROM publications
                         INNER JOIN projets_publications ON publications.id = projets_publications.publication_id
                        INNER JOIN utilisateurs_projets ON projets_publications.projet_id = utilisateurs_projets.projet_id
                        WHERE utilisateurs_projets.utilisateur_id = ?";
       $stmt_publications = $conn->prepare($sql_publications);
       $stmt_publications->bind_param("i", $user_id);
        $stmt_publications->execute();
        $result_publications = $stmt_publications->get_result();
        $conn->close();
?>
<!DOCTYPE html>
<html >
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
  <link rel="stylesheet" href="frontend\css\membre_dashboard.css">

</head>
<body>
<?php
include 'header.php'
?>
<div class="container">
    <h1>Tableau de bord <?php echo  htmlspecialchars($user_role); ?></h1>
        <section>
             <h2>Mes Projets</h2>
             <div class="list_projet">
                   <?php
                           if ($result_projets->num_rows > 0) {
                         while($row = $result_projets->fetch_assoc()) {
                             echo '<div class="project-card">
                                     <h3>'. htmlspecialchars($row['titre']) .'</h3>
                                     <p>'. htmlspecialchars($row['description']) .'</p>
                                      <button class="button-link"><a href="detail_projet.php?id='. $row['id'] .'">Voir Plus</a></button>
                                  </div>';
                         }
                      }
                        else {
                               echo "<p>Vous n'êtes pas affecté à aucun projet.</p>";
                        }
                       ?>
             </div>
        </section>
        <section>
             <h2>Mes Publications</h2>
                 <div class="list_publication">
                      <?php
                       if ($result_publications->num_rows > 0) {
                        while($row = $result_publications->fetch_assoc()) {
                              echo '<div class="publication-card">
                                  <h3>'. htmlspecialchars($row['titre']) .'</h3>
                                  <h4>'. htmlspecialchars($row['auteurs']) .'</h4>
                                  <button class="button-link"><a href="detail_publication.php?id='. $row["id"] .'">Voir Plus</a></button>
                            </div>';
                           }
                       }
                         else {
                               echo "<p>Vous n'avez pas de publications.</p>";
                         }
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
</body>
</html>