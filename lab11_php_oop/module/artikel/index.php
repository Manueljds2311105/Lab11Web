<?php
$database = new Database();
// Query manual untuk mengambil semua data (karena method get() di class Database hanya mereturn 1 baris/fetch_assoc [cite: 170])
$sql = "SELECT * FROM artikel";
$result = $database->query($sql);
?>

<h3>Daftar Artikel</h3>
<a href="artikel/tambah" class="btn">Tambah Artikel</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Aksi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['judul'] . "</td>";
            echo "<td>
                    <a href='artikel/ubah?id=" . $row['id'] . "'>Ubah</a> | 
                    <a href='artikel/hapus?id=" . $row['id'] . "' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Belum ada data.</td></tr>";
    }
    ?>
</table>