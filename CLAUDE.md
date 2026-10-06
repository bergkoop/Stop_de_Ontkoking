# Stop de ontkoking

School project (MBO Software Development, Grafisch Lyceum Rotterdam). A Dutch recipe-sharing website. I (Tristan) do the backend. Teammates build the frontend (HTML/CSS) from a finished UI mockup.

I am a beginner. Keep code simple and readable, explain what you write, and don't use frameworks unless I ask.

## Stack

- Plain PHP (no framework), PDO with prepared statements
- MariaDB/MySQL, managed via Plesk + phpMyAdmin
- Database script: `docs/ontkoking.sql` (drops and recreates all tables, includes test data)
- Credentials go in `config.php`, which is in `.gitignore`
- Passwords: `password_hash()` / `password_verify()`
- UI text is Dutch, code (variables, functions, comments) is English

## Folder layout

```
docs/          mockup.html, ontkoking.sql, update-status.sql
includes/      config.php (gitignored), db.php, auth.php, functions.php
templates/     header.php, footer.php, recipe-card.php
assets/        css/, js/, img/
admin/         index.php (admin panel)
*.php          one file per page in the root: index, recepten, recept, toevoegen, profiel, login, logout
```

- Database queries live in `includes/functions.php`, not in the pages.
- Pages: require includes at the top, set `$pageTitle`, include header, HTML, include footer.
- Always escape output with `e()` from `functions.php`.
- `toevoegen.php` handles both add (no `?id=`) and edit (with `?id=`).

## Database (9 tables)

- `users`: id, username, email, password_hash, profile_picture, bio, role (user/admin), status (active/blocked), timestamps
- `recipes`: id, user_id, title, description, prep_time (minutes), servings, timestamps
- `recipe_photos`: id, recipe_id, file_path, sort_order (0 = cover photo)
- `steps`: id, recipe_id, step_number, instruction
- `ingredients`: id, name (unique, reusable)
- `recipe_ingredients`: recipe_id, ingredient_id, amount, unit
- `categories`: id, name (21 Dutch categories: meal types like Ontbijt/Lunch/Diner plus diet tags like Vegetarisch, Vegan, Eiwitrijk, Budget)
- `recipe_categories`: recipe_id, category_id
- `favorites`: user_id, recipe_id

All foreign keys to users and recipes cascade on delete. Test users: an admin and two regular users (see comments at the top of `ontkoking.sql`).

### Pending change

The admin panel shows a recipe status. `docs/update-status.sql` adds it:

```sql
ALTER TABLE recipes
ADD status ENUM('online','offline') NOT NULL DEFAULT 'online' AFTER servings;
```

## Pages from the mockup (desktop + mobile)

Visual reference: `docs/mockup.html` (static HTML of every page, resize the browser below 760px for mobile). Its form `name` attributes are the proposed field names for the PHP handlers. It is a reference, not the real frontend.


- **Home**: hero, search bar, quick filter chips (Ontbijt, Lunch, Diner, Snel), buttons "Recept delen" and "Inloggen", "Populaire recepten" (3 cards)
- **Recepten (overzicht)**: search, type chips (Alles, Ontbijt, Lunch, Diner, Vega, Budget), filter sidebar (Onder 20 min, High protein, Budget, Vega, Lunch, Diner), result count, recipe cards
- **Recipe card**: cover photo, prep time badge, meal type, title, optional short description
- **Recept detail**: photo, title, "type | prep_time min | servings personen", buttons Bewaren (favorite) and Bewerken (only for owner/admin), ingredient list, numbered steps
- **Toevoegen**: form with Titel, Maaltijdtype, Bereidingstijd, Afbeelding URL, Omschrijving, Ingrediënten (textarea), Stappen (textarea), buttons Leegmaken and Publiceren/Opslaan
- **Inloggen**: email + password
- **Profiel / Mijn recepten**: the logged-in user's recipes + "nieuw recept" button
- **Adminpaneel**: totals (recepten, gebruikers, favorieten), table "Recepten beheren" with recipe, type, status and actions Bewerk / Wis

## Decisions

- "Onder 20 min" filter = `prep_time <= 20`
- Vega, Budget, High protein filters = categories via `recipe_categories`
- Maaltijdtype dropdown links one meal-type category (Ontbijt/Lunch/Diner); the card shows that category
- Afbeelding URL is stored in `recipe_photos.file_path` with `sort_order = 0`
- Steps textarea is split on new lines into `steps`

## Open questions (waiting on the design team)

- Ingredients: the form has one textarea, but the database stores amount, unit and name separately. Either parse lines like `150 g rijst` in PHP, or the frontend makes one row of fields per ingredient.
- The form has no fields yet for servings (personen) or tags (vega, budget, etc.).
- No register page in the design, but the admin panel counts users.
- Agree with the frontend team on form `name` attributes and which variables each page receives.

## Workflow

The frontend HTML may not exist yet. Build backend logic first (connection, login/sessions, query functions, form handlers, admin actions) and test with bare HTML or `var_dump()`. Wire it into the teammates' HTML later.
