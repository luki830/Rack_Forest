# Rack Forest Blog

Egyszerű blogrendszer PHP és MySQL alapokon.

## Technológiák

- PHP (OOP)
- Composer + PSR-4 autoloading
- Smarty template engine
- MySQL + PDO
- Bootstrap (alap dizájn)

## Telepítés

1. `composer install`
2. Adatbázis létrehozása: `rackforest`
3. SQL fájl importálása a projektből
4. A `public` mappát állítsd be webrootnak (pl. XAMPP-ban)
5. `templates_c` mappa legyen írható

## Használat

- Guest oldal: posztok listázása, részletek
- Admin oldal:
  - Bejelentkezés / kijelentkezés
  - Felhasználók kezelése (CRUD)
  - Blogposztok kezelése (CRUD)

## Belépés

Tesztfelhasználó (ha van):

Email: admin@example.com
Jelszó: 123


## TODO

- http://localhost/admin/register.php oldal könnyed elérése. (Regisztráció)
- Felhasználók bővítése névvel. (Regisztráció + User módosítás)
- Felhasználók email címe megváltoztatása a felhasználók neveire. (Blog felületen)
- Blogok első bekezdésének megjelenítése (DEBUG) 
