<?php
require_once '../database/connexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM etudiants WHERE id = ?");
$stmt->execute([$id]);
$etudiant = $stmt->fetch();

if (!$etudiant) {
    die("Étudiant introuvable.");
}

$formations = $pdo->query("SELECT * FROM formations")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_complet = trim($_POST['nom_complet']);
    $code_formation = $_POST['code_formation'];

    if (!empty($nom_complet) && !empty($code_formation)) {
        $stmt = $pdo->prepare("UPDATE etudiants SET nom_complet = ?, code_formation = ? WHERE id = ?");
        $stmt->execute([$nom_complet, $code_formation, $id]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Étudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Modifier l'étudiant</h1>
    
    <form method="POST" class="mt-4 col-md-6">
        <div class="mb-3">
            <label class="form-label">Nom Complet :</label>
            <input type="text" name="nom_complet" class="form-control" value="<?= htmlspecialchars($etudiant['nom_complet']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Formation :</label>
            <select name="code_formation" class="form-select" required>
                <?php foreach ($formations as $f): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id'] == $etudiant['code_formation'] ? 'selected' : '' ?>>
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