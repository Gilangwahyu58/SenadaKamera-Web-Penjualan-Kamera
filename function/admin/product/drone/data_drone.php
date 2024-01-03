<?php
session_start();
if (!isset($_SESSION['admin']['id_admin'])) {
    echo "<script>alert('Silahkan login terlebih dahulu');
		window.location='../index1.php';
		</script>";
} else if (isset($_SESSION['admin']['id_admin'])) {
?>
    <div class="container">
        <h2>Data Drone</h2>
        <a href="halaman.php?page=product/drone/tambah" style="opacity: 1;"><img src="icon/tambahdata.png" alt=""></a></li>

        <div class="table-responsive">
            <?php
            $koneksi = mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
            $qry = mysqli_query($koneksi, "SELECT * FROM tbl_product  a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori WHERE a.id_kategori='3'");
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Product</th>
                        <th>Nama Product</th>
                        <th>Harga</th>
                        <th>Garansi</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Berat</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($qry)) {
                    ?>
                        <tr class="info">
                            <td><?php echo $no++ ?> </td>
                            <td><?php echo $data['kd_barang'] ?></td>
                            <td><?php echo $data['nama_barang'] ?></td>
                            <td><?php echo $data['harga'] ?></td>
                            <td>
                                <?php
                                $months = $data['garansi'];
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
                                echo $garansi_text;
                                ?>
                            </td>
                            <td><?php echo $data['kategori'] ?></td>
                            <td><?php echo $data['jumlah'] ?></td>
                            <td><?php echo $data['berat'] ?></td>
                            <td><?php echo $data['tgl'] ?></td>
                            <td><?php echo $data['ket'] ?></td>
                            <td><img width="50px" height="50px" src="product/images1/<?php echo $data['foto']; ?>"></td>
                            <td>
                                <a href="halaman.php?page=product/drone/edit&id=<?php echo $data['id_barang'] ?>" class="btn btn-primary col-sm-5 fa fa-pencil fa-1x"></a>
                                <a href="#" onclick="confirmDelete(<?php echo $data['id_barang']; ?>)" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>

                                <script>
                                    function confirmDelete(id) {
                                        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                                            // Jika pengguna menekan OK, arahkan ke halaman hapus.php dengan menyertakan id
                                            window.location.href = "/function/admin/product/drone/hapus.php?id=" + id;
                                        } else {
                                            // Jika pengguna memilih Cancel pada konfirmasi, tidak melakukan apa-apa
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
