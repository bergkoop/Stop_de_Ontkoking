<?php
// One recipe card. Expects a $recipe array with:
// id, title, prep_time, meal_type, cover_photo, description (optional)
?>
<a class="card" href="/recept.php?id=<?= (int) $recipe['id'] ?>">
    <div class="img">
        <?php if (!empty($recipe['cover_photo'])): ?>
            <img src="<?= e($recipe['cover_photo']) ?>" alt="">
        <?php endif; ?>
        <span class="badge"><?= (int) $recipe['prep_time'] ?> min</span>
    </div>
    <div class="type"><?= e($recipe['meal_type'] ?? '') ?></div>
    <div class="title"><?= e($recipe['title']) ?></div>
    <?php if (!empty($recipe['description'])): ?>
        <div class="desc"><?= e($recipe['description']) ?></div>
    <?php endif; ?>
</a>
