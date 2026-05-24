# NRATrainz Website

NRATrainz adalah website katalog addons Trainz Simulator berbasis Laravel, Filament, Tailwind CSS, dan Vite.

## Tech Stack

- PHP `^8.2`
- Laravel `^12.0`
- Filament `5.0`
- Tailwind CSS `^4.0`
- Vite `^6.0`
- Database default development: SQLite

## Requirement Development

Pastikan sudah ter-install:

- PHP 8.2 atau lebih baru
- Composer
- Node.js dan npm
- SQLite extension untuk PHP, atau database lain seperti PostgreSQL/MySQL jika ingin memakai DB eksternal

Untuk mengecek versi:

```bash
php -v
composer -V
node -v
npm -v
```

## Instalasi dari Awal

Clone repository, lalu masuk ke folder project:

```bash
git clone <repository-url>
cd nrat-website
```

Install dependency PHP dan JavaScript:

```bash
composer install
npm install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

## Setup Database

Project ini secara default menggunakan SQLite melalui `.env.example`:

```env
DB_CONNECTION=sqlite
```

Buat file database SQLite:

```bash
touch database/database.sqlite
```

Jalankan migration:

```bash
php artisan migrate
```

Jika ingin sekaligus membuat user contoh dari seeder:

```bash
php artisan migrate --seed
```

Seeder default membuat user:

```text
Email: test@example.com
Password: password
```

## Setup Storage

Jika fitur upload gambar/file digunakan, buat symbolic link storage:

```bash
php artisan storage:link
```

## Menjalankan Development Server

Cara paling praktis:

```bash
composer run dev
```

Command ini akan menjalankan beberapa proses sekaligus:

- Laravel development server
- Vite development server
- Queue listener
- Laravel Pail untuk melihat log

Setelah berjalan, buka:

```text
http://127.0.0.1:8000
```

Panel admin Filament tersedia di:

```text
http://127.0.0.1:8000/admin
```

Jika hanya ingin menjalankan server secara manual:

```bash
php artisan serve
npm run dev
```

Jalankan kedua command tersebut di terminal yang berbeda.

## Membuat User Admin Filament

Untuk membuat user yang bisa login ke Filament:

```bash
php artisan make:filament-user
```

Ikuti prompt yang muncul untuk mengisi nama, email, dan password.

## Command yang Sering Dipakai

```bash
# Menjalankan migration
php artisan migrate

# Reset database dan jalankan semua migration dari awal
php artisan migrate:fresh

# Reset database sekaligus jalankan seeder
php artisan migrate:fresh --seed

# Menjalankan queue listener
php artisan queue:listen

# Melihat log Laravel secara realtime
php artisan pail

# Build asset production
npm run build

# Menjalankan test
php artisan test

# Format code Laravel
./vendor/bin/pint
```

## Struktur Penting

- `app/Models` berisi model utama seperti `Addon`, `Category`, `AddonImage`, `AddonDependency`, `DownloadLog`, dan `BotLog`.
- `app/Http/Controllers` berisi controller untuk fitur katalog dan logging.
- `app/Providers/Filament/AdminPanelProvider.php` berisi konfigurasi panel admin Filament.
- `database/migrations` berisi struktur tabel aplikasi.
- `resources/views/welcome.blade.php` adalah view halaman utama.
- `resources/css/app.css` dan `resources/js/app.js` adalah entry asset Vite.

## Catatan Database Lain

Jika ingin memakai PostgreSQL atau MySQL, ubah konfigurasi `.env`, misalnya:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nrat_website
DB_USERNAME=postgres
DB_PASSWORD=secret
```

Setelah itu jalankan ulang migration:

```bash
php artisan migrate
```

## Troubleshooting

Jika muncul error `APP_KEY` kosong:

```bash
php artisan key:generate
```

Jika SQLite error karena file database belum ada:

```bash
touch database/database.sqlite
php artisan migrate
```

Jika asset tidak muncul atau halaman terlihat polos:

```bash
npm install
npm run dev
```

Jika class/package tidak ditemukan:

```bash
composer install
composer dump-autoload
```

Jika admin Filament tidak bisa login, buat user baru:

```bash
php artisan make:filament-user
```

## Lisensi

NRATrainz dilisensikan di bawah MIT License. Lihat [LICENSE](LICENSE) untuk informasi lebih lanjut.
