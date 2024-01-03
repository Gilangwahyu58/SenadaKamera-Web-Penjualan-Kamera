<?php
include("Koneksi.php");

$prefix = 'K'; // Awalan kode produk berdasarkan jenis

// Tentukan awalan kode berdasarkan jenis produk yang dipilih
if (isset($_GET['jenis_produk'])) {
    $jenis_produk = $_GET['jenis_produk'];

    switch ($jenis_produk) {
        case 'kamera':
            $prefix = 'K';
            break;
        case 'lensa':
            $prefix = 'L';
            break;
        case 'drone':
            $prefix = 'D';
            break;
        case 'aksesoris':
            $prefix = 'A';
            break;
        default:
            // Default prefix jika tidak ada jenis produk yang dipilih
            $prefix = 'P'; // P untuk produk umum
            break;
    }
}

$query = mysqli_query($koneksi, "SELECT MAX(SUBSTRING(kd_barang, 3)) AS max_code FROM tbl_product WHERE kd_barang LIKE '$prefix%'");
$data = mysqli_fetch_assoc($query);
$latest_code = $data['max_code'];

$next_number = 1; // Nomor awal untuk produk dengan awalan yang dipilih

if ($latest_code) {
    $next_number = intval($latest_code) + 1;
}

$next_code = $prefix . '-' . sprintf('%03d', $next_number); // Format nomor menjadi tiga digit (001, 002, dst)
?>
<div class="container">
  <h2>Input Data Product</h2>
  <form action="product/kamera/simpan_product.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="kd_barang">Kode Product</label>
      <input type="text" class="form-control" placeholder="Kode Barang" name="kd_barang" value="<?php echo $next_code; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="nama_barang">Nama Product</label>
      <input type="text" class="form-control" placeholder="Nama Product" name="nama_barang">
    </div>
    <div class="form-group">
      <label for="harga">Harga</label>
      <input type="text" class="form-control" placeholder="Harga" name="harga">
    </div>
    <div class="form-group">
      <label for="garansi">Garansi</label>
      <select class="form-control" name="garansi">
        <option value="0">Tidak Ada Garansi</option>
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
            echo "<option value='$i'>$garansi_text</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label class="control-label">Nama Kategori</label>
      <select name="id_kategori" class="form-control1">
        <?php include("Koneksi.php");
        $query = mysqli_query($koneksi, " SELECT * FROM tbl_kategori");
        while ($data = mysqli_fetch_assoc($query)) {
          echo "<option value=\"$data[id_kategori]\">$data[kategori]</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah</label>
      <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
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
      <input type="date" class="form-control" placeholder="tgl" name="tgl" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="form-group">
      <label for="ket">Keterangan</label>
      <textarea type="text" class="form-control" placeholder="Keterangan" name="ket"></textarea>
    </div>
    <div class="form-group">
      <label for="foto">Foto</label>
      <input type="file" placeholder="Foto" name="foto">
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  </form>
</div>

<?php
if (isset($_GET['nama'])) {
  if ($_GET['nama'] == "kosong") {
    echo "<h4 style='color:red'>Nama Belum Di Masukkan !</h4>";
  }
}
?>
