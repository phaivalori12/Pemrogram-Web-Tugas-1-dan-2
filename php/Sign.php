<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Pawon Mawida</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <section class="auth-page">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Buat Akun Baru</h2>
                <p>Daftar sekarang dan nikmati kemudahan memesan</p>
            </div>

            <?php if (isset($_GET['error'])) : ?>
                <div class="auth-alert error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="proses_register.php" method="post" class="auth-form" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>

                <div class="input-group">
                    <label for="no_hp">Nomor WhatsApp</label>
                    <input type="tel" id="no_hp" name="no_hp" placeholder="0812xxxxxxx" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-password-wrap">
                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-bar">
                            <span id="bar1"></span>
                            <span id="bar2"></span>
                            <span id="bar3"></span>
                        </div>
                        <small id="strength-label">Masukkan password</small>
                    </div>
                </div>

                <div class="input-group">
                    <label for="konfirmasi">Konfirmasi Password</label>
                    <div class="input-password-wrap">
                        <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Ulangi password Anda" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('konfirmasi', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                    <small id="match-label"></small>
                </div>

                <button type="submit" class="btn-auth-submit">Daftar Sekarang</button>
            </form>

            <p class="auth-switch">
                Sudah punya akun? <a href="Login.php" class="auth-link">Masuk di sini</a><br>
                <a href = "../Home.php">Kembali</a>
            </p>
        </div>
    </section>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            btn.innerHTML = isHidden
                ? `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
                : `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
        }

        function checkStrength(val) {
            const b1 = document.getElementById('bar1');
            const b2 = document.getElementById('bar2');
            const b3 = document.getElementById('bar3');
            const label = document.getElementById('strength-label');
            let strength = 0;
            if (val.length >= 8) strength++;
            if (/[A-Z]/.test(val) && /[0-9]/.test(val)) strength++;
            if (/[^A-Za-z0-9]/.test(val)) strength++;

            b1.className = strength >= 1 ? 'active weak'   : '';
            b2.className = strength >= 2 ? 'active medium' : '';
            b3.className = strength >= 3 ? 'active strong' : '';

            const labels = ['', 'Lemah', 'Sedang', 'Kuat'];
            label.textContent = val.length === 0 ? 'Masukkan password' : labels[strength] || 'Lemah';
        }

        document.getElementById('konfirmasi').addEventListener('input', function () {
            const match = document.getElementById('password').value === this.value;
            const label = document.getElementById('match-label');
            label.textContent = this.value.length === 0 ? '' : match ? '✓ Password cocok' : '✗ Password tidak cocok';
            label.style.color = match ? '#2e7d32' : '#c62828';
        });

        function validateForm() {
            const pass = document.getElementById('password').value;
            const konfirm = document.getElementById('konfirmasi').value;
            if (pass !== konfirm) {
                alert('Password dan konfirmasi tidak cocok!');
                return false;
            }
            if (pass.length < 8) {
                alert('Password minimal 8 karakter!');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>