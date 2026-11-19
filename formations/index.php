<?php
require_once '../database/connexion.php';

$stmt = $pdo->query("SELECT * FROM formations");
$formations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Formations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des Formations</h1>
        <div>
            <a href="create.php" class="btn btn-primary">+ Ajouter une formation</a>
            <a href="../index.php" class="btn btn-secondary">Accueil</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code Formation</th>
                <th>Nom de la Formation</th>
                <th>Durée (mois)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formations as $f): ?>
            <tr>
                <td><?= $f['id'] ?></td>
                <td><?= htmlspecialchars($f['code_formation']) ?></td>
                <td><?= htmlspecialchars($f['nom']) ?></td>
                <td><?= $f['duree'] ?> mois</td>
                <td>
                    <a href="edit.php?id=<?= $f['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $f['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette formation ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>