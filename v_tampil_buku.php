<?php
include_once ("../controller/c_buku.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body {
            background: linear-gradient(135deg, #0f2a165b, #020617);
            font-family: "playstation 5", blink, sans-serif,"san francisco"
            color: #ffffff;
            margin: 0;
            padding: 40px;
        }       

        h2 {
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: 0.3s;
            margin-bottom: 20px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background: rgba(255, 255, 255, 0.1);
        }

        thead th {
            padding: 14px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }

        tbody tr {
            transition: 0.3s;
        }

        tbody tr:hover {
            background: rgba(83, 235, 37, 0.15);
        }

        tbody td {
            padding: 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.86);
            font-size: 14px;
        }
    </style>
</head>

<body>

    <h2>📚 Data Buku</h2>
    <a href="v_tambah_buku.php" class="btn">+ Tambah Buku Baru</a>
    <table border="1" cellpadding="10">

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <a href="#" class="edit">edit</a>
                    <a href="#" class="hapus">"return confirm('Hapus data ini?')"hapus</a>
                </tr>
            </thead>
            <tbody>
                <br>
                <?php
                $no = 1;
                foreach ($bukus as $data) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->judul ?></td>
                    <td><?= $data->kategori ?></td>
                    <td><?= $data->stok ?></td>
                            
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>