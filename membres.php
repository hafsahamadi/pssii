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
  <link rel="stylesheet" href="frontend\css\membres.css">

</head>
<body>

<?php
include 'header.php'
?>

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