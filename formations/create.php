<?php
require_once '../database/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = trim($_POST['code_formation']);
    $nom = trim($_POST['nom']);
    $duree = trim($_POST['duree']);

    if (!empty($code) && !empty($nom) && !empty($duree)) {
        $stmt = $pdo->prepare("INSERT INTO formations (code_formation, nom, duree) VALUES (?, ?, ?)");
        $stmt->execute([$code, $nom, $duree]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Formation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter une nouvelle formation</h1>
    
    <form method="POST" class="mt-4 col-md-6">
        <div class="mb-3">
            <label class="form-label">Code Formation :</label>
            <input type="text" name="code_formation" class="form-control" placeholder="Ex: F01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nom de la formation :</label>
            <input type="text" name="nom" class="form-control" placeholder="Ex: Développement Web" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Durée (en mois) :</label>
            <input type="number" name="duree" class="form-control" placeholder="Ex: 6" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</body>
</html>