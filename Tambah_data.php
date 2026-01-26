

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Buku</title>
</head>
<body>

<h2>Form Tambah Data Buku</h2>

<form method="post">
    <table>
        <tr>
            <td>Nama Buku</td>
            <td>:</td>
            <td><input type="text" name="nama_buku" required></td>
        </tr>
        <tr>
            <td>Harga Buku</td>
            <td>:</td>
            <td><input type="number" name="harga_buku" required></td>
        </tr>
        <tr>
            <td>Jenis Buku</td>
            <td>:</td>
            <td>
                <select name="jenis_buku" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Pelajaran">Pelajaran</option>
                    <option value="Novel">Novel</option>
                    <option value="Komik">Komik</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" name="simpan">Simpan</button>
                <a href="data_buku.php">Kembali</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
