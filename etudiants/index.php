<?php
require_once '../database/connexion.php';

$sql = "SELECT etudiants.*, formations.nom AS formation_nom 
        FROM etudiants 
        JOIN formations ON etudiants.code_formation = formations.id";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des Étudiants</h1>
        <div>
            <a href="create.php" class="btn btn-primary">+ Ajouter un étudiant</a>
            <a href="../index.php" class="btn btn-secondary">Accueil</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $e): ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= htmlspecialchars($e['nom_complet']) ?></td>
                <td><?= htmlspecialchars($e['formation_nom']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $e['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $e['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>