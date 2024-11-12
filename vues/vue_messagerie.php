<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="messagerie-container">
        <h1>Messagerie</h1>
        <div class="message-section">
            <div class="message-list">
                <h2>Messages</h2>
                <ul>
                    <li><strong>De :</strong> Alice <br> Message de test...</li>
                    <li><strong>De :</strong> Bob <br> Bonjour, comment ça va ?</li>
                    <li><strong>De :</strong> Charlie <br> À demain pour la réunion.</li>
                </ul>
            </div>
            <div class="message-box">
                <h2>Envoyer un message</h2>
                <form action="index.php?uc=messagerie&action=envoyer_message" method="POST">
                    <div class="form-group">
                        <label for="destinataire"><strong>À :</strong></label>
                        <input type="text" id="destinataire" name="destinataire" placeholder="Nom ou Email du destinataire" required>
                    </div>
                    <div class="form-group">
                        <label for="message"><strong>Message :</strong></label>
                        <textarea id="message" name="message" rows="5" placeholder="Écrivez votre message ici..." required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
