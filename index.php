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
  <title>PSSII Lab Hub</title>
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1737894518536">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/bootstrap/css/bootstrap.min.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/theme/css/style.css?rnd=1737894518537">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/css/mbr-additional.css?rnd=1737894518537" type="text/css">
  


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

<section data-bs-version="5.1" class="header1 careerm5 cid-uAZlXsuP7s mbr-fullscreen mbr-parallax-background" id="hero-1-uAZlXsuP7s">
      <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="title-wrapper">
                    <h1 class="mbr-section-title mbr-fonts-style display-1">Bienvenue au PSSII</h1>
                    <p class="mbr-text mbr-fonts-style display-7">Votre espace collaboratif pour l'innovation et la recherche.</p>
                    <div class="mbr-section-btn">
                        <a class="btn btn-white-outline display-4" href="#">
                            <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                            Explorez maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features2 careerm5 cid-uAZlXsviMD" id="about-me-1-uAZlXsviMD">
    <div class="container-fluid">
        <div class="row flex-row-reverse">
            <div class="col-12 col-lg-4 card">
                <div class="card-wrapper">
                    
                    <div class="card-content">
                        <h3 class="mbr-section-title mbr-fonts-style display-7">Notre Mission</h3>
                        <p class="mbr-text mbr-fonts-style display-4">Le laboratoire PSSII est un pôle de recherche fédérateur qui met en commun les compétences et les ressources humaines de l'établissement EST Safi depuis son accréditation en 2016. Il regroupe une équipe de 23 enseignants-chercheurs issus des sciences, des sciences pour l'ingénieur, et des sciences de la gestion, œuvrant ensemble pour l'innovation et l'excellence scientifique</p>
                    </div>
                </div>
            </div>
   
        </div>
   
    </div>
