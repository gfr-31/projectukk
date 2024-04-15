function validasiEdit(tipe, id) {
    var konfirmasi = confirm("Apakah Anda Yakin Untuk Mengedit Data Ini???");
    if (konfirmasi) {
        window.open("/admin/edit/tarif-pembayaran/" + tipe + "/" + id, "_blank");
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
var nis = document.getElementById("nis").value;
// Hitung Pembayaran
// parseInt(a.replace(/\D/g, ""));
// Kembalian
function enterDibayar(event){
    if (event.key === 'Enter') {
        var dibayar = document.getElementById('dibayar' + nis).value
        var a = parseInt(dibayar.replace(/\D/g, ""));
        var total = sessionStorage.getItem('total' + nis) 
        var b = parseInt(total);
        if (!a) {
            a = '0'
            var kembalian = b-a
            // alert(kembalian)
            // alert('abc')
            var rp = 'Rp. ' + kembalian.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById('kembalian'+nis).value = rp
        }else{
            var kembalian = a-b
            // alert(kembalian)
            // alert('123')
            var rp = 'Rp. ' + kembalian.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById('kembalian'+nis).value = rp
        }
    }
}
// Kosong
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
    sessionStorage.setItem('total'+nis, total)
    // var coba = sessionStorage.getItem('total'+nis)
    // alert(coba)
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
document.getElementById("bulanan_link").addEventListener("click", function (event) {
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

document.getElementById("bebas_link").addEventListener("click", function (event) {
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
    // dibayarInput.value = "Rp. " + dibayarInput.value;
    kembalianInput.value = "Rp. " + kembalianInput.value;
};
////////////////////////////////////////////////////////////////////////////////////////////////
// Format Rp Jumlah Buyar Bebas
function rpBayar(id) {
    // Falidasi Form Bebas
    var jumlahBayar = document.getElementById('inputJumlahBayar'+id);
    var keterangan =  document.getElementById('keterangan'+id);
    var button = document.getElementById('submit'+id);

    function check(){
        return jumlahBayar.value.trim() !== '' && keterangan.value.trim() !== ''
    }
    
    function updateButton(){
        button.disabled = !check();
    };

    jumlahBayar.addEventListener('input', updateButton);
    keterangan.addEventListener('input', updateButton);
    button.disabled = true;


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

// document.getElementById('submit'+id).disabled = true;
}

////////////////////////////////////////////////////////////////////////////////////////////////
// Format Rupiah
function formatrp(input){
    // Mengambil nilai input tanpa tanda titik atau Rp
    var nilai = input.value.replace(/\D/g, '');
    
    // Memformat nilai ke format mata uang Rupiah
    var formatted = formatRupiah(nilai);
    
    // Memperbarui nilai input dengan format Rupiah
    input.value = formatted;
}
function formatRupiah(angka){
    var reverse = angka.toString().split('').reverse().join('');
    var ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return 'Rp ' + ribuan;
}
////////////////////////////////////////////////////////////////////////////////////////////////
function tampilkanDivTerakhir2() {
    var jenisPembayaran = localStorage.getItem("jenis_pembayaran2");

    if (jenisPembayaran === "bulanan2") {
        // Tampilkan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan2").style.display = "block";
        // Sembunyikan div untuk jenis pembayaran bebas
        document.getElementById("bebas2").style.display = "none";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bulanan_link2").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bebas_link2").classList.remove("selected");
    } else {
        // Menyembunyikan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan2").style.display = "none";
        // Tampilkan div untuk jenis pembayaran bebas
        document.getElementById("bebas2").style.display = "block";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bebas_link2").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bulanan_link2").classList.remove("selected");
    }
}

// Tambahkan event listener untuk setiap hyperlink
document.getElementById("bulanan_link2").addEventListener("click", function (event) {
        event.preventDefault();
        // Tampilkan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan2").style.display = "block";
        // Menyembunyikan div untuk jenis pembayaran bebas
        document.getElementById("bebas2").style.display = "none";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bulanan_link2").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bebas_link2").classList.remove("selected");

        // Simpan status terakhir ke penyimpanan lokal
        localStorage.setItem("jenis_pembayaran2", "bulanan2");
    });

document.getElementById("bebas_link2").addEventListener("click", function (event) {
        event.preventDefault();
        // Menyembunyikan div untuk jenis pembayaran bulanan
        document.getElementById("bulanan2").style.display = "none";
        // Tampilkan div untuk jenis pembayaran bebas
        document.getElementById("bebas2").style.display = "block";

        // Tambahkan kelas 'selected' untuk menampilkan border pada hyperlink yang dipilih
        document.getElementById("bebas_link2").classList.add("selected");
        // Hapus kelas 'selected' dari hyperlink yang tidak dipilih
        document.getElementById("bulanan_link2").classList.remove("selected");

        // Simpan status terakhir ke penyimpanan lokal
        localStorage.setItem("jenis_pembayaran2", "bebas2");
    });

// Panggil fungsi untuk menampilkan div terakhir saat halaman dimuat
tampilkanDivTerakhir2();

////////////////////////////////////////////////////////////////////////////////////////////////
document.getElementById("searchInput").addEventListener("keyup", function() {
    var input, filter, tableBulan, tableBebas, tr1, tr2, td, i, j;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    tableBulan = document.getElementById('bulanan2')
    tableBebas = document.getElementById('bebas2')
    tr1 = tableBulan.getElementsByTagName("tr");
    tr2 = tableBebas.getElementsByTagName("tr");

    // Loop melalui semua baris tabelBulan
    for (i = 0; i < tr1.length; i++) {
        td = tr1[i].getElementsByTagName("td");
        // Loop melalui semua sel dalam baris
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                // Jika teks dalam sel cocok dengan pencarian, tampilkan baris, jika tidak, sembunyikan
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr1[i].style.display = "";
                    break; // Keluar dari loop saat pencocokan ditemukan
                } else {
                    tr1[i].style.display = "none";
                }
            }
        }
    }
    // Loop melalui semua baris tabelBebas
    for (i = 0; i < tr2.length; i++) {
        td = tr2[i].getElementsByTagName("td");
        // Loop melalui semua sel dalam baris
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                // Jika teks dalam sel cocok dengan pencarian, tampilkan baris, jika tidak, sembunyikan
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr2[i].style.display = "";
                    break; // Keluar dari loop saat pencocokan ditemukan
                } else {
                    tr2[i].style.display = "none";
                }
            }
        }
    }
});

