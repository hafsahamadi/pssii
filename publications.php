<?php
    include_once 'core.php';
    include_once 'auth.php';
    
?>
<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="https://r.mobirisesite.com/1137313/assets/images/logo.png?rnd=1737894518566" type="image/x-icon">
  <meta name="description" content="Cette plateforme offre un espace collaboratif pour les membres du laboratoire PSSII, facilitant la gestion des projets et publications tout en étant accessible sur divers appareils.">
  <title>PSSIILab </title>
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

<section class="publications-page py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nos Publications Scientifiques</h2>
            <p class="text-center mb-4">Explorez nos dernières publications scientifiques.</p>
        <div class="row">
           <?php
               if(isLoggedIn())
                  {
                    $conn = connectDB();
                        $sql = "SELECT id, titre, auteurs, resume FROM publications";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                         while($row = $result->fetch_assoc()) {
                              echo '<div class="col-md-4 mb-4">
                                       <div class="card shadow-sm border-light">
                                         <img src="images/publication-placeholder.jpg" class="card-img-top" alt="Publication Image">
                                             <div class="card-body">
                                               <h5 class="card-title">'. $row["titre"] .'</h5>
                                            <p class="card-text">'. substr($row["resume"], 0, 150) .'...</p>
                                          <p class="text-muted">Auteurs : '. $row["auteurs"] .'</p>
                                        <a href="detail_publication.php?id='. $row["id"] .'" class="btn btn-primary">Voir Plus</a>
                                   </div>
                             </div>
                           </div>';
                      }
                    }
                else
                    {
                        echo "<p class='text-center w-100'>Connectez-vous pour pouvoir visualiser nos différentes publications</p>";
                  }
                        $conn->close();
             }
            else
                {
                      echo "<p class='text-center w-100'>Connectez-vous pour pouvoir visualiser nos différentes publications</p>";
                }

                ?>
              </div>
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


