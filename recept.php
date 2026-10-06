<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

$id = (int) ($_GET['id'] ?? 0);
$pageTitle = 'Recept';
include __DIR__ . '/templates/header.php';
?>

<!-- Detail: photo, meta, Bewaren/Bewerken, ingredients, steps -->
<h1>Recept</h1>

<?php include __DIR__ . '/templates/footer.php'; ?>
