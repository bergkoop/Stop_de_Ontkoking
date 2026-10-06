<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/functions.php';

requireAdmin();

$pageTitle = 'Adminpaneel';
include __DIR__ . '/../templates/header.php';
?>

<!-- Admin: totals (recepten, gebruikers, favorieten), table Recepten beheren with Bewerk / Wis -->
<h1>Adminpaneel</h1>

<?php include __DIR__ . '/../templates/footer.php'; ?>
