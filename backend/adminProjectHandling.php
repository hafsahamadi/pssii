<?php 

function get_projets(){
  //return all prjects
}


function edit_projet(){

// Edit project

  if (hasPermission('modifier_projet', $_SESSION['user_role'])) {
      $conn = connectDB();
      if (true) {
         $sql = "DELETE FROM projets WHERE id = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("i", $projet_id);
           if($stmt->execute())
        {
               $msg = "Projet supprimé";
         }
           else
           {
             $msg = "Problème lors de la suppression du projet";
           }
    }
    else {

           
    
                $sql = "UPDATE projets SET titre = ?, description = ?, date_debut = ?, date_fin = ?, financements = ? WHERE id = ?";
                 $stmt = $conn->prepare($sql);
                   $stmt->bind_param("sssssi", $titre, $description, $date_debut, $date_fin, $financements,$projet_id);
                  if($stmt->execute())
                    {
                      $msg = 'Projet modifié';
                     }
                  else
                     {
                        $msg = 'Erreur lors de la modification du projet';
                    }
           }
          $conn->close();
    }
        else
         {
            $msg = "Vous n'avez pas les droits pour cette action";
       }
}
 

// edit pub
function edit_pub(){
  if (hasPermission('modifier_publication', $_SESSION['user_role'])) {
    $publication_id = $_POST['publication_id'];
    $titre = $_POST['titre'];
    $auteurs = $_POST['auteurs'];
     $type = $_POST['type'];
     $date = $_POST['date'];
      $lien = $_POST['lien'];
       $resume = $_POST['resume'];
    $delete = isset($_POST['delete']) ? true : false;

   $conn = connectDB();
    if ($delete) {
         $sql = "DELETE FROM publications WHERE id = ?";
         $stmt = $conn->prepare($sql);
           $stmt->bind_param("i", $publication_id);
          if($stmt->execute())
             {
                   $msg = "Publication supprimée";
              }
        else
           {
               $msg =  "Problème lors de la suppression de la publication";
           }
    }
      else {
             $sql = "UPDATE publications SET titre = ?, auteurs = ?, type = ?, date = ?, lien = ?, resume = ? WHERE id = ?";
             $stmt = $conn->prepare($sql);
              $stmt->bind_param("ssssssi", $titre, $auteurs, $type, $date, $lien, $resume, $publication_id);
            if($stmt->execute())
              {
                  $msg =  "Publication modifié";
             }
           else
             {
               $msg = "Erreur lors de la modification de la publication";
            }
     }
    $conn->close();
  }
}


// Add member

function add_membre(){
  if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
   $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
     $role = $_POST['role'];
     $axe_recherche_id = $_POST['axe_recherche'];
    $conn = connectDB();
      $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
       $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, axe_recherche_id, statut) VALUES (?, ?, ?, ?, ?, ?, 'actif')";
       $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nom, $prenom, $email, $hashed_password, $role, $axe_recherche_id);

      if ($stmt->execute()) {
            $msg = 'Membre ajouté';
      }
       else
      {
             $msg =  'Erreur lors de l\'ajout du membre';
       }
      $conn->close();
  }

}

// update member

function edit_membre(){
  if (hasPermission('modifier_membre', $_SESSION['user_role'])) {
    $membre_id = $_POST['membre_id'];
   $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
   $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
   $role = isset($_POST['role']) ? $_POST['role'] : '';
   $axe_recherche_id = isset($_POST['axe_recherche']) && is_numeric($_POST['axe_recherche']) ? $_POST['axe_recherche'] : NULL;

  $delete = isset($_POST['delete']) ? true : false;

  $conn = connectDB();
  if ($delete) {
        $sql = "DELETE FROM utilisateurs WHERE id = ?";
          $stmt = $conn->prepare($sql);
         $stmt->bind_param("i", $membre_id);
           if($stmt->execute())
        {
             $msg =  'Membre supprimé';
          }
          else
            {
              $msg = "Erreur lors de la suppression du membre";
          }
  }
      else {
         $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, role = ?, axe_recherche_id = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssii", $nom, $prenom, $role, $axe_recherche_id,$membre_id);
         if($stmt->execute())
            {
                $msg =  'Membre modifié';
            }
            else
          {
              $msg = "Erreur lors de la modification du membre";
         }
  }
   $conn->close();
}
}


// approve member



// delete member kayna m3a l edit
// Delete pub kayna m3a l edit
// Delete project kayna m3a l edit


?>