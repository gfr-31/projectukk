function validasiEdit(tipe, id) {
    var konfirmasi = confirm("Apakah Anda Yakin Untuk Mengedit Data Ini???");
    if (konfirmasi) {
        window.location.href =
            "/admin/edit/tarif-pembayaran/" + tipe + "/" + id;
    } else {
        window.location.history;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////
// Cari tombol-tombol dengan nilai tanggal dalam format "DD/MM/YYYY" dan beri class "red-button"
var dateButtons = document.querySelectorAll("button");
dateButtons.forEach(function (button) {
    var value = button.value;
    // RegEx untuk mencocokkan format tanggal "DD/MM/YYYY"
    var regex = /^\d{2}\/\d{2}\/\d{4}$/;
    if (regex.test(value)) {
        button.classList.add("red-button");
        button.disabled = true; // Nonaktifkan tombol
    } else {
        button.disabled = false; // Aktifkan tombol
    }
});


////////////////////////////////////////////////////////////////////////////////////////////////
// Mengurangi Dan Merubah ke tanggal 
function setTanggal(bulan, id) {
    var konfirmasi = confirm("Apakah Siswa Telah Memberikan Uang Pembayaran???");
    if (konfirmasi) {
        var nilaiBulan = parseInt(document.querySelector("button[name=" + bulan + "]").value);
        var jumlah_bayar = document.getElementById('jumlah_bayar' + id);
        jumlah_bayar.value = nilaiBulan;
        // alert(nilaiBulan);

        var namaBulan = bulan.replace(/\d/g, '');
        var bulani = document.getElementById('bulani' + id);
        bulani.value = namaBulan;

        // Mengurangi nilai sisa tagihan dengan nilai bulan yang diklik
        var sisaTagihan = document.getElementById("sisa_tagihan" + id);
        var nilaiSisaTagihan = parseInt(sisaTagihan.value);
        sisaTagihan.value = nilaiSisaTagihan - nilaiBulan;

        if (isNaN(nilaiBulan) || isNaN(nilaiSisaTagihan)) {
            alert("Nilai bulan atau sisa tagihan tidak valid.");
        }
    }else {
        window.history.back();
    }

    // Mendapatkan tanggal saat ini
    var tanggalSekarang = new Date();
    // Format tanggal dalam format MM/DD/YYYY
    var bulanString = ("0" + (tanggalSekarang.getMonth() + 1)).slice(-2); // Tambah 1 karena bulan dimulai dari 0
    var tanggalString = ("0" + tanggalSekarang.getDate()).slice(-2);
    var tahunString = tanggalSekarang.getFullYear();
    // Gabungkan dalam format yang diinginkan (bulan/tanggal/tahun)
    var tanggalFormat = bulanString + "/" + tanggalString + "/" + tahunString;
    // Mengambil nilai asli dari tombol sebelum diubah menjadi tanggal
    var tombolSubmit = document.querySelector("button[name=" + bulan + "]");
    var nilaiAsli = tombolSubmit.getAttribute("data-original-value");
    // Mengubah nilai value dari tombol submit dengan nama bulan yang sesuai
    tombolSubmit.value = tanggalFormat;

    // Menyimpan nilai asli sebagai atribut data
    tombolSubmit.setAttribute("data-original-value", nilaiAsli);
}

////////////////////////////////////////////////////////////////////////////////////////////////
// Fungsi untuk mendapatkan tanggal dan waktu saat ini dalam format YYYY-MM-DD HH:MM:SS
function getWaktu() {
    const now = new Date();
    const year = now.getFullYear();
    const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Tambahkan nol di depan jika hanya satu digit
    const day = now.getDate().toString().padStart(2, '0'); // Tambahkan nol di depan jika hanya satu digit
    // const hours = now.getHours().toString().padStart(2, '0'); // Tambahkan nol di depan jika hanya satu digit
    // const minutes = now.getMinutes().toString().padStart(2, '0'); // Tambahkan nol di depan jika hanya satu digit
    // const seconds = now.getSeconds().toString().padStart(2, '0'); // Tambahkan nol di depan jika hanya satu digit
    return `${day}-${month}-${year}`;
}

// Set nilai input dengan tanggal dan waktu saat ini saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("waktu").value = getWaktu();
});

////////////////////////////////////////////////////////////////////////////////////////////////
function tampilkanDivTerakhir() {
    var jenisPembayaran = localStorage.getItem("jenis_pembayaran");

    if (jenisPembayaran === "bulanan") {
        // Tampilkan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan").style.display = "block";
        // Sembunyikan div untuk jenis pembayaran bebas
        document.getElementById("bebas").style.display = "none";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bulanan_link").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bebas_link").classList.remove("selected");
    } else {
        // Menyembunyikan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan").style.display = "none";
        // Tampilkan div untuk jenis pembayaran bebas
        document.getElementById("bebas").style.display = "block";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bebas_link").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bulanan_link").classList.remove("selected");
    }
}

// Tambahkan event listener untuk setiap hyperlink
document.getElementById("bulanan_link").addEventListener("click", function(event) {
    event.preventDefault();
    // Tampilkan div untuk jenis pembayaran bulanan
    document.getElementById("bulanan").style.display = "block";
    // Menyembunyikan div untuk jenis pembayaran bebas
    document.getElementById("bebas").style.display = "none";

    // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
    document.getElementById("bulanan_link").classList.add("selected");
    // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
    document.getElementById("bebas_link").classList.remove("selected");

    // Simpan status terakhir ke penyimpanan lokal
    localStorage.setItem("jenis_pembayaran", "bulanan");
});

document.getElementById("bebas_link").addEventListener("click", function(event) {
    event.preventDefault();
    // Menyembunyikan div untuk jenis pembayaran bulanan
    document.getElementById("bulanan").style.display = "none";
    // Tampilkan div untuk jenis pembayaran bebas
    document.getElementById("bebas").style.display = "block";

    // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
    document.getElementById("bebas_link").classList.add("selected");
    // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
    document.getElementById("bulanan_link").classList.remove("selected");

    // Simpan status terakhir ke penyimpanan lokal
    localStorage.setItem("jenis_pembayaran", "bebas");
});

// Panggil fungsi untuk menampilkan div terakhir saat halaman dimuat
tampilkanDivTerakhir();

////////////////////////////////////////////////////////////////////////////////////////////////
// Menambahkan "Rp." ke input saat memasukkan nilai
window.onload = function(){
    var nis = document.getElementById('nis').value;
    // alert(nis);
    var totalInput = document.getElementById('total' + nis);
    var dibayarInput = document.getElementById('dibayar' + nis);
    var kembalianInput = document.getElementById('kembalian' + nis);

    totalInput.value = 'Rp. ' + totalInput.value;
    dibayarInput.value = 'Rp. ' + dibayarInput.value;
    kembalianInput.value = 'Rp. ' + kembalianInput.value;
}
// 