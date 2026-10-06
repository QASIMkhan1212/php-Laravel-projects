# 5 Basic PHP + Laravel Projects

Beginner-friendly CRUD projects built with Laravel 12. Each one is a standalone Laravel app (own folder, own README, own tests).

| # | Project | What it shows |
|---|---------|---------------|
| 1 | Todo List App | CRUD, status toggle, filtering |
| 2 | Blog App | CRUD, show page, search |
| 3 | Contact Book | CRUD, multi-column search, unique validation |
| 4 | Expense Tracker | Decimals, category filter, aggregate totals |
| 5 | Job Application Tracker | Status pipeline, grouped counts |

## Requirements
PHP 8.2+, Composer, SQLite extension (enabled by default in most PHP installs)

## Run any project
```bash
cd 01-todo-list-app
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

## Push to GitHub (one repo per project, or one repo with all five)
```bash
git init
git add .
git commit -m "Add Laravel CRUD projects"
git branch -M main
git remote add origin https://github.com/<your-username>/<repo-name>.git
git push -u origin main
```

## Resume "Projects" format
**Laravel CRUD Projects** | PHP, Laravel, SQLite, Blade, Bootstrap | GitHub: <link>
