# NRATrainz Website - Agent Instructions

## Project Overview
Laravel 13 + Filament 5 + Tailwind CSS 4 + Vite 8 project for a Trainz Simulator addons catalog.
- Default DB: MySQL/PostgreSQL (configurable in `.env`)
- Admin panel: `/admin` (Filament)
- Public page: `/` (landing)

## Essential Commands

| Task | Command |
|------|---------|
| Install deps | `composer install && npm install` |
| Setup env + key + DB | `cp .env.example .env && php artisan key:generate && touch database/database.sqlite && php artisan migrate` |
| Dev server (all-in-one) | `composer run dev` |
| Dev server (manual) | `php artisan serve` + `npm run dev` (separate terminals) |
| Build assets | `npm run build` |
| Run tests | `php artisan test` |
| Format code | `./vendor/bin/pint` |
| Fresh DB + seed | `php artisan migrate:fresh --seed` |
| Create Filament user | `php artisan make:filament-user` |
| Queue listener | `php artisan queue:listen` |
| View logs | `php artisan pail` |

## Project Structure

```
app/
├── Models/           # Addon, Category, AddonImage, AddonDependency, DownloadLog, BotLog, User
├── Http/Controllers/ # PageController, AddonController, CategoryController, AddonDependencyController, AddonImageController, DownloadLogController, BotLogController
├── Filament/
│   ├── Resources/    # AddonResource, CategoryResource (with forms, tables, relation managers)
│   ├── Widgets/      # DashboardStats
│   └── AdminPanelProvider.php  # Panel config at /admin
├── Providers/        # AppServiceProvider, Filament\AdminPanelProvider
routes/
├── web.php           # Single route: GET / -> PageController@landing
└── console.php
resources/
├── views/
│   ├── layouts/app.blade.php
│   ├── pages/landing.blade.php
│   └── components/   # navbar, footer, button
├── css/app.css       # Vite entry (Tailwind 4)
└── js/app.js         # Vite entry
database/
├── migrations/       # users, categories, addons, addon_images, addon_dependencies, download_logs, bot_logs, cache, jobs
└── seeders/
tests/
├── Feature/          # Feature tests
└── Unit/             # Unit tests
```

## Key Conventions

- **PHP**: 4-space indent, PSR-4 autoloading (`App\\` → `app/`)
- **Blade**: Components in `resources/views/components/`
- **Filament**: Resources auto-discovered from `app/Filament/Resources`
- **Assets**: Vite entry points at `resources/css/app.css` and `resources/js/app.js`
- **DB**: SQLite default; uses `database` driver for session, cache, queue
- **Testing**: Pest/PHPUnit; `phpunit.xml` sets `APP_ENV=testing`, in-memory cache/queue/session

## Common Gotchas

1. **No `.env`**: Run `cp .env.example .env && php artisan key:generate`
2. **Assets not loading**: Run `npm install && npm run dev` or `npm run build`
3. **Filament login fails**: Create user with `php artisan make:filament-user`
4. **Class not found**: `composer install && composer dump-autoload`
5. **Storage link for uploads**: `php artisan storage:link`

## Environment Notes

- PHP 8.3+ required
- Node.js + npm for Vite/Tailwind
- SQLite extension for PHP (or configure PostgreSQL/MySQL in `.env`)
- Tailwind 4 uses `@tailwindcss/vite` plugin (no `tailwind.config.js`)
- Vite config at `vite.config.js` (minimal, uses `laravel-vite-plugin`)

## Testing

```bash
php artisan test              # All tests
php artisan test --filter=Name # Single test
```
Tests use array cache/queue/session drivers, sync queue, and file maintenance driver.

## Deployment Checklist

- `npm run build`
- `php artisan config:cache && php artisan route:cache && php artisan view:cache`
- Set `APP_ENV=production`, `APP_DEBUG=false`
- Configure proper DB, mail, queue, cache in `.env`
- Run migrations: `php artisan migrate --force`