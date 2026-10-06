# Job Application Tracker

Track every job you apply for: company, role, date, status and notes, with per-status counts.

## Features
- Add, edit, delete applications
- Status pipeline: Applied / Interview / Offer / Rejected
- Per-status counters
- Filter by status
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
- `app/Models/JobApplication.php`
- `app/Http/Controllers/JobApplicationController.php`
- `database/migrations/*_create_job_applications_table.php`
- `routes/web.php`
- `resources/views/applications/`
