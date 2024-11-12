<?php
require_once './includes/ftc.inc.php';

function testVerifMdp(){
    $valeur_mdp = [
        "short" => "le mot de passe doit contenir au moins 12 caracteres",
        "alllowercase123!" => "le mot de passe doit contenur un caracteres majuscule",
        "ALLUPPERCASE123!" => "le mot de passe doit contenur un caracteres minuscule",
        "MixedCaseNoDigits!" => "le mot de passe doit contenur un chiffre",
        "MixedCase123" => "le mot de passe doit contenir un caracteres speciale",
        "ValidPass123!" => "true"
    ];

    foreach ($valeur_mdp as $mdp => $message){
        $result = verifMdp($mdp) ;
        if ($result == $message){
            echo "<br>test successful ! $mdp";
        }else{
            echo "test failed ! $mdp";
        }
    }
}



?>