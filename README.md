# Lab11Web: Praktikum 11 PHP OOP Lanjutan

Nama: Manuel Johansen Dolok Saribu

NIM: 312410493

Kelas: Ti.24.a5

## 📂 Struktur Folder
Struktur direktori proyek ini disusun menggunakan pola MVC (Model-View-Controller) sederhana:

```
lab11_php_oop/
├── .htaccess            # Konfigurasi URL Rewrite (Apache)
├── config.php           # Konfigurasi koneksi database
├── index.php            # Gerbang utama (Front Controller) & Routing
├── class/               # Library / Helper Classes
│   ├── Database.php     # Wrapper untuk koneksi & query MySQLi
│   └── Form.php         # Generator elemen Form otomatis
├── module/              # Modul-modul fitur website
│   ├── home/            # Modul default
│   └── artikel/         # Modul CRUD Artikel
│       ├── index.php    # Menampilkan data
│       ├── tambah.php   # Form tambah data
│       └── ubah.php     # Form ubah data
└── template/            # Template Layout (View)
    ├── header.php
    ├── footer.php
    └── sidebar.php
```

Langkah-Langkah Praktikum

1. Persiapan Database & Konfigurasi

Membuat database dan menyesuaikan konfigurasi pada file config.php.
- Database: latihan_oop
- Tabel: artikel (id, judul, isi, tanggal)

2. Pembuatan Library (Class)

Memisahkan logika program ke dalam folder class/.
- Database.php: Menangani koneksi ke database, insert, update, delete, dan select data.
- Form.php: Membuat elemen form HTML (input text, radio, checkbox, submit) secara dinamis menggunakan konsep OOP.

3. Implementasi Routing (URL Rewrite)

Routing berfungsi untuk mempercantik URL dan mengarahkan request ke modul yang tepat.
- File .htaccess: Mengubah URL dari index.php?mod=artikel&page=tambah menjadi /artikel/tambah.
- File index.php: Menerima request URL, memecahnya menjadi segmen (Module & Action), dan memanggil file yang sesuai dari folder module/.

4. Layouting (Template)

Memisahkan bagian tampilan yang statis (Header, Footer, Sidebar) agar tidak perlu ditulis ulang di setiap halaman.

5. Implementasi Modul Artikel (CRUD)
   
Membuat fitur CRUD (Create, Read, Update, Delete) sederhana.
- Read: Menampilkan daftar artikel dalam tabel.
- Create: Form tambah data menggunakan class Form.
- Update: Form edit data yang mengambil data lama dari database.
