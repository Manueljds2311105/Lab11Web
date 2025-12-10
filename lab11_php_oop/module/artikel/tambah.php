<?php
// Instance objek form dan database sudah ada di index.php utama, 
// tapi jika perlu inisialisasi ulang atau independen:
$database = new Database();

// Handle Form Submit
if (isset($_POST['submit'])) {
    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];
    
    // Simpan ke tabel 'artikel'
    $simpan = $database->insert('artikel', $data);
    
    if ($simpan) {
        // Redirect atau pesan sukses
        echo "<script>alert('Data berhasil disimpan'); window.location.href='artikel';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}

// Menampilkan Form
$form = new Form("tambah", "Simpan Data"); // Action 'tambah' mengarah ke URL saat ini
$form->addField("judul", "Judul Artikel");
$form->addField("isi", "Isi Artikel", "textarea");

echo "<h3>Tambah Artikel</h3>";
$form->displayForm();
?>