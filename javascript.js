// Data harga menu (Sesuaikan dengan harga di daftar menu Anda)
const hargaMenu = {
    "Ayam Bakar Madu": 35000,
    "Rendang Sapi": 45000,
    "Sayur Asem Segar": 15000,
    "Sambal Goreng Ati": 20000,
    "Cumi Cabe Ijo": 30000,
    "Urap Sayur Desa": 12000
};

const ongkir = 10000;

// 1. Fungsi Toggle Alamat & Ongkir
function toggleDelivery(isDelivery) {
    const deliveryDetails = document.getElementById('delivery-details');
    const addressInput = document.getElementById('address');
    
    if (isDelivery) {
        deliveryDetails.style.display = 'block';
        addressInput.setAttribute('required', 'true');
    } else {
        deliveryDetails.style.display = 'none';
        addressInput.removeAttribute('required');
    }
    
    // Hitung ulang total saat metode pengiriman berubah
    hitungTotal();
}

// 2. Fungsi Hitung Total Harga Otomatis
function hitungTotal() {
    let total = 0;
    
    // Ambil semua checkbox menu yang dicentang
    const selectedMenus = document.querySelectorAll('input[name="menu"]:checked');
    
    selectedMenus.forEach(item => {
        total += hargaMenu[item.value] || 0;
    });

    // Cek apakah opsi "Diantarkan" dipilih
    const isDelivery = document.querySelector('input[name="delivery_method"][value="delivery"]').checked;
    if (isDelivery && selectedMenus.length > 0) {
        total += ongkir;
    }

    // Update tampilan total di ringkasan pesanan
    const totalElement = document.querySelector('.order-item.total strong:last-child');
    if (totalElement) {
        totalElement.innerText = "Rp" + total.toLocaleString('id-ID');
    }
}

// 3. Event Listener untuk perubahan Checkbox
document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('input[name="menu"]');
    checkboxes.forEach(box => {
        box.addEventListener('change', hitungTotal);
    });
});

// 4. Fungsi Kirim Pesanan (Contoh sederhana)
document.querySelector('.order-form').addEventListener('submit', function(e) {
    const selectedMenus = document.querySelectorAll('input[name="menu"]:checked');
    
    if (selectedMenus.length === 0) {
        e.preventDefault();
        alert("Silakan pilih minimal satu menu sebelum memesan.");
    } else {
        alert("Terima kasih! Pesanan Anda sedang diproses.");
    }
});

document.querySelector('.order-form').addEventListener('submit', function(e) {
    e.preventDefault(); 

    // 1. Ambil Data dari Form
    const nama = document.querySelector('input[placeholder="Masukkan nama Anda"]').value;
    const wa = document.querySelector('input[type="tel"]').value;
    const metode = document.querySelector('input[name="delivery_method"]:checked').value;
    const alamat = document.getElementById('address').value;
    const waktu = document.querySelector('select').value;
    const catatan = document.querySelector('textarea[placeholder*="Contoh: Ayam Bakar"]').value;

    // 2. Ambil Menu & Hitung Harga untuk Struk
    let listMenu = "";
    let totalHargaMenu = 0;
    const selectedMenus = document.querySelectorAll('input[name="menu"]:checked');
    
    selectedMenus.forEach(item => {
        const namaProduk = item.value;
        const hargaProduk = hargaMenu[namaProduk] || 0; // Mengambil harga dari objek hargaMenu
        totalHargaMenu += hargaProduk;
        
        // Menampilkan harga per item di struk
        listMenu += `
            <div class="receipt-item">
                <span>${namaProduk}</span>
                <span>Rp${hargaProduk.toLocaleString('id-ID')}</span>
            </div>`;
    });

    // Hitung Ongkir jika diantar
    let biayaOngkir = (metode === 'delivery') ? ongkir : 0;
    let grandTotal = totalHargaMenu + biayaOngkir;

    // 3. Bangun Isi Struk
    const receiptContent = document.getElementById('receipt-content');
    receiptContent.innerHTML = `
        <p><strong>Nama:</strong> ${nama}</p>
        <p><strong>WhatsApp:</strong> ${wa}</p>
        <p><strong>Waktu:</strong> ${waktu}</p>
        <hr style="border-top: 1px dashed #000;">
        <div class="menu-list">
            ${listMenu}
        </div>
        ${biayaOngkir > 0 ? `
        <div class="receipt-item">
            <span>Ongkos Kirim</span>
            <span>Rp${biayaOngkir.toLocaleString('id-ID')}</span>
        </div>` : ''}
        <hr style="border-top: 1px dashed #000;">
        <div class="receipt-item receipt-total">
            <strong>Total Bayar</strong>
            <strong>Rp${grandTotal.toLocaleString('id-ID')}</strong>
        </div>
        <br>
        <p><strong>Metode:</strong> ${metode === 'delivery' ? 'Diantarkan' : 'Ambil Sendiri'}</p>
        ${metode === 'delivery' ? `<p><strong>Alamat:</strong> ${alamat}</p>` : ''}
        <p><strong>Catatan:</strong> ${catatan || '-'}</p>
    `;

    // 4. Tampilkan Modal Struk
    document.getElementById('receipt-section').style.display = 'flex';
});