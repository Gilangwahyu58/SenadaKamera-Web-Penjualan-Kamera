<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Senada Kamera </title>
<link rel="icon" type="image/png" href="a.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery.countdown.css" /> <!-- countdown --> 
 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
</head> 
<body>

<?php
include "modal_login.php";
?>
 
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<script>
		$('#myModal88').modal('show');
	</script> 
	 
	<div class="header" aria-hidden="true" id="home1">
		<div class="container">
			<div class="w3l_logo">
			<a href="index.html"><img src="senada2.png" alt="Logo Senada store" width="57%"></a>
			</h3>
					<form action="cari.php" method="GET" class="navbar-form navbar-right">
						<input type="text" name="cari" class="form-control" placeholder="Search...">
						<button class="btn btn-primary">CARI</button>
					</form>
			</div>  
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
				
						<li><a href="index.php" class=""><span class="badge"></span>Home<span class="glyphicon glyphicon-qrcode"></span></a></li>	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Product</h6>
											<li><a href="index.php?page=cam/kamera">Kamera</a></li>
											<li><a href="index.php?page=lens/lensa">Lensa</a></li> 
											<li><a href="index.php?page=add/drone">Drone</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Aksesoris</h6>
											<li><a href="index.php?page=cam/aksesoris">Aksesoris</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
						<!-- -->
						<li><a href="index.php?page=view_cart"><span class="badge"></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>

						<li><a href="index.php?page=checkout"><span class="badge"></span> Checkout <span class="glyphicon glyphicon-usd"></span></a></li>
						<!-- -->
						<li><a href="index.php?page=status/status"><span class="badge"></span>Status<span class="glyphicon glyphicon-bookmark"></span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><u><b><?php echo $_SESSION['pembeli']['nama'];?></u></b> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<?php if($_SESSION['pembeli']): ?>
					<li class="active"><a href="logout.php">Logout</a></li>
					<?php else: ?>
					<li class="active"><a data-toggle="modal" data-target="#myModal" class="">Login</a></li>
					<?php endif ?>
										</ul>
									</div>
									
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
	<!-- //navigation -->
<?php
$koneksi=NEW mysqli('localhost','root','','db_sparepart');
?>
<?php
$cari =$_GET['cari'];
$data =array();
$ambil =$koneksi->query("SELECT * FROM tbl_product WHERE nama_barang LIKE '%$cari%' OR harga LIKE '%$cari%'");
while($key=$ambil->fetch_assoc()){
	$data[]=$key;

}
?>

<div class="container">
    <h2>Hasil Pencarian: <?php echo $cari ?></h2>
    <br>
    <div class="row">
        <?php foreach ($data as $cari => $value): ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="index.php?page=detail&id=<?php echo $value['id_barang']; ?>">
                        <img src="function/admin/product/images1/<?php echo $value['foto'] ?>" width="120px" height="150px">
                        <div class="caption">
                            <h3><a href="index.php?page=detail&id=<?php echo $value['id_barang']; ?>"><?php echo $value['nama_barang']; ?></a></h3>
                            <h4>Rp.<?php echo number_format($value['harga']); ?></h4>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
	<!-- -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<div id="flexiselDemo1">			
				<li>
						<img src="images/canon.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/nikon.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/fuji.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/sony.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/dji.jpg" alt=" " class="img-responsive" />
					</li>
				</div>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 
		<?php
	include "top_brand.php";
	?>
	</div>
	<!-- //newsletter -->
	<?php
	include "foother.php";
	?>
			

</body>
</html>