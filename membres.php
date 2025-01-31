<?php
    include_once 'core.php';
    include_once 'auth.php';
       if (!isLoggedIn()) {
            header('Location: login.php');
             exit();
      }
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
  <link rel="stylesheet" href="membres.css">
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

@media(max-width: 767px) {
  #mobirisePromo.container-banner {
    height: 12rem;
  }
  #mobirisePromo .banner {
    min-height: 12rem;
  }
  @-webkit-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 91% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-moz-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 91% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-o-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 91% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
    @keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 91% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-webkit-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 12rem; } }
  @-moz-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 12rem; } }
  @-o-keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 12rem; } }
    @keyframes animationHeight { 0% { height: 0; } 91% { height: 0; } 100% { height: 12rem; } }

  @-webkit-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @-moz-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @-o-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
}
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="projets.php" data-listener-added_ffca79ef="true">Projets</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="publications.php">Publications</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="membres.php">Membres</a></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="contact.php">Contact</a></li>
                    <?php
                      
                      if (!isLoggedIn()) {
                          echo '<li class="nav-item"><a class="nav-link link text-black display-4 login-button" href="login.php">Accès sécurisé</a></li>';
                      } else {
                          if($_SESSION['user_role'] === 'administrateur'){
                              echo '<li class="nav-item"><a class="nav-link link text-black display-4" href="admin_dashboard.php">Tableau de Bord</a></li>';
                            } else {
                              if($_SESSION['user_role'] !== 'administrateur'){
                                   echo  '<li class="nav-item"><a class="nav-link link text-black display-4" href="membre_dashboard.php">Tableau de Bord</a></li>';
                               }
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

<section class="members-page y-5">
        <div class="container">
             <h2 class="text-center mb-4">Les Membres du Laboratoire</h2>
             <p class="text-center mb-4">Découvrez nos différents membres</p>
               <div class="members-list">
               <?php
                    $conn = connectDB();
                       $sql = "SELECT utilisateurs.id, utilisateurs.nom, prenom, role, axes_recherche.nom as axe  FROM utilisateurs
                    INNER JOIN axes_recherche ON utilisateurs.axe_recherche_id = axes_recherche.id";
                    $stmt = $conn->prepare($sql);
                      $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                           echo ' <div class="member-card">
                                  <img src="images/membres1.jpg" alt="'. $row['nom'] .'">
                                    <h3>'. $row["nom"] . ' ' . $row["prenom"] .'</h3>
                                    <h4>'. $row["role"] .'</h4>
                                    <p>Axe de recherche : '. $row["axe"] .'</p>
                                     <button class="button-link"><a href="detail_membre.php?id='. $row["id"] .'">Voir le profil</a></button>
                                </div>';
                      }
                  }
                    else{
                       echo 'Aucun membre trouvé dans la base de données';
                    }
                       $conn->close();

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