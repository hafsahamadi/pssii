<?php
    include_once 'core.php';
    include_once 'auth.php';
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
    // Récupérer l'ID de la publication depuis l'URL
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $publication_id = $_GET['id'];
  }
  else {
    echo "Identifiant invalide";
    exit();
 }
 // Récupérer les informations sur la publication de la base de données
  $conn = connectDB();
      $sql = "SELECT * FROM publications WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $publication_id);
        $stmt->execute();
       $result = $stmt->get_result();
    if ($result->num_rows !== 1) {
        echo "Cette publication n'existe pas";
        exit();
    }
  $publication = $result->fetch_assoc();
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
  


</head>
<body>

<?php
include 'header.php'
?>

    <section class="detail-publication">
        <div class="detail-container">
             <h2><?php echo htmlspecialchars($publication['titre']); ?></h2>
             <p>Auteurs :<?php echo htmlspecialchars($publication['auteurs']); ?></p>
             <p>Type : <?php echo htmlspecialchars($publication['type']); ?></p>
              <p>Date : <?php echo htmlspecialchars($publication['date']); ?></p>
              <p>Résumé :<?php echo htmlspecialchars($publication['resume']); ?></p>
              <p>Lien :<a href="<?php echo htmlspecialchars($publication['lien']); ?>" target="blank"> Accéder à la publication</a></p>
            </div>
    </section>
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

     <script>
    document.addEventListener('DOMContentLoaded', function() {
          const smallMenu = document.querySelector(".small_menu");
          const menu = document.querySelector(".menu");

          smallMenu.addEventListener('click', function() {
            smallMenu.classList.toggle('active');
            menu.classList.toggle('small');
          });
        });

    </script>
</body>
</html>