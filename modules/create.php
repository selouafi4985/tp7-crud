<?php
require_once '../database/connexion.php';

$formations = $pdo->query("SELECT * FROM formations")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_module = trim($_POST['code_module']);
    $titre = trim($_POST['titre']);
    $code_formation = $_POST['code_formation'];

    if (!empty($code_module) && !empty($titre) && !empty($code_formation)) {
        $stmt = $pdo->prepare("INSERT INTO modules (code_module, titre, code_formation) VALUES (?, ?, ?)");
        $stmt->execute([$code_module, $titre, $code_formation]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter un nouveau module</h1>
    
    <form method="POST" class="mt-4 col-md-6">
        <div class="mb-3">
            <label class="form-label">Code Module :</label>
            <input type="text" name="code_module" class="form-control" placeholder="Ex: M01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titre du module :</label>
            <input type="text" name="titre" class="form-control" placeholder="Ex: Bases de données SQL" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Formation :</label>
            <select name="code_formation" class="form-select" required>
                <option value="">-- Choisir une formation --</option>
                <?php foreach ($formations as $f): ?>
                    <option value="<?= $f['id'] ?>"><?= htmlspecialchars($f['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</body>
</html>