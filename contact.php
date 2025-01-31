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
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/parallax/jarallax.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/dropdown/css/style.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/socicon/css/styles.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/theme/css/style.css?rnd=1737894518537">
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/recaptcha.css?rnd=1737894518537">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap"></noscript>
  <link rel="stylesheet" href="https://r.mobirisesite.com/1137313/assets/css/mbr-additional.css?rnd=1737894518537" type="text/css">
  <link rel="stylesheet" href="frontend\css\contact.css">
  


</head>
<body>

<?php
 include 'header.php';
 ?>

    <section class="contact-page">
        <div class="contact-container">
            <h2>Contactez-nous</h2>
            <p>N'hésitez pas à nous contacter pour toute question ou information.</p>
            <div class="contact-info">
               
                <div class="contact-form">
                      <form>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" placeholder="Nom" name="nom">
                            <label for="email">Adresse Mail :</label>
                            <input type="text" id="email" placeholder="Adresse Mail" name="email">
                            <label for="objet">Objet du Message :</label>
                            <input type="text" id="objet" placeholder="Objet du Message" name="objet">
                            <label for="message">Votre Message :</label>
                            <textarea id="message" cols="30" rows="10" placeholder="Votre Message" name="message"></textarea>
                            <button class="button-link">
                                <a href="#">Envoyer le Message</a>
                            </button>
                     </form>

                </div>
                <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.484228993378!2d-9.228206287052627!3d32.31530949753792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac2e5d2058e4e7%3A0x6d3c944c03f0f205!2sEcole%20Sup%C3%A9rieure%20de%20Technologie!5e0!3m2!1sfr!2sma!4v1713960888597!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                 </div>

            </div>

         

         </div>


    </section>


    <?php
include 'footer.php'
?>

    
    
    
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