////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    // Menampilkan popover saat mouse masuk ke setiap tombol unduh
    $('.popover-trigger').mouseenter(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover({
            trigger: 'manual', // Agar popover hanya muncul saat diaktifkan secara manual
        });
        $('#' + popoverId).popover('show'); // Menampilkan popover
    });

    // Menyembunyikan popover saat mouse keluar dari setiap tombol unduh
    $('.popover-trigger').mouseleave(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover('hide'); // Menyembunyikan popover
    });
});
$(document).ready(function(){
    // Menampilkan popover saat mouse masuk ke setiap tombol unduh
    $('.popover-trigger2').mouseenter(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover({
            trigger: 'manual', // Agar popover hanya muncul saat diaktifkan secara manual
        });
        $('#' + popoverId).popover('show'); // Menampilkan popover
    });

    // Menyembunyikan popover saat mouse keluar dari setiap tombol unduh
    $('.popover-trigger2').mouseleave(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover('hide'); // Menyembunyikan popover
    });
});
$(document).ready(function(){
    // Menampilkan popover saat mouse masuk ke setiap tombol unduh
    $('.popover-trigger3').mouseenter(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover({
            trigger: 'manual', // Agar popover hanya muncul saat diaktifkan secara manual
        });
        $('#' + popoverId).popover('show'); // Menampilkan popover
    });

    // Menyembunyikan popover saat mouse keluar dari setiap tombol unduh
    $('.popover-trigger3').mouseleave(function(){
        var popoverId = $(this).attr('id');
        $('#' + popoverId).popover('hide'); // Menyembunyikan popover
    });
});
 