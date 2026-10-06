<?php
// Login helpers. Include this on every page (header.php already does).

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Is someone logged in?
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

// Is the logged-in user an admin?
function isAdmin(): bool
{
    return ($_SESSION['role'] ?? '') === 'admin';
}

// Send visitors who are not logged in to the login page.
function requireLogin(): void
{
    if (!isLoggedIn()) {
        header('Location: /login.php');
        exit;
    }
}

// Only admins may continue.
function requireAdmin(): void
{
    if (!isAdmin()) {
        header('Location: /index.php');
        exit;
    }
}
