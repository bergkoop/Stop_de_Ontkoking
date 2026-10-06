# Stop de ontkoking

Receptenwebsite, schoolproject Grafisch Lyceum Rotterdam.

## Installeren

1. Maak een database aan in Plesk.
2. Importeer `docs/ontkoking.sql` via phpMyAdmin (tab Import).
3. Importeer daarna `docs/update-status.sql`.
4. Kopieer `includes/config.example.php` naar `includes/config.php` en vul je eigen databasegegevens in.

`config.php` staat in `.gitignore` en komt dus nooit op GitHub.

## Wie doet wat

- Backend: `includes/`, de PHP bovenaan elke pagina
- Frontend: `templates/`, `assets/`, de HTML in elke pagina
