<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$kd_barang = $_POST['kd_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$garansi = $_POST['garansi'];
$id_kategori = $_POST['id_kategori'];
$jumlah = $_POST['jumlah'];
$berat = $_POST['berat'];
$tgl = $_POST['tgl'];
$ket = $_POST['ket'];

if (isset($_POST['simpan'])) {
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    if ($lokasi_foto != "") {
        $nama_foto = $_FILES['foto']['name'];
        $lokasi_foto = $_FILES['foto']['tmp_name'];
        $tipe_foto = $_FILES['foto']['type'];
        
        move_uploaded_file($lokasi_foto, "images1/$nama_foto");
        
        $query = mysqli_query($koneksi, "INSERT INTO tbl_product (kd_barang, nama_barang, harga, garansi, id_kategori, jumlah, berat, tgl, ket, foto) VALUES ('$kd_barang', '$nama_barang', '$harga', '$garansi', '$id_kategori', '$jumlah', '$berat', '$tgl', '$ket', '$nama_foto')");

        if ($query) {
            echo "<script>alert('Data tersimpan'); window.location='/function/admin/halaman.php?page=product/aksesoris/data_aksesoris';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data');</script>";
        }
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO tbl_product (kd_barang, nama_barang, harga, garansi, id_kategori, jumlah, berat, tgl, ket) VALUES ('$kd_barang', '$nama_barang', '$harga', '$garansi', '$id_kategori', '$jumlah', '$berat', '$tgl', '$ket')");

        if ($query) {
            echo "<script>alert('Data tersimpan'); window.location='/function/admin/halaman.php?page=product/aksesoris/data_aksesoris';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data');</script>";
        }
    }
}
?>
