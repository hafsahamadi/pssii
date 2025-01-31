<?php
    include_once 'core.php';
    include_once 'auth.php';
    if (!isLoggedIn()) {
         header('Location: login.php');
        exit();
    }
    // Récupérer l'ID du projet depuis l'URL
   if (isset($_GET['id']) && is_numeric($_GET['id'])) {
     $projet_id = $_GET['id'];
    }
    else {
         echo "Identifiant invalide";
         exit();
    }
    // Récupérer les informations sur le projet de la base de données
    $conn = connectDB();
      $sql = "SELECT * FROM projets WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $projet_id);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows !== 1) {
          echo "Ce projet n'existe pas";
           exit();
        }
        $projet = $result->fetch_assoc();
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

    <section class="detail-projet">
        <div class="detail-container">
              <h2><?php echo htmlspecialchars($projet['titre']); ?></h2>
               <p><?php echo htmlspecialchars($projet['description']); ?></p>
              <p>Date de début :  <?php echo htmlspecialchars($projet['date_debut']); ?></p>
                <p>Date de fin : <?php echo htmlspecialchars($projet['date_fin']); ?></p>
                <p>Financements : <?php echo htmlspecialchars($projet['financements']); ?></p>
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