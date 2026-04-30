<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawon Mawida - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require_once 'header.php'; ?>

    <!-- Hero / Banner -->
    <section class="hero">
        <div class="container hero-container">
            <div class="hero-content">
                <p class="hero-subtitle">Kehangatan Rasa dari Dapur Rumah</p>
                <h1 class="hero-title">Masakan autentik dengan bumbu pilihan, disajikan khusus untuk Anda.</h1>
                <a href="#" class="btn-primary">LIHAT MENU</a>
            </div>
        </div>
    </section>

    <!-- Produk Unggulan -->
    <section class="products">
        <div class="container">
            <h2 class="section-title">Our Best Menu</h2>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image-placeholder">
                        <img src="image/menu/ayam suwir.jpeg" alt="Ayam Suwir Pedas Manis">
                    </div>
                    <div class="product-info">
                        <p class="product-desc">Ayam Suwir Pedas Manis</p>
                        <p class="product-price">Rp 25.000 / 250gr</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image-placeholder">
                        <img src="image/menu/ceker .jpeg" alt="Ceker Ayam Pedas">
                    </div>
                    <div class="product-info">
                        <p class="product-desc">Ceker Ayam Pedas</p>
                        <p class="product-price">Rp 15.000 / 5pc</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image-placeholder">
                        <img src="image/menu/kentang mus.jpeg" alt="Kentang Mustofa">
                    </div>
                    <div class="product-info">
                        <p class="product-desc">Kentang Mustofa Pedas Manis</p>
                        <p class="product-price">Rp 25.000 / 250gr</p>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image-placeholder">
                        <img src="image/menu/Jagung Manis.jpeg" alt="Sop Jagung Manis">
                    </div>
                    <div class="product-info">
                        <p class="product-desc">Sop Jagung Manis</p>
                        <p class="product-price">Rp 10.000</p>
                    </div>
                </div>
                <div class="product-card hidden-mobile">
                    <div class="product-image-placeholder">
                        <img src="image/menu/Ikan Bajo Sambal.jpeg" alt="Sambal Bajo">
                    </div>
                    <div class="product-info">
                        <p class="product-desc">Sambal Bajo Asin Gurih</p>
                        <p class="product-price">Rp 30.000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="custom-footer">
        <div class="footer-container">
            <div class="footer-grid-top">
                <div class="footer-col">
                    <h3>Berikan Masukkan</h3>
                    <p>Jangan lewatkan menu spesial kami yang berganti setiap minggu. Masukkan email untuk dapat info promo!</p>
                    <div class="newsletter-box">
                        <input type="text" placeholder="Masukkan Teks">
                        <button class="btn-established">Kirim</button>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Pawon Mawida</h3>
                    <p>Berawal dari resep turun temurun keluarga, kami menghadirkan masakan rumahan yang otentik, tanpa MSG, dan dimasak fresh setiap hari sesuai pesanan Anda.</p>
                </div>
                <div class="footer-col">
                    <h3>Somes</h3>
                    <ul>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="#">Jadwal Masak (Po/Ready Stock)</a></li>
                        <li><a href="#">Testimoni Pelanggan</a></li>
                    </ul>
                </div>
                <div class="footer-col contact-col">
                    <h3>Our Sosial</h3>
                    <div class="contact-item">
                        <span class="icon">📞</span>
                        <p>Phone: (123) 456-7890</p>
                    </div>
                    <div class="contact-item">
                        <span class="icon">📍</span>
                        <p>Mataram, NTB</p>
                    </div>
                    <div class="contact-item">
                        <span class="icon">✉️</span>
                        <p>pawonmawida@email.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright-bar">
                <p>Rival Hosam Wilmadani | F1D02410091</p>
            </div>
        </div>
    </footer>

</body>
</html>