<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Buku</title>

<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "San Francisco",
                     "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        background: #f2f2f7;
        padding: 20px;
    }

    .container {
        background: #ffffff;
        border-radius: 18px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    h2 {
        text-align: center;
        color: #1c1c1e;
        margin-bottom: 20px;
    }

    .btn-add {
        display: inline-block;
        background: #007aff;
        color: #fff;
        padding: 10px 16px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .btn-add:hover {
        background: #005ecb;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 14px;
        overflow: hidden;
    }

    th {
        background: #f2f2f7;
        padding: 12px;
        font-size: 14px;
        color: #3a3a3c;
        text-align: left;
    }

    td {
        padding: 12px;
        border-top: 1px solid #e5e5ea;
        font-size: 14px;
        color: #1c1c1e;
    }

    tr:hover {
        background: #f9f9fb;
    }

    .badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        color: white;
    }

    .pelajaran { background: #34c759; }
    .novel { background: #ff9500; }
    .komik { background: #af52de; }

    .aksi a {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 10px;
        font-size: 12px;
        margin-right: 6px;
    }

    .edit {
        background: #ffcc00;
        color: #1c1c1e;
    }

    .hapus {
        background: #ff3b30;
        color: white;
    }
</style>
</head>

<body>

<div class="container">
    <h2>Data Buku</h2>

    <a href="tambah_Data_Buku.php" class="btn-add">+ Tambah Data Buku</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Buku</th>
            <th>Harga Buku</th>
            <th>kategori Buku</th>
            <th>Aksi</th>
        </tr>

        <!-- Contoh data (ganti pakai PHP foreach) -->
        <tr>
            <td>1</td>
            <td>Algoritma Pemrograman</td>
            <td>Rp 75.000</td>
            <td><span class="badge pelajaran">Pelajaran</span></td>
            <td class="aksi">
                <a href="#" class="edit">Edit</a>
                <a href="#" class="hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>

        <tr>
            <td>2</td>
            <td>Laskar Pelangi</td>
            <td>Rp 60.000</td>
            <td><span class="badge novel">Novel</span></td>
            <td class="aksi">
                <a href="#" class="edit">Edit</a>
                <a href="#" class="hapus">Hapus</a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
