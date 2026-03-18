Pada minggu ke-4, dilakukan migrasi proyek dari PHP Native ke Framework Laravel yang menggunakan arsitektur MVC (Model-View-Controller). Fokus utamanya adalah merubah direktori, pengaturan rute (routing), dan manajemen aset yang lebih terorganisir untuk meningkatkan efisiensi dan keamanan web.

### 1. Persiapan Proyek & Pemindahan Aset
Langkah awal dimulai dengan instalasi proyek Laravel baru menggunakan Composer. Sesuai dengan standar struktur folder Laravel, seluruh aset statis yang bisa diakses publik dipindahkan ke direktori `public/`. File `style.css` ditempatkan pada `public/css/`, `script.js` pada `public/js/`, dan seluruh gambar produk dipindahkan ke `public/assets/` agar entry point aplikasi tetap aman dan terpusat.

### 2. Setup Routing (Jalur Web)
Seluruh pendefinisian rute atau URL web kini dikelola secara terpusat pada file `routes/web.php`. Jalur URL untuk halaman utama, halaman login, serta proses form login dan logout didefinisikan dengan menghubungkan URL tertentu ke fungsi terkait di dalam Controller menggunakan *named routes* untuk mempermudah pemanggilan rute di dalam aplikasi.

### 3. Pembuatan AuthController
Logika autentikasi dipisahkan ke dalam file `app/Http/Controllers/AuthController.php`. Controller ini berfungsi sebagai penghubung antara data dan tampilan yang di dalamnya terdapat fungsi `showLogin` untuk menampilkan halaman login, fungsi `login` untuk memvalidasi input username dan password (admin/123), serta fungsi `logout` yang bertugas menghapus data sesi menggunakan `session()->forget('user')` sebelum mengarahkan kembali pengguna ke halaman utama.

### 4. Konversi View Login (login.blade.php)
Halaman login dikonversi menjadi template Blade dengan menghapus tag `session_start()` secara manual, karena Laravel mengelola sesi secara otomatis. Perubahan penting pada bagian ini adalah penambahan direktif `@csrf` di dalam tag `<form>` untuk perlindungan dari serangan *Cross-Site Request Forgery*. Selain itu, pesan kesalahan kini ditampilkan menggunakan `@if(session('error'))` yang mengambil pesan dari controller saat autentikasi login gagal.

### 5. Konversi View Index (Aset & Session)
Halaman utama dirubah menjadi `index.blade.php` dengan penyesuaian pemanggilan aset menggunakan *helper* `asset()` untuk memastikan jalur file CSS, gambar, dan JS tetap akurat. Bagian Navbar juga diperbarui menggunakan *Blade Directives* (`@if`, `@else`) yang lebih rapi untuk mengecek status login pengguna. Jika session `user` ditemukan, Navbar akan menampilkan nama pengguna dan tombol logout; jika tidak, Navbar akan menampilkan tombol login.
