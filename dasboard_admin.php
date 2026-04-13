<?php
// KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

// AMBIL MENU
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'dashboard';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Perpustakaan</title>

<style>
body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto;
    background: #f4f6f9;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    height: 100vh;
    background: #1f2937;
    position: fixed;
    padding-top: 20px;
}
.sidebar h3 {
    color: white;
    text-align: center;
}
.sidebar a {
    display: block;
    color: #d1d5db;
    padding: 12px 20px;
    text-decoration: none;
}
.sidebar a:hover {
    background: #374151;
    color: white;
}

/* HEADER */
.header {
    margin-left: 220px;
    background: #fff;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* CONTENT */
.content {
    margin-left: 220px;
    padding: 20px;
}

/* CARD */
.card {
    background: white;
    padding: 15px;
    border-radius: 12px;
    margin-bottom: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
}
th, td {
    padding: 10px;
    border-bottom: 1px solid #eee;
    text-align: center;
}
th {
    background: #f3f4f6;
}

/* SEARCH */
.search-box {
    margin-bottom: 15px;
}
input[type=text] {
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ccc;
}
button {
    padding: 8px 12px;
    border: none;
    background: #3b82f6;
    color: white;
    border-radius: 8px;
}

/* IMAGE FIX */
img {
    max-width: 100%;
    height: auto;
    display: block;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>Admin</h3>
    <a href="?menu=dashboard">Dashboard</a>
    <a href="?menu=transaksi">Transaksi</a>
    <a href="?menu=buku">Data Buku</a>
    <a href="?menu=anggota">Anggota</a>
</div>

<!-- HEADER -->
<div class="header">
    Dashboard Admin Perpustakaan
</div>

<!-- CONTENT -->
<div class="content">

<?php
// ================= DASHBOARD =================
if ($menu == 'dashboard') {
    $anggota = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM anggota"));
    $buku = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
    $pinjam = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status='dipinjam'"));

    echo "<h2>Dashboard</h2>";
    echo "<div class='card'>Total Anggota: <b>$anggota</b></div>";
    echo "<div class='card'>Total Buku: <b>$buku</b></div>";
    echo "<div class='card'>Buku Dipinjam: <b>$pinjam</b></div>";
}

// ================= TRANSAKSI =================
elseif ($menu == 'transaksi') {
    echo "<h2>Data Transaksi</h2>";

    echo "<div class='search-box'>
            <form>
                <input type='hidden' name='menu' value='transaksi'>
                <input type='text' name='keyword' placeholder='Cari status...' value='$keyword'>
                <button>Cari</button>
            </form>
          </div>";

    $query = "SELECT * FROM peminjaman WHERE status LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $query);

    echo "<table>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id_peminjaman']}</td>
                <td>{$row['id_anggota']}</td>
                <td>{$row['tanggal_pinjam']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
    echo "</table>";
}

// ================= BUKU =================
elseif ($menu == 'buku') {
    echo "<h2>Data Buku</h2>";

    echo "<div class='search-box'>
            <form>
                <input type='hidden' name='menu' value='buku'>
                <input type='text' name='keyword' placeholder='Cari judul...' value='$keyword'>
                <button>Cari</button>
            </form>
          </div>";

    $query = "SELECT * FROM buku WHERE judul LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $query);

    echo "<table>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Stok</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['judul']}</td>
                <td>{$row['kategori']}</td>
                <td>{$row['stok']}</td>
              </tr>";
    }
    echo "</table>";
}

// ================= ANGGOTA =================
elseif ($menu == 'anggota') {
    echo "<h2>Data Anggota</h2>";

    echo "<div class='search-box'>
            <form>
                <input type='hidden' name='menu' value='anggota'>
                <input type='text' name='keyword' placeholder='Cari nama...' value='$keyword'>
                <button>Cari</button>
            </form>
          </div>";

    $query = "SELECT * FROM anggota WHERE nama LIKE '%$keyword%'";
    $result = mysqli_query($koneksi, $query);

    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telp</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id_anggota']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['no_telp']}</td>
              </tr>";
    }
    echo "</table>";
}
?>

</div>
</body>
</html>