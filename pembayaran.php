
<?php
	$koneksi=NEW mysqli('localhost','root','','db_sparepart');
	$id= $_GET['id'];
	$ambil=mysqli_query($koneksi,"SELECT * FROM tbl_alamat WHERE id_alamat='$id' ");
    $data=$ambil->fetch_assoc();

?>

<div class="container">
	<h2>Konfirmasi Pembayaran</h2>
	<p>Silahkan Konfirmasi Pembayaran Anda</p><br>
	<div class="alert alert-info">
	<span>Silahkan Transfer ke:<strong> 1234-56-789123-45-6</strong> A/N<strong> senada kamera.</strong><br> Total Tagihan Anda<strong>  Rp. <?php echo number_format($data['total_kes'],2); ?></strong></span>
	</div>

<form action="simpan_pembayaran.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label> Penyetor</label>
		<input type="text" class="form-control" name="nama">
	</div>
<br>
	<div class="form-group ">
        <label class="control-label">Bank</label>
        <select name="bank" class="form-control1" >
		<option>- Pilih -</option>
            <?php 
			$koneksi=NEW mysqli('localhost','root','','db_sparepart');
            $query = mysqli_query($koneksi," SELECT * FROM bank");?>
           <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option  value="<?php echo $data['nama_bank']; ?> "><?php echo $data['nama_bank']; ?> </option>
		   <?php } ?>
		</select>
	</div>
	<div class="form-group">
            <label> Jumlah </label>
            <input type="text" class="form-control" name="jumlah">
        </div>
    <input class="btn btn-primary" type="submit" name="kirim" value="Kirim">
</form></div>