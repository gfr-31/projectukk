
function rp(input){
    var a = input.value.replace(/\D/g, '')
    var b = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(a)
    input.value = b
}

function formatRupiah(tagihanId) {
    // Mengonversi angka menjadi format Rupiah dengan koma sebagai pemisah ribuan
    var rupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(tagihanId);

    // Menghapus angka di belakang koma
    rupiah = rupiah.replace(/\d(?=(\d{3})+,)/g, '');

    return rupiah;
    // alert
}

document.getElementById('tarif_bulanan').addEventListener('input', function(event) {
    // Mendapatkan nilai dari input
    var tarifInput = event.target.value;

    // Menghapus karakter selain digit
    tarifInput = tarifInput.replace(/\D/g, '');

    // Mengonversi nilai menjadi format Rupiah
    var tarifRupiah = formatRupiah(tarifInput);

    // Menampilkan nilai dalam format Rupiah di dalam input
    event.target.value = tarifRupiah;
});

document.getElementById('tarif_bulanan').addEventListener('keypress', function(event) {
    // Periksa apakah tombol yang ditekan adalah tombol enter
    if (event.key === 'Enter') {
        event.preventDefault(); // Mencegah pengiriman form secara otomatis

        var tarifBulanan = this.value.trim(); // Ambil nilai tarif bulanan (string)
        // Periksa apakah nilai tarif bulanan tidak kosong
        if (tarifBulanan.trim() !== '') {
            // Konversi nilai tarif bulanan menjadi float
            tarifBulanan = tarifBulanan.replace(/\D/g, '');
            var tarifBulananFloat = parseFloat(tarifBulanan);
            // Periksa apakah nilai tarif bulanan valid
            if (!isNaN(tarifBulananFloat)) {
                var totalTagihan = tarifBulananFloat * 12;
                var totalTagihanBulanan = tarifBulananFloat;
                // Tampilkan nilai total tagihan dengan format "Rp."
                var formattedTotalTagihan = 'Rp. ' + totalTagihan.toFixed(0).replace(
                    /\B(?=(\d{3})+(?!\d))/g,
                    ".");
                var formattedTotalTagihanBulanan = 'Rp. ' + totalTagihanBulanan.toFixed(0).replace(
                    /\B(?=(\d{3})+(?!\d))/g,
                    ".");
                hitungTagihan('tagihan1', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan2', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan3', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan4', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan5', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan6', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan7', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan8', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan9', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan10', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan11', formattedTotalTagihanBulanan);
                hitungTagihan('tagihan12', formattedTotalTagihanBulanan);
                hitungTagihan('totalTagihan', formattedTotalTagihan);
                hitungTagihan('sisaTagihan', formattedTotalTagihan);
            } else {
                alert('Nilai tarif bulanan tidak valid. Harap masukkan angka.');
            }
        } else {
            alert('Harap masukkan nilai tarif bulanan yang valid.');
        }
    }
});

// Fungsi untuk menghitung dan mengisi nilai tagihan pada form-tagihan tertentu
function hitungTagihan(tagihanId, tarifBulanan) {
    var tagihanField = document.getElementById(tagihanId);
    // Hitung tagihan berdasarkan tarif bulanan
    var tagihan = tarifBulanan; // Contoh: tagihan setahun
    // Set nilai field-tagihan
    tagihanField.value = tagihan; // Format nilai menjadi dua angka di belakang koma
}