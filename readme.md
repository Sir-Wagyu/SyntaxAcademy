# SyntaxAcademy

## Deskripsi

SyntaxAcademy adalah sebuah platform e-learning yang menyediakan berbagai kursus pemrograman. Aplikasi ini memungkinkan pengguna untuk mendaftar, memilih kursus, mengakses materi pembelajaran, dan melakukan transaksi pembayaran. Platform ini juga memiliki dasbor admin untuk mengelola pengguna, kursus, dan materi.

---

## Fitur Utama

-   **Otentikasi Pengguna**: Sistem registrasi dan login untuk siswa dan admin.
-   **Katalog Kursus**: Menampilkan daftar kursus yang tersedia beserta detailnya.
-   **Pembelajaran Online**: Siswa dapat mengakses materi kursus yang telah dibeli.
-   **Manajemen Profil**: Pengguna dapat melihat dan mengelola profil mereka.
-   **Proses Transaksi**: Integrasi dengan payment gateway (Midtrans) untuk proses pembelian kursus.
-   **Dasbor Admin**:
    -   Manajemen Pengguna
    -   Manajemen Kursus (Tambah, Edit, Hapus)
    -   Manajemen Materi Pembelajaran
-   **Riwayat Transaksi**: Pengguna dapat melihat riwayat pembelian kursus mereka.

---

## Teknologi yang Digunakan

-   **Backend**: PHP (CodeIgniter Framework)
-   **Frontend**: HTML, CSS, JavaScript
-   **CSS Framework**: Tailwind CSS
-   **Database**: MySQL
-   **Payment Gateway**: Midtrans
-   **Lainnya**: Composer, Node.js 

---

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

-   PHP (versi 7.4 atau lebih baru direkomendasikan)
-   Web Server (seperti Apache atau Nginx)
-   Database (seperti MySQL atau MariaDB)
-   Composer
-   Node.js dan npm (Node Package Manager)

---

## Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda:

1.  **Clone Repositori**
    ```bash
    git clone [URL_REPOSITORI_ANDA]
    cd [NAMA_FOLDER_PROYEK]
    ```

2.  **Instal Dependensi PHP**
    Jalankan perintah berikut untuk menginstal semua pustaka PHP yang dibutuhkan.
    ```bash
    composer install
    ```

3.  **Instal Dependensi Frontend**
    Jalankan perintah berikut untuk menginstal Tailwind CSS dan dependensi lainnya.
    ```bash
    npm install
    ```

4.  **Konfigurasi Database**
    -   Salin atau ganti nama file `application/config/database.php`.
    -   Sesuaikan konfigurasi database (hostname, username, password, database) dengan pengaturan lokal Anda.
    ```php
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'nama_database_anda',
    ```
    -   Impor file SQL (jika ada) ke database Anda.

5.  **Konfigurasi Base URL**
    Buka file `application/config/config.php` dan atur `base_url` sesuai dengan URL lokal Anda.
    ```php
    $config['base_url'] = 'http://localhost/nama_folder_proyek/';
    ```

6.  **Jalankan Build Script Frontend (jika diperlukan)**
    Jika Anda membuat perubahan pada file CSS, jalankan perintah ini untuk mengkompilasi ulang file Tailwind CSS.
    ```bash
    npm run build
    ```

7.  **Jalankan Proyek**
    Akses proyek melalui web server Anda (misalnya, melalui XAMPP/WAMP) atau gunakan server bawaan PHP.
    ```bash
    php -S localhost:8000
    ```
    Buka `http://localhost:8000` di browser Anda.

---

## Struktur Folder

Berikut adalah gambaran singkat tentang struktur folder utama dalam proyek ini:

-   `application/`: Berisi inti dari aplikasi CodeIgniter.
    -   `config/`: File konfigurasi (database, autoload, dll.).
    -   `controllers/`: Logika bisnis dan alur aplikasi.
    -   `models/`: Interaksi dengan database.
    -   `views/`: Halaman antarmuka pengguna (UI).
-   `assets/`: Berisi file statis seperti CSS, JavaScript, dan gambar.
-   `system/`: Berisi file inti dari framework CodeIgniter.
-   `vendor/`: Dependensi PHP yang dikelola oleh Composer.

