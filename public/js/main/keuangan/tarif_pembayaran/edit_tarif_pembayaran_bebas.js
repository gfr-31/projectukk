// Fungsi untuk mengonversi angka menjadi format mata uang Rupiah
function formatRupiah(angka) {
    // Mengonversi angka menjadi format Rupiah dengan koma sebagai pemisah ribuan
    var rupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(angka);

    // Menghapus angka di belakang koma
    rupiah = rupiah.replace(/\d(?=(\d{3})+,)/g, '');

    return rupiah;
}

// Event listener untuk menangani input tarif
document.getElementById('tarifInput').addEventListener('input', function(event) {
    // Mendapatkan nilai dari input
    var tarifInput = event.target.value;

    // Menghapus karakter selain digit
    tarifInput = tarifInput.replace(/\D/g, '');

    // Mengonversi nilai menjadi format Rupiah
    var tarifRupiah = formatRupiah(tarifInput);

    // Menampilkan nilai dalam format Rupiah di dalam input
    event.target.value = tarifRupiah;
});

// Event listener untuk menangani input tarif
document.getElementById('sisaTagihan').addEventListener('input', function(event) {
    // Mendapatkan nilai dari input
    var sisaTagihan = event.target.value;

    // Menghapus karakter selain digit
    sisaTagihan = sisaTagihan.replace(/\D/g, '');

    // Mengonversi nilai menjadi format Rupiah
    var tarifRupiah = formatRupiah(sisaTagihan);

    // Menampilkan nilai dalam format Rupiah di dalam input
    event.target.value = tarifRupiah;
});