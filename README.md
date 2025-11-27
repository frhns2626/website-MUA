# Firliamakeup - Website Jasa Makeup Artist

Website profesional untuk jasa Makeup Artist (MUA) di Demak. Sistem ini menyediakan platform untuk menampilkan portfolio, paket layanan, dan sewa kebaya dengan admin panel yang mudah digunakan.

## 🎨 Fitur Utama

### Public Features
- **Homepage** - Landing page dengan informasi lengkap tentang jasa MUA
- **Portfolio Gallery** - Galeri karya makeup dengan kategori
- **Services/Packages** - Daftar paket layanan makeup dengan harga
- **Kebaya Rental** - Katalog kebaya untuk disewakan
- **Contact Section** - Informasi kontak dan lokasi

### Admin Panel
- **Dashboard** - Statistik dan ringkasan aktivitas
- **Portfolio Management** - Kelola portfolio dengan upload gambar, kategori, dan urutan tampil
- **Package Management** - Kelola paket layanan dengan fitur, harga, dan gradient warna
- **Kebaya Management** - Kelola koleksi kebaya untuk disewakan
- **Responsive Design** - Admin panel yang fully responsive untuk mobile dan desktop

## 🛠️ Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade Templates, Tailwind CSS 4.0
- **Build Tool**: Vite
- **Database**: SQLite (default) / MySQL / PostgreSQL
- **PHP**: 8.2+

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18.x dan npm
- SQLite (default) atau database server (MySQL/PostgreSQL)

## 🚀 Installation

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/firliamakeup.git
cd firliamakeup
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Database

Edit `.env` file dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=sqlite
# atau untuk MySQL/PostgreSQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=firliamakeup
# DB_USERNAME=root
# DB_PASSWORD=
```

Jika menggunakan SQLite, pastikan file `database/database.sqlite` sudah ada:

```bash
touch database/database.sqlite
```

### 5. Run Migrations & Seeders

```bash
# Run migrations
php artisan migrate

# Seed admin user dan sample data
php artisan db:seed
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## 🔐 Admin Login

Setelah menjalankan seeder, Anda dapat login ke admin panel dengan:

- **URL**: `http://localhost:8000/admin/login`
- **Email**: `admin@firliamakeup.com`
- **Password**: `admin123`

**⚠️ PENTING**: Segera ubah password setelah login pertama kali!

### Quick Access Login
- Klik logo "Firliamakeup" di header **5 kali** untuk membuka modal login
- Atau gunakan shortcut keyboard: `Ctrl + Shift + L`

## 📁 Project Structure

```
firliamakeup/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Admin/          # Admin controllers
│   │       └── HomeController.php
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/                # Database seeders
├── resources/
│   ├── views/
│   │   ├── admin/              # Admin panel views
│   │   ├── components/        # Reusable components
│   │   ├── layouts/            # Layout templates
│   │   └── pages/              # Public pages
│   ├── css/
│   └── js/
├── routes/
│   └── web.php                 # Application routes
└── storage/
    └── app/
        └── public/             # Public storage (images)
```

## 🎯 Usage

### Menjalankan Development Server

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server (untuk hot reload)
npm run dev
```

### Menjalankan dengan Composer Script

```bash
# Setup awal (install dependencies, migrate, build)
composer run setup

# Development mode (server + queue + logs + vite)
composer run dev
```

### Menjalankan Tests

```bash
php artisan test
# atau
composer run test
```

## 📝 Admin Panel Features

### Portfolio Management
- Upload gambar portfolio
- Set kategori (Wedding, Pre-Wedding, Wisuda, dll)
- Atur urutan tampil
- Aktifkan/nonaktifkan portfolio

### Package Management
- Buat paket layanan dengan harga
- Tambahkan fitur-fitur yang termasuk
- Custom gradient warna untuk setiap paket
- Atur urutan tampil

### Kebaya Management
- Upload gambar kebaya
- Set harga sewa
- Deskripsi kebaya
- Status aktif/tidak aktif

## 🎨 Customization

### Mengubah Warna Theme

Edit file Tailwind CSS di `resources/css/app.css` atau gunakan Tailwind config.

### Menambah Menu Sidebar

Edit file `resources/views/admin/components/sidebar.blade.php`

### Mengubah Logo/Branding

Edit file `resources/views/components/header.blade.php` dan `resources/views/components/sidebar.blade.php`

## 📦 Database Seeders

```bash
# Seed admin user saja
php artisan db:seed --class=AdminUserSeeder

# Seed semua data (admin + sample data)
php artisan db:seed
```

Available seeders:
- `AdminUserSeeder` - Create admin user
- `PortfolioSeeder` - Sample portfolio data
- `ServiceSeeder` - Sample services
- `PackageSeeder` - Sample packages
- `KebayaSeeder` - Sample kebaya data

## 🔒 Security

- Password hashing dengan bcrypt
- CSRF protection
- SQL injection protection (Eloquent ORM)
- XSS protection (Blade escaping)
- Authentication middleware untuk admin routes

## 📱 Responsive Design

Website dan admin panel fully responsive untuk:
- Mobile devices (320px+)
- Tablets (768px+)
- Desktop (1024px+)
- Large screens (1280px+)

## 🐛 Troubleshooting

### Storage link tidak bekerja
```bash
php artisan storage:link
```

### Permission denied pada storage
```bash
chmod -R 775 storage bootstrap/cache
```

### Assets tidak ter-load
```bash
npm run build
php artisan cache:clear
php artisan config:clear
```

### Database error
Pastikan file `.env` sudah dikonfigurasi dengan benar dan database sudah dibuat.

## 📄 License

MIT License

## 👤 Author

**Firliamakeup**
- Website: [Your Website]
- Email: admin@firliamakeup.com

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Vite
- All contributors

## 📞 Support

Untuk pertanyaan atau dukungan, silakan buat issue di repository ini.

---

**Note**: Pastikan untuk mengubah kredensial admin default setelah deployment ke production!
