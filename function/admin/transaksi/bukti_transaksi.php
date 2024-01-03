<div class="container">
  <h2>Bukti Transaksi</h2>
  <div class="table-responsive">
  <?php
  $koneksi=mysqli_connect('localhost','root','','db_sparepart') or die (mysqli_connect_error());
  $qry=mysqli_query($koneksi,"SELECT * FROM pembayaran");
  ?>
    <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
		<th>Bank</th>
        <th>Jumlah</th>
		<th>Tanggal</th>
		<th>Aksi</th>
      </tr>
    </thead>
    <tbody>   
    <?php 
	$no=1;
	while($data= mysqli_fetch_array($qry)){
		?>  
      <tr class="info">
        <td><?php echo $no++ ?> </td>
        <td><?php echo $data['nama'] ?></td>
        <td><?php echo $data['bank'] ?></td>
		<td><?php echo $data['jumlah'] ?></td>
        <td><?php echo $data['tanggal'] ?></td>
            <td>
                <a href="halaman.php?page=transaksi/hapus&id=<?php echo $data['id_pembayaran'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
            </td>
        </tr>
    <?php } ?>
</tbody>
  </table>
  </div>
</div>