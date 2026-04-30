<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Sekarang - Pawon Mawida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
    require_once 'header.php';

    // Cek apakah sudah login
    // Jika belum, tampilkan halaman "harus login dulu"
    if (!isset($_SESSION['login'])) : ?>

        <section class="auth-page">
            <div class="auth-card" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 16px;">🔒</div>
                <h2 style="margin-bottom: 8px; color: #1a1a1a;">Akses Terbatas</h2>
                <p style="color: #888; margin-bottom: 28px;">
                    Anda harus login terlebih dahulu untuk melakukan pemesanan.
                </p>
                <a href="php/Login.php" class="btn-auth-submit" style="display:block; margin-bottom: 12px; text-decoration:none;">
                    Masuk ke Akun
                </a>
                <a href="php/Sign.php" class="btn-auth-submit" style="display:block; background:#fff; color:#c62828; border: 2px solid #c62828; text-decoration:none;">
                    Daftar Akun Baru
                </a>
                <p style="margin-top: 20px; font-size: 0.85rem;">
                    <a href="Home.php" class="btn-back">&#8592; Kembali ke Home</a>
                </p>
            </div>
        </section>

    <?php else : ?>

        <section class="order-page">
            <div class="container">
                <h1 class="section-title">Formulir Pemesanan</h1>

                <!-- Info user yang sedang login -->
                <p style="text-align:center; color:#888; margin-top:-20px; margin-bottom:30px; font-size:0.9rem;">
                    Memesan sebagai: <strong style="color:#c62828"><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
                </p>

                <div class="order-container">
                    <form action="#" class="order-form" method="post">

                        <!-- Bagian 1: Data Diri -->
                        <div class="form-section">
                            <h3><span class="step">1</span> Data Diri</h3>
                            <div class="input-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" placeholder="Masukkan nama Anda"
                                    value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" required>
                            </div>
                            <div class="input-group">
                                <label>Nomor WhatsApp</label>
                                <input type="tel" name="no_hp" placeholder="0812xxxxxxx" required>
                            </div>
                        </div>

                        <!-- Bagian 2: Metode Pengiriman -->
                        <div class="form-section">
                            <h3><span class="step">2</span> Metode Pengiriman</h3>
                            <div class="delivery-options">
                                <label class="radio-container">
                                    <input type="radio" name="delivery_method" value="pickup" checked onclick="toggleDelivery(false)">
                                    <span class="radio-mark"></span>
                                    <span class="label-text">Ambil Sendiri (Gratis)</span>
                                </label>
                                <label class="radio-container">
                                    <input type="radio" name="delivery_method" value="delivery" onclick="toggleDelivery(true)">
                                    <span class="radio-mark"></span>
                                    <span class="label-text">Diantarkan (Ongkir Rp10.000)</span>
                                </label>
                            </div>
                            <br>
                            <div id="delivery-details" class="hidden-section">
                                <div class="input-group">
                                    <label>Alamat Lengkap Pengiriman</label>
                                    <textarea id="address" name="alamat" placeholder="Nama jalan, nomor rumah, RT/RW, Patokan" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="input-group">
                                <label>Waktu Pengambilan/Pengantaran</label>
                                <select name="waktu">
                                    <option>Pagi (08:00 - 10:00)</option>
                                    <option>Siang (12:00 - 14:00)</option>
                                    <option>Sore (16:00 - 18:00)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bagian 3: Pilih Menu -->
                        <div class="form-section">
                            <h3><span class="step">3</span> Pilih Menu</h3>
                            <div class="menu-selection-grid">
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Ayam Bakar Madu">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Ayam Bakar Madu</span>
                                </label>
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Rendang Sapi">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Rendang Sapi</span>
                                </label>
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Sayur Asem Segar">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Sayur Asem Segar</span>
                                </label>
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Sambal Goreng Ati">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Sambal Goreng Ati</span>
                                </label>
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Cumi Cabe Ijo">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Cumi Cabe Ijo</span>
                                </label>
                                <label class="menu-checkbox">
                                    <input type="checkbox" name="menu[]" value="Urap Sayur Desa">
                                    <span class="checkmark"></span>
                                    <span class="menu-name">Urap Sayur Desa</span>
                                </label>
                            </div>
                            <div class="input-group" style="margin-top: 20px;">
                                <label>Catatan Tambahan (Jumlah porsi, dll)</label>
                                <textarea name="catatan" placeholder="Contoh: Ayam Bakar 2, Rendang 1. Tidak pakai pedas." rows="2"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn-order-now">KONFIRMASI PESANAN</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Struk Digital -->
        <div id="receipt-section" class="hidden-section receipt-overlay">
            <div class="receipt-card">
                <div class="receipt-header">
                    <h2>Pawon Mawida</h2>
                    <p>Struk Pesanan Digital</p>
                    <hr>
                </div>
                <div id="receipt-content"></div>
                <div class="receipt-footer">
                    <hr>
                    <p>Terima kasih telah memesan!</p>
                    <button onclick="window.print()" class="btn-print">Cetak Struk</button>
                    <button onclick="location.reload()" class="btn-close">Kembali</button>
                </div>
            </div>
        </div>

        <script src="javascript.js"></script>

    <?php endif; ?>

</body>
</html>