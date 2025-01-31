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
  <link rel="stylesheet" href="frontend\css\header.css">

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
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="projets.php">Projets</a></li>
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