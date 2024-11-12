<?php

$action = filter_input(INPUT_GET, 'action');

include 'vues/vue_profile.php';
require_once 'includes/ftc.inc.php'; 

                
switch ($action) {
    case 'modifier_profil':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_client = $_SESSION['id_client'];
            $nom = htmlspecialchars(trim($_POST['nom']));
            $prenom = htmlspecialchars(trim($_POST['prenom']));
            $email = htmlspecialchars(trim($_POST['email']));
   
            $pdo->updateUserProfile($id_client, $nom, $prenom, $email);

            $_SESSION['nom_client'] = $nom;
            $_SESSION['prenom_client'] = $prenom;
            $_SESSION['mail_client'] = $email;
    
            echo 'Informations mises à jour avec succès.';
            header("Refresh: 1; URL=index.php?uc=accueil");
            exit();
        }
        break;    
}