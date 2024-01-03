<?php
$koneksi=mysqli_connect('localhost','root','','db_sparepart') or die (mysqli_connect_error());
$id = $_GET['id'];
$pilih = mysqli_query($koneksi, "SELECT * FROM tbl_product WHERE id_barang=$id");
$data = mysqli_fetch_array($pilih);
?>

<div class="container">
  <h2>Edit Data Produk</h2>
  <form action="product/aksesoris/simpan_edit.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="kd_brg">Kode Produk</label>
      <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'] ?>">
      <input type="text" class="form-control" value="<?php echo $data['kd_barang'] ?>" name="kd_barang" readonly>
    </div>
    <div class="form-group">
      <label for="nama">Nama Produk</label>
      <input type="text" class="form-control" value="<?php echo $data['nama_barang'] ?>" name="nama_barang">
    </div>
    <div class="form-group">
      <label for="harga">Harga</label>
      <input type="text" class="form-control" value="<?php echo $data['harga'] ?>" name="harga">
    </div>
    <div class="form-group">
      <label for="garansi">Garansi</label>
      <select class="form-control" name="garansi">
        <option value="0" <?php echo ($data['garansi'] == 0) ? 'selected' : ''; ?>>Tidak Ada Garansi</option>
        <?php
          for ($i = 1; $i <= 60; $i++) { // 60 bulan sama dengan 5 tahun
            $months = $i;
            $years = floor($months / 12);
            $remaining_months = $months % 12;
            $garansi_text = '';

            if ($years > 0 && $remaining_months > 0) {
              $garansi_text = "$years tahun $remaining_months bulan";
            } elseif ($years > 0) {
              $garansi_text = "$years tahun";
            } else {
              $garansi_text = "$months bulan";
            }

            $selected = ($i == $data['garansi']) ? 'selected' : '';
            echo "<option value='$i' $selected>$garansi_text</option>";
          }
        ?>
      </select>    </div>
    <div class="form-group">
      <label class="control-label">Nama Kategori</label>
      <select name="id_kategori" class="form-control">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
        while ($kategori = mysqli_fetch_assoc($query)) {
          $selected = ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
          echo "<option value=\"$kategori[id_kategori]\" $selected>$kategori[kategori]</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah</label>
      <input type="text" class="form-control" value="<?php echo $data['jumlah'] ?>" name="jumlah">
    </div>
    <div class="form-group">
  <label for="berat">Berat</label>
  <select class="form-control" name="berat">
    <option value="0">0 kg</option>
    <option value="1">1 kg</option>
    <option value="2">2 kg</option>
    <option value="3">3 kg</option>
    <option value="4">4 kg</option>
    <option value="5">5 kg</option>
  </select>
</div>
    <div class="form-group">
      <label for="tgl">Tanggal</label>
      <input type="date" class="form-control" value="<?php echo $data['tgl'] ?>" name="tgl">
    </div>
    <div class="form-group">
      <label for="ket">Keterangan</label>
      <input type="text" class="form-control" value="<?php echo $data['ket'] ?>" name="ket">
    </div>
    <div class="form-group">
      <label for="foto">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="edit" value="Proses" class="btn btn-warning">
  </form>
</div>
