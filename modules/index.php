<?php
require_once '../database/connexion.php';

$sql = "SELECT modules.*, formations.nom AS formation_nom 
        FROM modules 
        JOIN formations ON modules.code_formation = formations.id";
$stmt = $pdo->query($sql);
$modules = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Modules</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des Modules</h1>
        <div>
            <a href="create.php" class="btn btn-primary">+ Ajouter un module</a>
            <a href="../index.php" class="btn btn-secondary">Accueil</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code Module</th>
                <th>Titre</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modules as $m): ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= htmlspecialchars($m['code_module']) ?></td>
                <td><?= htmlspecialchars($m['titre']) ?></td>
                <td><?= htmlspecialchars($m['formation_nom']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce module ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>