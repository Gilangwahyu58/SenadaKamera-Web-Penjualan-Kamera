<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tbl_alamat WHERE id_alamat='$id'");
$data = $ambil->fetch_assoc();

if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d');

    // Simpan data pembayaran ke dalam database
    $query = mysqli_query($koneksi, "INSERT INTO `pembayaran` (`nama`, `bank`, `jumlah`, `tanggal`) VALUES ('$nama', '$bank', '$jumlah', '$tanggal')");

    if ($query) {
        // Jika pembayaran berhasil, tampilkan notifikasi
        echo "<script>alert('Pembayaran Anda telah berhasil diproses!!! Silahkan kirim foto bukti transaksi ke WhatsApp');
        window.location='https://wa.me/6212345678987'; 
        </script>";
    } else {
        // Jika ada kesalahan saat menyimpan data pembayaran
        echo "<script>alert('Terjadi kesalahan saat memproses pembayaran. Silahkan coba lagi');
        window.location='index.php?page=status/status';
        </script>";
    }
}
?>
