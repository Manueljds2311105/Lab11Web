<?php
$database = new Database();
$id = $_GET['id']; // Mengambil ID dari URL query string (misal: artikel/ubah?id=1)

// Ambil data artikel berdasarkan ID
// Fungsi get() di Database.php menerima klausul WHERE
$data = $database->get('artikel', "id=" . $id);

// Handle Form Submit (Update)
if (isset($_POST['submit'])) {
    $data_update = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];
    
    // Update data dimana id = $id
    // Parameter ke-3 fungsi update() adalah klausul WHERE
    $update = $database->update('artikel', $data_update, "id=" . $id);
    
    if ($update) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='artikel';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}

// Cek apakah data ditemukan
if ($data) {
?>
    <h3>Ubah Artikel</h3>
    <form action="" method="POST">
        <table width="100%">
            <tr>
                <td width="20%"><label>Judul Artikel</label></td>
                <td>
                    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required>
                </td>
            </tr>
            <tr>
                <td><label>Isi Artikel</label></td>
                <td>
                    <textarea name="isi" rows="5" cols="40" required><?php echo $data['isi']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
<?php
} else {
    echo "<p>Data tidak ditemukan.</p>";
}
?>