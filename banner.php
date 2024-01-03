<!-- Bagian Slider Banner -->
<div class="top-brands">
    <div class="container">
        <div class="sliderfig">
            
            <!-- Link gambar di bawah ini -->
            <a href="tujuan_tautan.html">
                <img src="kamera1.png" alt="Deskripsi Gambar" width="67%" style="display: block; margin: 0 auto;">
            </a>
            <!-- Akhir dari link gambar -->
        </div>
    </div>
</div>

<!-- Bagian Tentang Kami -->
<div class="top-brands">
    <div class="container">
        <h3>Tentang Kami</h3>
        <div class="sliderfig">
		<div style="text-align: center; font-family: 'Poppins', sans-serif; padding: 20px;">
    		<p style="font-size: 18px; color: #333; line-height: 1.6; font-style: italic;">
       			Diperkenalkan dan didirikan pada tahun 2023, SENADA KAMERA memulai perjalanannya sebagai toko online yang berdedikasi untuk menjadi tujuan utama bagi penggemar fotografi di Indonesia. Dalam waktu singkat sejak pendiriannya, kami telah menetapkan pijakan yang kokoh dalam dunia fotografi dengan menyediakan rangkaian produk kamera terbaru dari merek-merek ternama. Kami memahami betapa pentingnya setiap momen, oleh karena itu, kami berkomitmen untuk memberikan pengalaman berbelanja yang memuaskan dengan koleksi kamera yang bervariasi, mulai dari kamera pemula hingga peralatan profesional
    		</p>
		</div>

            <!-- Mulai loop untuk menampilkan produk -->
            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');
            $pilih = "SELECT * FROM tbl_product";
            $query = $koneksi->query($pilih);
            while($data = $query->fetch_assoc()) {
                // Konten Produk
            ?>
                <!-- Detail Produk -->
                <!-- Silakan masukkan kode untuk menampilkan detail produk di sini -->
            <?php
            }
            ?>
            <!-- Akhir loop -->
        </div>
    </div>
</div>
