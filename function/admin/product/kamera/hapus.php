<?php
$koneksi=mysqli_connect('localhost','root','','db_sparepart') or die (mysqli_connect_error());
$id = $_GET['id'];
mysqli_query($koneksi, " DELETE FROM tbl_product WHERE id_barang='$id' ");

		echo"<script>alert('terhapus');
			window.location='/function/admin/halaman.php?page=product/kamera/data_kamera';
			</script>";
?>