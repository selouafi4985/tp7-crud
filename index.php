<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Centre de Formation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Gestion du Centre de Formation</h1>
        <p class="lead text-muted">Application de gestion des formations, étudiants et modules</p>
        
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h3>Formations</h3>
                    <p class="text-muted">Gérer les formations du centre</p>
                    <a href="formations/index.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h3>Étudiants</h3>
                    <p class="text-muted">Gérer les étudiants inscrits</p>
                    <a href="etudiants/index.php" class="btn btn-success">Accéder</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h3>Modules</h3>
                    <p class="text-muted">Gérer les modules par formation</p>
                    <a href="modules/index.php" class="btn btn-warning text-white">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>