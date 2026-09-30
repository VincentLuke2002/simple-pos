# SimplePOS CodeIgniter 4

SimplePOS is a four-page CodeIgniter 4 laboratory project. Customer and user records are stored in MySQL and retrieved through CodeIgniter Models with Query Builder.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli`
- Composer
- MySQL or MariaDB

## Database setup

The included export creates the `pos_system` database, both required tables, and five sample records per table.

From PowerShell, run:

```powershell
C:\xampp\mysql\bin\mysql.exe -u root -e "SOURCE C:/Users/barc-admin/Desktop/pos-system/database/pos_system.sql"
```

The default `.env` settings use MySQL at `127.0.0.1:3306`, database `pos_system`, username `root`, and an empty password. Update `.env` if your local MySQL credentials differ.

## Run the application

Open this folder in VS Code, create a new terminal, and run:

```powershell
composer install
php spark serve
```

Open `http://localhost:8080` in a browser.

## Routes

- `/` - landing page
- `/about` - project information
- `/customers` - database-backed customer accounts
- `/users` - database-backed user accounts

## Code structure

- `app/Models/CustomerModel.php` maps to the `customers` table.
- `app/Models/UserModel.php` maps to the `users` table.
- Controllers retrieve records with each Model's `findAll()` method.
- Views display the records with `foreach` loops.
- `database/pos_system.sql` is the submission-ready database export.
- `app/Database/Migrations` and `app/Database/Seeds` provide a CodeIgniter-native setup alternative.
