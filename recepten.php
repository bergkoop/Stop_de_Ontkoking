<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Recepten';
include __DIR__ . '/templates/header.php';
?>

<!-- Overview: search (?q=), filters, recipe cards -->
<h1>Recepten</h1>

<?php include __DIR__ . '/templates/footer.php'; ?>
