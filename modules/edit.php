<?php
require_once '../database/connexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM modules WHERE id = ?");
$stmt->execute([$id]);
$module = $stmt->fetch();

if (!$module) {
    die("Module introuvable.");
}

$formations = $pdo->query("SELECT * FROM formations")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_module = trim($_POST['code_module']);
    $titre = trim($_POST['titre']);
    $code_formation = $_POST['code_formation'];

    if (!empty($code_module) && !empty($titre) && !empty($code_formation)) {
        $stmt = $pdo->prepare("UPDATE modules SET code_module = ?, titre = ?, code_formation = ? WHERE id = ?");
        $stmt->execute([$code_module, $titre, $code_formation, $id]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Modifier le module</h1>
    
    <form method="POST" class="mt-4 col-md-6">
        <div class="mb-3">
            <label class="form-label">Code Module :</label>
            <input type="text" name="code_module" class="form-control" value="<?= htmlspecialchars($module['code_module']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Titre du module :</label>
            <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($module['titre']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Formation :</label>
            <select name="code_formation" class="form-select" required>
                <?php foreach ($formations as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id'] == $module['code_formation'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($f['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</body>
</html>