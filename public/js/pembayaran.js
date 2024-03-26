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
// Hitung Pembayaran
// Kosong
var nis = document.getElementById("nis").value;
function kosong() {
    sessionStorage.removeItem("bulan" + nis);
    sessionStorage.removeItem("bebas" + nis);
    location.reload();
}
/// Total
var nis = document.getElementById("nis").value;
// var idnama = document.getElementById('bebas')
var idnama = document.getElementById("bulan");
var bulan = parseInt(sessionStorage.getItem("bulan" + nis));
var bebas = parseInt(sessionStorage.getItem("bebas" + nis));
// alert(bulan)
// alert(bebas)
if (idnama) {
    // var id = idnama.value.replace(/\D/g, '')
    if (!bulan && !bebas) {
        // alert("Kosong")
    } else if (!bebas) {
        // alert("Bulan")
        var total = bulan;
        if (total !== null) {
            var rp = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (total) {
                document.getElementById("total" + nis).value = rp;
            }
        }
    } else if (!bulan) {
        // alert("Bebas")
        var total = bebas;
        if (total !== null) {
            var rp = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (total) {
                document.getElementById("total" + nis).value = rp;
            }
        }
    } else {
        // alert("Bebas-Bulan")
        var total = bulan + bebas;
        if (total !== null) {
            var rp = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            // alert(coba);
            if (total) {
                document.getElementById("total" + nis).value = rp;
            }
        }
    }
    // alert(total)
}
// Bebas
function btnbebas(id) {
    var nis = document.getElementById("nis").value;
    var a = document.getElementById("inputJumlahBayar" + id).value;
    // var a = document.querySelector('input[name="jumlahBayar"]').value;
    var nilaiBebas = parseInt(a.replace(/\D/g, ""));
    var nilaiSeblumnyaBebas = sessionStorage.getItem("bebas" + nis);
    var nilaiBebass = parseInt(nilaiBebas);
    if (nilaiSeblumnyaBebas) {
        nilaiBebass += parseInt(nilaiSeblumnyaBebas);
    }
    sessionStorage.setItem("bebas" + nis, nilaiBebass);
    var coba = sessionStorage.getItem("bebas" + nis);
    // alert(coba)
}

////////////////////////////////////////////////////////////////////////////////////////////////
// Mengurangi Dan Merubah ke tanggal
function setTanggal(bulan, id) {
    var konfirmasi = confirm(
        "Apakah Siswa Telah Memberikan Uang Pembayaran???"
    );
    if (konfirmasi) {
        var nilaiBulan = parseInt(
            document.querySelector("button[name=" + bulan + "]").value
        );
        var jumlah_bayar = document.getElementById("jumlah_bayar" + id);
        jumlah_bayar.value = nilaiBulan;
        // alert(nilaiBulan);

        // Bulanan
        var nis = document.getElementById("nis").value;
        var nilaiSeblumnya = sessionStorage.getItem("bulan" + nis);
        var nilaiBulanan = parseInt(nilaiBulan);
        if (nilaiSeblumnya) {
            nilaiBulanan += parseInt(nilaiSeblumnya);
        }
        sessionStorage.setItem("bulan" + nis, nilaiBulanan);
        var coba = sessionStorage.getItem("bulan" + nis);
        // alert(coba);

        var namaBulan = bulan.replace(/\d/g, "");
        var bulani = document.getElementById("bulani" + id);
        bulani.value = namaBulan;

        // Mengurangi nilai sisa tagihan dengan nilai bulan yang diklik
        var sisaTagihan = document.getElementById("sisa_tagihan" + id);
        var nilaiSisaTagihan = parseInt(sisaTagihan.value);
        sisaTagihan.value = nilaiSisaTagihan - nilaiBulan;

        if (isNaN(nilaiBulan) || isNaN(nilaiSisaTagihan)) {
            alert("Nilai bulan atau sisa tagihan tidak valid.");
        }
    } else {
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
document
    .getElementById("bulanan_link")
    .addEventListener("click", function (event) {
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

document
    .getElementById("bebas_link")
    .addEventListener("click", function (event) {
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
window.onload = function () {
    var nis = document.getElementById("nis").value;
    // alert(nis);
    var totalInput = document.getElementById("total" + nis);
    var dibayarInput = document.getElementById("dibayar" + nis);
    var kembalianInput = document.getElementById("kembalian" + nis);

    totalInput.value = "Rp. " + totalInput.value;
    dibayarInput.value = "Rp. " + dibayarInput.value;
    kembalianInput.value = "Rp. " + kembalianInput.value;
};
////////////////////////////////////////////////////////////////////////////////////////////////
// Format Rp Jumlah Buyar Bebas
function rpBayar(id) {
    // Fungsi untuk mendapatkan tanggal dan waktu saat ini dalam format YYYY-MM-DD HH:MM:SS
    function getWaktu() {
        const now = new Date();
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, "0"); // Tambahkan nol di depan jika hanya satu digit
        const day = now.getDate().toString().padStart(2, "0"); // Tambahkan nol di depan jika hanya satu digit
        return `${day}-${month}-${year}`;
    }
    // Set nilai input dengan tanggal dan waktu saat ini saat halaman dimuat
    
    // var id = document.getElementById(idw).value
    // alert(id);
    var a = document.getElementById("waktu" + id);
    if (a !== null) {
        a.value = getWaktu();
    }
    // alert(id)
    function formatRupiah(angka) {
        // Mengonversi angka menjadi format Rupiah dengan koma sebagai pemisah ribuan
        var rupiah = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
        }).format(angka);

        // Menghapus angka di belakang koma
        rupiah = rupiah.replace(/\d(?=(\d{3})+,)/g, "");

        return rupiah;
    }
    // alert(id)
    // Event listener untuk menangani input tarif
    document.getElementById("inputJumlahBayar" + id).addEventListener("input", function (event) {
        // Mendapatkan nilai dari input
        var jumlahBayar = event.target.value;

        // Menghapus karakter selain digit
        jumlahBayar = jumlahBayar.replace(/\D/g, "");

        // Mengonversi nilai menjadi format Rupiah
        var tarifRupiah = formatRupiah(jumlahBayar);

        // Menampilkan nilai dalam format Rupiah di dalam input
        event.target.value = tarifRupiah;
    });
}
