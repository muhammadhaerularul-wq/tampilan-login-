<?php

include_once "../controller/c_buku.php" ?>

<form action="../controller/c_buku.php?aksi=tambah" method="post">
  <input type="number" name="id_buku" class="form-control" hidden>
  <input type="text" name="judul" class="form-control" placeholder="nama judul">
  <select id="kategori" name="kategori" class="form-control">
    <option value="">pilih kategori</option>
    <option value="Buku Mapel">Buku Mapel</option>
    <option value="lain-lain">lain-lain</option>
  </select>
  <input type="number" name="stok" class="form-control" placeholder="stok">
  <button type="submit" name="tambah" value="kirim">tambah</button>
</form>