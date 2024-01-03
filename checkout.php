<?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])){
	echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
}else 
	if(isset($_SESSION['pembeli']['id_pembeli'])){
		if($total==0 || $total==''){
			echo"<script>alert(silahkan belanja terlebih dahulu!');
			window.location='index.php';
			</script>";
		}
?>
	<br/>
<div class="container">
	<div class="row">
			<form method="POST" action="cekcek.php" enctype="multypart/form-data">
			<div class="col-md-12">
			<div class="panel-heading">
							<h3 class="panel-title">Data Pembelian</h3>
						</div>
			<table class="table">
				<thead>
					<th>Foto</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Tanggal Pembelian</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
				include "function/koneksi.php";
				$id_pembeli=$_SESSION['pembeli']['id_pembeli'];
				$tampil=$koneksi->query("SELECT * FROM pembelian_barang a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli='$id_pembeli' ");
				$no=1;?>
								
								<div class="form-group">
								<?php
								while($data=$tampil->fetch_array()) { ?>
								<tr>
							<td width="3%"><img src="function/admin/product/images1/<?php echo $data['foto'];?>" width="70px"></td>
							<td width="8%">
							<input class="form-control" type="hidden" name="idbrg" readonly="readonly" value="<?php echo $data['id_barang'];?>">
							<input class="form-control" type="hidden" name="" readonly="readonly" value="<?php echo $data['nama_barang'];?>"><?php echo $data['nama_barang'];?>
							</td>
							<td width="1%"><input class="form-control" type="hidden" readonly="readonly" name="jumlah" value="1">1</td>
							<td width="6%"><input class="form-control" type="hidden" name="" readonly="readonly" value="<?php echo $data['tanggal'];?>"><?php echo $data['tanggal'];?></td>
							<td width="10%"><input class="form-control" type="hidden" name="" readonly="readonly" value="Rp.<?php echo number_format($data['harga']);?>">Rp.<?php echo number_format($data['harga']);?></td>
							<?php $total += 1*$data['harga'];?>
						</tr>
								<?php } ?>
								<tr>
									<td colspan="4">TOTAL BELANJA</td>
									<td><input class="form-control" type="hidden" name="total" readonly="readonly" value="Rp.<?php echo number_format($total) ?>">Rp.<?php echo number_format($total) ?></td>
								</tr>
								<tr>
									<td colspan="5"><input type="hidden" name="belanja" id="" value="<?php echo $total; ?>" class="form-control"><input type="hidden" name="ongkos" id="ongkos" value="0" class="form-control"><input type="hidden" name="prov" id="prov" class="form-control"></td>
									
								</tr>
						</div>
				</tbody>
			</table>
			</div>
				<div class="col-md-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Data Pemesan</h3>
						</div>
						<div class="form-group">
						<label>Nama</label>
					<input class="form-control" type="hidden" name="id_pembelian" readonly value="<?php echo $_SESSION['pembeli']['id_pembeli'];?>">
					<input class="form-control" type="text" name="nama" readonly value="<?php echo $_SESSION['pembeli']['nama'];?>">
				</div>
				<div class="form-group">
				<label>No telpon </label>
					<input class="form-control" type="text" name="telpon" readonly value="<?php echo $_SESSION['pembeli']['telpon'];?>">
					
				</div>
				<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Hasil</h3>
								</div>
								<div class="panel-body">
									<ol>
										<div id="ongkir"></div>
									</div>
								</ol>
							</div>
				<input class="btn btn-success  col-md-12" value="Checkout" type="submit" name="simpan">			
			</div>
		</div>
<?php
	include ("rajaongkir.php");
?>

	<br>
	
	</form>			
	</div>
	</div>
</div>
<?php 
	include ("aksi_script.php"); 
?>

</body>
</html>
					<?php } ?>
					<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))

		    return false;
		  return true;
		}
</script>
<script type="text/javascript">
   function prov() {
	var tes = document.getElementById("provinsi").value;
        document.getElementById("prov").value=tes;
}
</script>