<?php
include "m_koneksi.php";

$conn = new m_koneksi();        // buat object
$koneksi = $conn->koneksi;     // ambil koneksi

// query data buku
$query = "SELECT * FROM Data_buku";
$result = $koneksi->query($query);
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>
<body>

<h2>Daftar Data Buku</h2>

<a href="tambah_Data_Buku.php">Tambah Data</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID Buku</th>
        <th>Nama Buku</th>
        <th>Harga Buku</th>
        <th>Jenis Buku</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($data as $Data_buku): ?>
    <tr>
        <td><?= $Data_buku['id_buku']; ?></td>
        <td><?= $Data_buku['Nama_buku']; ?></td>
        <td><?= $Data_buku['Harga_buku']; ?></td>
        <td><?= $Data_buku['jenis_buku']; ?></td>
        <td>
            <a href="edit_Data_Buku.php?id=<?= $Data_buku['id_buku']; ?>">Edit</a> |
            <a href="delete_Data_Buku.php?id=<?= $Data_buku['id_buku']; ?>"
               onclick="return confirm('Yakin ingin menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
