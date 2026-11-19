<?php
require_once '../database/connexion.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM formations WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
?>