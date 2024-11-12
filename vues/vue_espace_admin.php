<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Liste des Clients</h1>

<?php if (!empty($client)) : ?>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client as $cli) : ?>
                <tr>
                    <td><?= htmlspecialchars($cli['nom']); ?></td>
                    <td><?= htmlspecialchars($cli['prenom']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Aucun client trouvé.</p>
<?php endif; ?>

</body>
</html>
