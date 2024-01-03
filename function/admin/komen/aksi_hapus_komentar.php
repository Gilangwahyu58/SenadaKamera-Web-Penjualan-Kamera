<?php
include("Koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan penghapusan data dari tabel tbl_komen
    $delete_query = "DELETE FROM tbl_komen WHERE id_komen = $id";
    $result = mysqli_query($koneksi, $delete_query);

    if ($result) {
        echo "<script>alert('Data Terhapus');
              window.location='halaman.php?page=komen/data_komentar';
              </script>";
        exit; // Hentikan eksekusi kode setelah redirect
    }
}

// Jika penghapusan gagal atau 'id' tidak ditemukan
echo "<script>alert('Gagal Menghapus Data');
      window.location='halaman.php?page=komen/data_komentar';
      </script>";
?>
