# Kanola Skincare Monitoring System 🌸

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

Aplikasi monitoring sistem berbasis Laravel untuk mengelola proses produksi, evaluasi produk, dan pelacakan pesanan masuk (orders) produk Kanola Skincare secara real-time.

---

## Features
* **Dashboard Statistik & Analytics:** Memantau revenue total, total order, customer unik, serta grafik tren penjualan (Chart.js).
* **Manajemen Produk:** Sinkronisasi data antara 14 produk inti aktif.
* **Monitoring Produksi & Progres:** Pelacakan persentase tahapan produksi massal.
* **Evaluasi Mutu & Risiko:** Dokumentasi penilaian kualitas produk dari manager dan tim laboratorium.
* **Manajemen Pesanan Terintegrasi:** Penyimpanan data checkout dengan detail list produk berbasis format JSON array terstruktur.

---

## Database Schema (ERD) 🗄️

```mermaid
erDiagram
    USERS ||--o{ ACTIVITY_LOGS : performs
    USERS ||--o{ CUSTOMER : owns
    EMPLOYEES ||--o{ LEAVE_REQUESTS : makes
    DIVISIONS ||--o{ EMPLOYEES : employs
    PRODUCT_CATEGORIES ||--o{ PRODUCTS : categorizes
    
    USERS {
        bigint id
        string name
        string email
        enum role
    }
    EMPLOYEES {
        bigint id
        string employee_code
        string name
        bigint division_id
        string position
    }
    DIVISIONS {
        bigint id
        string code
        string name
        string manager
    }
    PRODUCTS {
        bigint id
        string name
        int stock
        decimal price
        bigint categories_id
    }
    ORDERS {
        bigint id
        string customer_name
        decimal total_price
        string status
    }
    CUSTOMER {
        bigint id
        string nama
        string email
    }
```
---

## Installation & Setup Guide 🚀

Ikuti langkah-langkah berikut untuk menjalankan repositori ini di lingkungan lokal Anda:

1. **Clone Repositori:**
```bash
git clone [https://github.com/sshunsin/kanola-skincare.git](https://github.com/sshunsin/kanola-skincare.git)
cd kanola-skincare
```

2. **Instalasi Dependency:**
```bash
composer install
npm install && npm run dev
```

3. **Konfigurasi Environment:**
```bash
cp .env.example .env
php artisan key:generate
```
(Update DB_DATABASE, DB_USERNAME, & DB_PASSWORD di file .env)

4. **Migrasi Database:**
```bash
php artisan migrate
```

Jika migrasi gagal maka jalankan perintah ini:
```bash
php artisan migrate:fresh --seed
```

5. **Menjalankan Semua Seeder:**
```bash
php artisan db:seed --class=DatabaseSeeder
```

6. **Jalankan Aplikasi:**
```bash
php artisan serve
```
- Front-end: http://127.0.0.1:8000/front/v1/login
- Back-end: http://127.0.0.1:8000/backend/v1/login

7. **Connect ke storage (opsional)**
```bash
php artisan storage:link
```

---

## Tech Stack

**Backend Framework: Laravel 12.x**

**Language: PHP 8.2+**

**Database Engine: MySQL / MariaDB**

**Frontend Charting: Chart.js Library via CDN**

**Styling: Custom CSS, Google Fonts (Playfair Display)**

---

## License 📄

Proyek ini dilisensikan di bawah Hak Cipta [MIT License](LICENSE). Anda bebas menggunakannya untuk keperluan personal maupun komersial.
