<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_sparepart');
session_start();
$id_pembeli = $_SESSION['pembeli']['id_pembeli'];
$tanggal = date('Y-m-d');
$komentar = $_POST['komentar'];

if (isset($_POST['simpan'])) {
    $query = $koneksi->query("INSERT INTO `tbl_komen` (`id_pembeli`, `komentar`, `tanggal`) VALUES ('$id_pembeli', '$komentar', '$tanggal')");
    if ($query) {
        $_SESSION['pesan'] = 'Komentar berhasil ditambahkan';
    } else {
        $_SESSION['pesan'] = 'Gagal menambahkan komentar';
    }
    header('location:index.php');
    exit;
}
?>
