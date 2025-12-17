# Praktikum 12 – Autentikasi dan Session (PHP OOP)

## Identitas
- **Mata Kuliah**: Pemrograman Web  
- **Praktikum**: 12  
- **Topik**: Autentikasi dan Session  
- **Bahasa**: PHP (OOP)  
- **Database**: MySQL  

---

## Tujuan Praktikum
1. Memahami konsep autentikasi (login dan logout).
2. Memahami penggunaan session pada PHP.
3. Mengimplementasikan sistem login sederhana.
4. Melindungi halaman tertentu menggunakan session.
5. Menambahkan fitur profil pengguna.

---

## Struktur Folder
```
lab11_php_oop/
│
├── class/
│   ├── Database.php
│   └── Form.php
│
├── module/
│   ├── home/
│   │   └── index.php
│   ├── user/
│   │   ├── login.php
│   │   ├── logout.php
│   │   └── profile.php
│   └── artikel/
│       ├── index.php
│       ├── tambah.php
│       ├── ubah.php
│       └── hapus.php
│
├── template/
│   ├── header.php
│   └── footer.php
│
├── config.php
├── index.php
└── README.md
```

---

## Persiapan Database

### Tabel Users
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100)
);
```

### Insert User Admin
```sql
INSERT INTO users (username, password, nama)
VALUES (
  'admin',
  '$2y$10$XXXXXXXXXXXXXXXXXXXXXXXX',
  'Administrator'
);
```
Password disimpan dalam bentuk hash menggunakan fungsi `password_hash()`.

---

## Routing dan Session
Aplikasi menggunakan file `index.php` sebagai **Front Controller**.  
Session diaktifkan menggunakan `session_start()` dan digunakan untuk:
- Menyimpan status login
- Menyimpan data user yang sedang login
- Melindungi halaman admin dari akses user yang belum login

---

## Modul Login dan Logout
- **Login** dilakukan dengan mencocokkan password menggunakan `password_verify()`
- Jika login berhasil, session akan dibuat
- **Logout** menghapus session menggunakan `session_destroy()`

---

## Navigasi Dinamis
Menu navigasi berubah sesuai status login:
- Belum login → Home, Login
- Sudah login → Home, Artikel, Profil, Logout

---

## Modul Artikel (CRUD)
Setelah login, user dapat mengelola data artikel:
- Melihat daftar artikel
- Menambah artikel
- Mengubah artikel
- Menghapus artikel

Semua halaman artikel hanya bisa diakses jika user sudah login.

---

## Fitur Profil Pengguna

Pada praktikum ini ditambahkan fitur **Profil Pengguna** yang berada pada file `module/user/profile.php`.

### Fungsi Halaman Profil
1. Menampilkan data user yang sedang login:
   - Nama
   - Username
2. Menyediakan form untuk mengubah password.

### Perubahan Password
Password baru yang dimasukkan user akan:
- Dienkripsi menggunakan `password_hash()`
- Disimpan kembali ke database dalam bentuk hash

Dengan cara ini, password tidak pernah disimpan dalam bentuk teks biasa sehingga lebih aman.

### Keamanan
- Halaman profil diproteksi dengan session
- User yang belum login akan diarahkan ke halaman login
- Password disimpan dalam bentuk terenkripsi

---

## Cara Menjalankan Aplikasi
1. Jalankan Apache dan MySQL
2. Simpan folder project di `htdocs/lab11_php_oop`
3. Buka browser dan akses:
```
http://localhost/lab11_php_oop
```
4. Login menggunakan:
```
Username: admin
Password: admin123
```

---

## Hasil Pengujian
- Login berhasil
- Session aktif
- Navigasi berubah sesuai status login
- CRUD artikel berjalan dengan baik
- Fitur profil dapat menampilkan data user dan mengubah password
- Logout berhasil menghapus session

---

## Kesimpulan
Praktikum 12 berhasil mengimplementasikan sistem autentikasi dan session menggunakan PHP berbasis OOP. Sistem mampu membatasi akses halaman admin, mengelola data artikel, serta menyediakan fitur profil untuk mengubah password dengan aman.

---

## Screenshot
Screenshot pelaksanaan praktikum disertakan pada laporan sesuai instruksi.
