<?php
require_once 'includes/class.pdo.inc.php';
require_once 'tests/functions_tests.php';
$pdo = PdoGsb::getPDOGsb();


//include 'vues/v_entete.php';
session_start(); //permet de lancer la session

//une variable est toujours precede du $
$uc = filter_input(INPUT_GET, 'uc'); // filtre le lien
//uc = inscription 

if (empty($uc)) {
    $uc = 'connexion'; // si uc est vide (le cas qd je lance le projet) empty= vide
}

switch ($uc) { // les differetes valeurs que peu avoir $uc
    case 'inscription': 
        include 'controleurs/c_inscription.php'; //redirige l'utilisateur vers le controleur inscription.
        break;

    case 'connexion': 
        include 'controleurs/c_connexion.php';
        break;

    case 'accueil': 
        include 'controleurs/c_accueil.php';
        break;

    case 'profile': 
        include 'controleurs/c_profile.php';
        break;

    case 'messagerie': 
        include 'controleurs/c_messagerie.php';
        break;
    
    case 'recherche': 
        include 'controleurs/c_recherche.php';
        break;
    
    case 'espace_admin': 
        include 'controleurs/c_espace_admin.php';
        break;
}

?>