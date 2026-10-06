# Contact Book

A contact manager to store names, phone numbers, emails and addresses with instant search.

## Features
- Add, edit, delete contacts
- Search by name, phone or email
- Unique email validation
- Pagination, sorted A-Z

## Tech Stack
PHP 8.2+, Laravel 12, Eloquent ORM, Blade templates, Bootstrap 5 (CDN), SQLite, PHPUnit

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite      # Windows: type nul > database\database.sqlite
php artisan migrate --seed
php artisan serve
```
Open http://127.0.0.1:8000

## Run tests
```bash
php artisan test
```

## Concepts demonstrated
MVC, migrations, Eloquent models, resource controllers, route model binding, form validation, Blade layouts & partials, flash messages, pagination, database seeding, feature testing.

## Key files
- `app/Models/Contact.php`
- `app/Http/Controllers/ContactController.php`
- `database/migrations/*_create_contacts_table.php`
- `routes/web.php`
- `resources/views/contacts/`
