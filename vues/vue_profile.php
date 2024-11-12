<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="profil-container">
        <h1>Mon Profil</h1>
        <form action="index.php?uc=profile&action=modifier_profil" method="POST">
            <div class="profil-card">
                <h2>Modifier mes informations</h2>
                <div>
                    <label for="nom"><strong>Nom :</strong></label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_SESSION['nom_client']); ?>" required>
                </div>
                <div>
                    <label for="prenom"><strong>Prénom :</strong></label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_SESSION['prenom_client']); ?>" required>
                </div>
                <div>
                    <label for="email"><strong>Email :</strong></label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['mail_client']); ?>" required>
                </div>
                <div>
                    <label for="role"><strong>Role :</strong></label>
                    <?php echo htmlspecialchars($_SESSION['role_client']); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Sauvegarder les modifications</button>
                </div>
            </div>
        </form>
        <div class="profil-actions">
            <a href="index.php?uc=deconnexion" class="btn btn-danger">Se déconnecter</a>
        </div>
    </div>
</body>
</html>