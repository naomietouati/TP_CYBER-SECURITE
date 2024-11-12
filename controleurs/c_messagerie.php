<?php

$action = filter_input(INPUT_GET, 'action');

include 'vues/vue_messagerie.php';
require_once 'includes/ftc.inc.php'; 

                
switch ($action) {
    case 'envoyer_message':
        $destinataire_email = htmlspecialchars(trim($_POST['destinataire']));
        $message_content = htmlspecialchars(trim($_POST['message']));
        $expediteur_id = $_SESSION['id_client'];

        $requeteDestinataire = $pdo->prepare('SELECT id FROM clients WHERE mail = :email');
        $requeteDestinataire->bindParam(':email', $destinataire_email, PDO::PARAM_STR);
        $requeteDestinataire->execute();
        $destinataire = $requeteDestinataire->fetch();

        if ($destinataire) {
            $requeteMessage = $pdo->prepare(
                'INSERT INTO messages (expediteur_id, destinataire_id, message) 
                VALUES (:expediteur_id, :destinataire_id, :message)'
            );
            $requeteMessage->bindParam(':expediteur_id', $expediteur_id, PDO::PARAM_INT);
            $requeteMessage->bindParam(':destinataire_id', $destinataire['id'], PDO::PARAM_INT);
            $requeteMessage->bindParam(':message', $message_content, PDO::PARAM_STR);
            $requeteMessage->execute();
            
            echo "Message envoyé avec succès.";
        } else {
            echo "Le destinataire n'existe pas.";
        }

    }