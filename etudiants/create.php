<?php
require_once '../database/connexion.php';

$formations = $pdo->query("SELECT * FROM formations")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_complet = trim($_POST['nom_complet']);
    $code_formation = $_POST['code_formation'];

    if (!empty($nom_complet) && !empty($code_formation)) {
        $stmt = $pdo->prepare("INSERT INTO etudiants (nom_complet, code_formation) VALUES (?, ?)");
        $stmt->execute([$nom_complet, $code_formation]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Étudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Ajouter un nouvel étudiant</h1>
    
    <form method="POST" class="mt-4 col-md-6">
        <div class="mb-3">
            <label class="form-label">Nom Complet :</label>
            <input type="text" name="nom_complet" class="form-control" placeholder="Ex: Ahmed Bennani" required>
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