<?php
    include_once 'config.php';

    function registerUser($nom, $prenom, $email, $mot_de_passe, $role, $axe_recherche_id) {
        $conn = connectDB();
            $sql = "SELECT email FROM utilisateurs WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
             $stmt->execute();
             $result = $stmt->get_result();
             if($result->num_rows > 0)
            {
                return "Cet email est déjà pris";
            }
            $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

         $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, axe_recherche_id, statut) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
         $stmt->bind_param("sssssis", $nom, $prenom, $email, $hashed_password, $role, $axe_recherche_id, 'en attente');

         if ($stmt->execute()) {
             $stmt->close();
              $conn->close();
            return "Inscription réussie !";
         } else {
             $stmt->close();
              $conn->close();
             return "Erreur lors de l'inscription.";
        }
     }

    function loginUser($email, $mot_de_passe) {
          $conn = connectDB();
            $sql = "SELECT id, mot_de_passe, role, statut FROM utilisateurs WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
               if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
                  if($user['statut'] === 'actif')
                   {
                        $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_role'] = $user['role'];
                     $_SESSION['user_statut'] = $user['statut'];
                  $stmt->close();
                  $conn->close();
                   return true;
                }
                  else
                   {
                       $stmt->close();
                     $conn->close();
                       return "Votre compte est en attente de validation par un administrateur.";
                    }
                }
                else {
                    $stmt->close();
                    $conn->close();
                     return "Mot de passe incorrect.";
                }
            }
        else
           {
                $stmt->close();
                 $conn->close();
                return "L'email n'existe pas";
            }

    }

    function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

        function logoutUser() {
            session_unset();
          session_destroy();
        header('Location: index.php?logout=1');
          exit();
        }
 function hasPermission($permission, $role) {
      // Les permissions de l'administrateur.
      if ($role === 'administrateur') {
           return true;
         }
           if ($role === 'directeur' && ($permission === 'modifier_projet' || $permission === 'valider_publication')) {
         return true;
          }
            if ($role === 'directeur adjoint' && $permission === 'modifier_projet') {
                 return true;
             }
            // Les permissions du chercheur.
            if ($role === 'chercheur' && $permission === 'ajouter_publication'  ||  $permission === 'visualiser_rapport' ) {
                 return true;
            }
            // Les permissions pour la consultation de certaines pages et du tableau de bord.
            if($permission === 'visualiser_projet' && ($role === 'chercheur' ||  $role === 'doctorant' ||  $role === 'partenaire' || $role === 'directeur' || $role === 'directeur adjoint') )
             {
                   return true;
                }
        return false;
    }
?>