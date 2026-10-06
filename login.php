<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Inloggen';
include __DIR__ . '/templates/header.php';
?>

<!-- Login form: email, password. Check with password_verify(), block users with status = blocked -->
<h1>Inloggen</h1>

<?php include __DIR__ . '/templates/footer.php'; ?>