</section>
<section data-bs-version="5.1" class="slider2 mbr-embla careerm5 cid-uAZlXsxE11" id="gallery-3-uAZlXsxE11">
     <div class="container-fluid">
        <div class="position-relative row">
            <div class="col-12">
                <div class="title-wrapper">
                    <h2 class="mbr-section-title mbr-fonts-style display-2">Interets de Recherche</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="embla" data-skip-snaps="true" data-align="center" data-contain-scroll="trimSnaps" data-loop="true" data-auto-play="true" data-auto-play-interval="4" data-draggable="true">
                    <div class="embla__viewport">
                        <div class="embla__container">
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1552664730-d307ca884978.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">
                                                    Janvier 2025
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Projet Alpha</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Une avancée majeure en biotechnologie.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>

                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1532619675605-1ede6c2ed2b0.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Décembre 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Publication Beta</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Des résultats qui changent la donne.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1600880292203-757bb62b4baf.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Novembre 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Collaboration Gamma</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Un partenariat fructueux avec l'industrie.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap"> 
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1544027993-37dbfe43562a.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Octobre 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Événement Delta</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Une conférence qui a fait sensation.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1454165804606-c3d57bc86b40.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Septembre 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Atelier Epsilon</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Des idées qui fusent et inspirent.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1521791136064-7986c2920216.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Août 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Recherche Zeta</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Des découvertes qui ouvrent des portes.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="embla__slide slider-image item" style="margin-left: 1rem; margin-right: 1rem;">
                                <div class="card-wrap">
                                    <a href="#">
                                        <div class="item-wrapper position-relative">
                                            <div class="image-wrap">
                                                <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1517245386807-bb43f82c33c4.jpeg" alt="">
                                                <p class="mbr-date mbr-fonts-style display-1">Juillet 2024
                                                </p>
                                            </div>
                                        </div>
                                        <div class="content-wrap">
                                            <p class="mbr-desc mbr-fonts-style display-4">Initiative Theta</p>
                                            <p class="mbr-text mbr-fonts-style display-7">Un projet qui fait bouger les lignes.</p>
                                            <span class="mmobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="embla__button embla__button--prev">
                        <span class="mbr-iconfont mobi-mbri-left mobi-mbri" aria-hidden="true"></span>
                        <span class="sr-only visually-hidden visually-hidden visually-hidden">Previous</span>
                    </button>
                    <button class="embla__button embla__button--next">
                        <span class="mbr-iconfont mobi-mbri-right mobi-mbri" aria-hidden="true"></span>
                        <span class="sr-only visually-hidden visually-hidden visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features6 careerm5 cid-uAZlXsGG0V" id="blog-1-uAZlXsGG0V">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-wrapper">
                    <h2 class="mbr-section-title mbr-fonts-style display-2">Nouvelles du Laboratoire</h2>
                </div>
            </div>
            <div class="col-12 col-lg-4 item features-image">
                <a href="projets.php">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1637094410849-96576479b731.jpeg" alt="" data-slide-to="0" data-bs-slide-to="0">
                            
                        </div>
                    </div>
                    <div class="item-content">
                        
                        <h3 class="mbr-card-title mbr-fonts-style display-5">Les Dernières Innovations</h3>
                        <p class="mbr-desc mbr-fonts-style display-4">Découvrez les projets qui changent le monde.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 card item features-image">
                <a href="publications.php">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1543269865-cbf427effbad.jpeg" alt="" data-slide-to="1" data-bs-slide-to="1">
                            
                        </div>
                    </div>
                    <div class="item-content">
                        
                        <h3 class="mbr-card-title mbr-fonts-style display-5">Événements à Venir</h3>
                        <p class="mbr-desc mbr-fonts-style display-4">Ne manquez pas nos prochaines conférences et ateliers.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-4 item features-image">
                <a href="membres.php">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1590402494587-44b71d7772f6.jpeg" alt="" data-slide-to="2" data-bs-slide-to="2">
                            
                        </div>
                    </div>
                    <div class="item-content">
                        
                        <h3 class="mbr-card-title mbr-fonts-style display-5">Rencontrez Nos Chercheurs</h3>
                        <p class="mbr-desc mbr-fonts-style display-4">Apprenez à connaître les esprits brillants derrière nos projets.</p>
                    </div>
                </a>
            </div>
            <div class="col-12">
                <div class="mbr-section-btn">
                    <a class="btn btn-secondary display-4" href="">
                        <span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>
                                        Lire Plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features4 careerm5 cid-uAZlXsWMnq" id="metrics-1-uAZlXsWMnq">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 card">
                <div class="image-wrapper">
                    <img src="https://r.mobirisesite.com/1137313/assets/images/photo-1557425631-f132f06f4aa1.jpeg" alt="">
                </div>
            </div>
            <div class="counter-container col-12 col-lg-6 card">
                <div class="card-wrapper">
                    <p class="mbr-number mbr-fonts-style display-1">10</p>
                    <h3 class="mbr-section-title mbr-fonts-style display-7">Projets Actifs</h3>
                    <p class="mbr-text mbr-fonts-style display-4">En cours</p>
                </div>
                <div class="card-wrapper">
                    <p class="mbr-number mbr-fonts-style display-1">10</p>
                    <h3 class="mbr-section-title mbr-fonts-style display-7">Publications</h3>
                    <p class="mbr-text mbr-fonts-style display-4">À découvrir</p>
                </div>
                <div class="card-wrapper">
                    <p class="mbr-number mbr-fonts-style display-1">51</p>
                    <h3 class="mbr-section-title mbr-fonts-style display-7">Membres</h3>
                    <p class="mbr-text mbr-fonts-style display-4">Engagés</p>
                </div>
               
            </div>
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
  <script src="https://r.mobirisesite.com/1137313/assets/web/assets/jquery/jquery.min.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/bootstrap/js/bootstrap.bundle.min.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/parallax/jarallax.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/smoothscroll/smooth-scroll.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/ytplayer/index.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/dropdown/js/navbar-dropdown.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/embla/embla.min.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/embla/script.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/mbr-switch-arrow/mbr-switch-arrow.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/mbr-tabs/mbr-tabs.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/playervimeo/vimeo_player.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/vimeoplayer/player.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/theme/js/script.js?rnd=1737894518537"></script>
  <script src="https://r.mobirisesite.com/1137313/assets/formoid.min.js?rnd=1737894518537"></script>
</body>
</html>