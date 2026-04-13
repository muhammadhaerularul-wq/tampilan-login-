<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard User</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
}
.navbar {
    background: #3498db;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
}
.navbar a {
    color: white;
    margin-left: 15px;
    text-decoration: none;
    font-weight: bold;
}
.container {
    padding: 20px;
}
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}
.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
}
.card h3 {
    margin: 0;
    color: #555;
}
.card p {
    font-size: 32px;
    font-weight: bold;
    margin-top: 10px;
}
.card.total { border-left: 6px solid #2980b9; }
.card.pinjam { border-left: 6px solid #f39c12; }
.card.kembali { border-left: 6px solid #27ae60; }

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}
th, td {
    padding: 10px;
    border: 1px solid #ddd;
}
th {
    background: #eee;
}
.search-box {
    margin-bottom: 15px;
}
input[type=text] {
    padding: 7px;
    width: 260px;
}
button {
    padding: 7px 12px;
}
.status-dipinjam {
    color: #f39c12;
    font-weight: bold;
}
.status-dikembalikan {
    color: #27ae60;
    font-weight: bold;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div>📚 <strong>Dashboard Anggota</strong></div>
    <div>
        <a href="?menu=transaksi">Transaksi</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

<!-- RINGKASAN DASHBOARD -->
<div class="cards">
    <div class="card total">
        <h3>Total Transaksi</h3>
        <p><?= $total ?></p>
    </div>
    <div class="card pinjam">
        <h3>Sedang Dipinjam</h3>
        <p><?= $dipinjam ?></p>
    </div>
    <div class="card kembali">
        <h3>Sudah Dikembalikan</h3>
        <p><?= $dikembalikan ?></p>
    </div>
</div>

<?php
// ================= TRANSAKSI =================
if ($menu == 'transaksi') {

    echo "<h2>Riwayat Peminjaman</h2>";

    echo "<div class='search-box'>
        <form>
            <input type='hidden' name='menu' value='transaksi'>
            <input type='text' name='keyword' placeholder='Cari status / tanggal / ID' value='$keyword'>
            <button>Cari</button>
        </form>
    </div>";

    $query = "
        SELECT * FROM peminjaman
        WHERE id_anggota='$id_anggota'
        AND (
            status LIKE '%$keyword%'
            OR tanggal_pinjam LIKE '%$keyword%'
            OR id_peminjaman LIKE '%$keyword%'
        )
        ORDER BY tanggal_pinjam DESC
    ";

    $result = mysqli_query($koneksi, $query);

    echo "<table>
        <tr>
            <th>ID</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $class = ($row['status'] == 'dipinjam')
                ? 'status-dipinjam'
                : 'status-dikembalikan';

            echo "<tr>
                <td>{$row['id_peminjaman']}</td>
                <td>{$row['tanggal_pinjam']}</td>
                <td>{$row['tanggal_kembali']}</td>
                <td class='$class'>{$row['status']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4' align='center'>Data tidak ditemukan</td></tr>";
    }

    echo "</table>";
}
?>

</div>
</body>
</html>


