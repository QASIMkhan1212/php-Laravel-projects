# Expense Tracker

A personal expense tracker with categories, date filtering by category and a running total.

## Features
- Add, edit, delete expenses
- Category filter
- Live total of the filtered list
- Decimal amount handling
- Pagination

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
- `app/Models/Expense.php`
- `app/Http/Controllers/ExpenseController.php`
- `database/migrations/*_create_expenses_table.php`
- `routes/web.php`
- `resources/views/expenses/`
