<?php
// Database functions. Pages call these instead of writing SQL themselves.
// Every function gets $pdo from includes/db.php.

// Escape text before printing it in HTML (protects against XSS).
function e(?string $text): string
{
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8');
}

// TODO: getRecipes(PDO $pdo, array $filters): array
//   - search on title (?q=)
//   - filter on category (Ontbijt, Lunch, Diner, Vegetarisch, Budget, Eiwitrijk)
//   - "Onder 20 min" = prep_time <= 20
//   - only status = 'online'

// TODO: getRecipe(PDO $pdo, int $id): ?array
//   - recipe + cover photo + ingredients + steps + categories

// TODO: getRecipesByUser(PDO $pdo, int $userId): array

// TODO: saveRecipe(PDO $pdo, array $data, int $userId, ?int $id = null): int
//   - INSERT without $id, UPDATE with $id
//   - split the steps textarea on new lines

// TODO: deleteRecipe(PDO $pdo, int $id): void

// TODO: toggleFavorite(PDO $pdo, int $userId, int $recipeId): void

// TODO: getAdminStats(PDO $pdo): array
//   - COUNT(*) of recipes, users, favorites
