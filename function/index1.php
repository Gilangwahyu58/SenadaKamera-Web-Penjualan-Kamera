<?php
session_start();
if( isset($_SESSION['admin']) ) {
    header('location:admin/halaman.php'); 
}
if( isset($_SESSION['nama'])) {
	header('location:admin/halaman.php');
}
$koneksi=mysqli_connect('localhost','root','','db_sparepart') or die (mysqli_connect_error());
$userfail = isset($_GET['userfail']);
$passwordfail = isset($_GET['passwordfail']);
$logout = isset($_GET['logout']);
?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>Senada Kamera</title>
	<link rel="icon" type="image/png" href="../a.png">
	<style>
        body {
            background-image: url('background4.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed; /* Membuat gambar latar belakang tetap pada posisinya saat menggulir halaman */
            background-size: cover;
            margin: 0; /* Menghapus margin default untuk memastikan latar belakang memenuhi seluruh halaman */
            padding: 0; /* Menghapus padding default untuk memastikan latar belakang memenuhi seluruh halaman */
            font-family: Arial, sans-serif; /* Pilihan font untuk teks */
        }

        /* Styling lainnya seperti warna teks, ukuran, dll. */

        /* Style untuk form login */
        .panel-body {
            /* Aturan CSS untuk panel login */
            /* Sesuaikan sesuai kebutuhan */
        }

        /* Aturan CSS lainnya untuk elemen lain di halaman login */
        /* ... */
    </style>    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" >
	
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	<!-- Index-Page-CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/waves-effect.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>
<div class="panel-body">



	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="#"><span class="fa fa-desktop"></span> Login Khusus Admin</a></h1>
			</div>
		</div>
		<div class="content-w3ls">
		<div class="text-center icon">
    		<a href="../index.php"> <!-- Tambahkan link ke halaman yang diinginkan di atribut href -->
        		<span class="fa fa-home"></span> <!-- Isi ini dengan ikon atau teks yang ingin dijadikan tautan -->
    		</a>
		</div>
		<div class="content-bottom">
				
			<?php 
 if ($userfail) {
echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Username / Password Salah !</p>
	 </div>';
}
 else if ($passwordfail) {
echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Username / Password Salah !</p>
	</div>';
}
 else if ($logout) {
echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Anda telah berhasil logout</p>
	</div>';
}
?>
				<form action="proses_login.php" method="POST" >
					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>

						<div class="wthree-field">
							<input name="user" type="text" value="" placeholder="Username" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="pass"  type="Password" placeholder="Password">
						</div>
					</div>		
					<div class="wthree-field">
						<button type="submit" name="login" class="btn btn-warning">LOGIN</button>
					</div>
				</form>
			</div>
		</div>
		<div class="bottom-grid1">
			<div class="copyright">
				<p>© 2023| Design by
					<a href="#">Senada Kamera</a> 
					
				</p>
			</div>
		</div>
    </div>
</section>

</body>
<!-- //Body -->
</html>
