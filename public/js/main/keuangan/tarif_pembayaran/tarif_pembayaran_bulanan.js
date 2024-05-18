$('#example').DataTable({
    "paging": true, // Aktifkan pagination
    "lengthChange": true, // Nonaktifkan opsi perubahan jumlah entri per halaman
    "searching": true, // Aktifkan pencarian
    "ordering": false, // Aktifkan pengurutan kolom
    "info": true, // Aktifkan informasi tentang jumlah entri dan halaman
    "autoWidth": false, // Nonaktifkan otomatis lebar kolom
    "responsive": true // Aktifkan responsif
});

// document.getElementById("searchInput").addEventListener("keyup", function() {
//     var input, filter, table, tr, td, i, j;
//     input = document.getElementById("searchInput");
//     filter = input.value.toUpperCase();
//     table = document.querySelector(".table-responsive table");
//     tr = table.getElementsByTagName("tr");

//     // Loop melalui semua baris tabel
//     for (i = 0; i < tr.length; i++) {
//         td = tr[i].getElementsByTagName("td");
//         // Loop melalui semua sel dalam baris
//         for (j = 0; j < td.length; j++) {
//             if (td[j]) {
//                 // Jika teks dalam sel cocok dengan pencarian, tampilkan baris, jika tidak, sembunyikan
//                 if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
//                     tr[i].style.display = "";
//                     break; // Keluar dari loop saat pencocokan ditemukan
//                 } else {
//                     tr[i].style.display = "none";
//                 }
//             }
//         }
//     }
// });

$(document).ready(function() {
    $("#EDK").click(function() {
        var confirmation = confirm("Apakah Anda yakin ingin melanjutkan?");
        if (confirmation) {} else {
            return false;
        }
    });
});