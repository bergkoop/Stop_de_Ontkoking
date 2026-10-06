<?php
// Top of every page. Set $pageTitle before including this file.
require_once __DIR__ . '/../includes/auth.php';
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle ?? 'Stop de ontkoking') ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <nav>
        <a href="/index.php">Home</a>
        <a href="/recepten.php">Recepten</a>
        <a href="/toevoegen.php">Toevoegen</a>
        <a href="/profiel.php">Profiel</a>
        <?php if (isAdmin()): ?>
            <a href="/admin/index.php">Admin</a>
        <?php endif; ?>
    </nav>
    <button class="hamburger" aria-label="Menu">&#9776;</button>
</header>
<main>
