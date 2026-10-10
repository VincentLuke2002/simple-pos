# SimplePOS CodeIgniter 4

SimplePOS is a CodeIgniter 4 laboratory project. Customer and user records are stored in MySQL and managed through validated create and edit forms. User accounts also support prepared profile-picture uploads.

## Requirements

- PHP 8.2 or newer with `fileinfo`, `gd`, `intl`, `mbstring`, and `mysqli`
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
- `/customers/new` - create a customer account
- `/customers/{id}/edit` - edit a customer account
- `/users` - database-backed user accounts
- `/users/new` - create a user account
- `/users/{id}/edit` - edit a user account and upload an avatar

## Code structure

- `app/Models/CustomerModel.php` maps to the `customers` table.
- `app/Models/UserModel.php` maps to the `users` table.
- Controllers validate create and edit forms before inserting or updating records.
- Customer forms require a full name and valid email address.
- User forms require a unique username and full name.
- User edit forms accept JPG or PNG avatars up to 2 MB and prepare a 240 × 240 image.
- Only the randomized avatar filename is stored in MySQL; files are saved under `public/uploads/avatars`.
- Views display records with `foreach` loops and use a placeholder when a user has no avatar.
- `database/pos_system.sql` is the submission-ready database export.
- `app/Database/Migrations` and `app/Database/Seeds` provide a CodeIgniter-native setup alternative.
