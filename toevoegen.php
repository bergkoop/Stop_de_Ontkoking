<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

requireLogin();
// With ?id= this page edits an existing recipe, without it adds a new one.
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$pageTitle = 'Recept toevoegen';
include __DIR__ . '/templates/header.php';
?>

<!-- Form: title, category_id, prep_time, image_url, description, ingredients, steps -->
<h1>Recept toevoegen</h1>

<?php include __DIR__ . '/templates/footer.php'; ?>
