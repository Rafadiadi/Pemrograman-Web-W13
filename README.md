# E-Commerce Laravel Application
## Tugas Praktikum W12

Aplikasi web e-commerce sederhana dengan fitur:
- Login & Session Management
- Middleware Authentication
- CRUD untuk Products, Stock (Stok), dan Stores (Toko)

## Struktur Database
- Users (untuk autentikasi)
- Products (produk)
- Stores (Toko) 
- Stock (Stok produk per toko)

## Instalasi

1. Copy `.env.example` ke `.env`
```bash
cp .env.example .env
```

2. Install dependencies
```bash
composer install
```

3. Generate application key
```bash
php artisan key:generate
```

4. Buat database `ecommerce_db` di MySQL

5. Jalankan migrasi
```bash
php artisan migrate
```

6. Jalankan seeder (opsional)
```bash
php artisan db:seed
```

7. Jalankan aplikasi
```bash
php artisan serve
```

8. Akses aplikasi di `http://localhost:8000`

## Default Login
- Email: admin@example.com
- Password: password
