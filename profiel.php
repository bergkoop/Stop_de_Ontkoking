<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

requireLogin();
$pageTitle = 'Mijn recepten';
include __DIR__ . '/templates/header.php';
?>

<!-- Logged-in user's recipes + nieuw recept button -->
<h1>Mijn recepten</h1>

<?php include __DIR__ . '/templates/footer.php'; ?>
