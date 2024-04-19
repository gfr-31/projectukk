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

document.getElementById("searchInput").addEventListener("keyup", function() {
    var input, filter, tableBulan, tableBebas, tr1, tr2, td, i, j;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    tableBulan = document.getElementById('bulanan')
    tableBebas = document.getElementById('bebas')
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

document.getElementById("searchInput2").addEventListener("keyup", function() {
    var input, filter, tableBulan, tableBebas, tr1, tr2, td, i, j;
    input = document.getElementById("searchInput2");
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