$('#example').DataTable({
    "paging": true, // Aktifkan pagination
    "lengthChange": true, // Nonaktifkan opsi perubahan jumlah entri per halaman
    "searching": true, // Aktifkan pencarian
    "ordering": false, // Aktifkan pengurutan kolom
    "info": true, // Aktifkan informasi tentang jumlah entri dan halaman
    "autoWidth": false, // Nonaktifkan otomatis lebar kolom
    "responsive": true // Aktifkan responsif
});

// document.getElementById("searchInput").addEventListener("keyup", function () {
//     var input, filter, table, tr, td, i, j;
//     input = document.getElementById("searchInput");
//     filter = input.value.toUpperCase();
//     table = document.querySelector(".table-responsive table");
//     tr = table.getElementsByTagName("tr");
//     // console.log(table);

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

$(document).ready(function () {
    var userIDArr;

    // console.log(userIDArr);
    $('#checkboxesMain').on('click', function (e) {
        if ($(this).prop('checked')) {
            $(".checkbox").prop('checked', true);
        } else {
            $(".checkbox").prop('checked', false);
        }
    });

    $('.checkbox').on('click', function (e) {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $("#checkboxesMain").prop('checked', true);
        } else {
            $("#checkboxesMain").prop('checked', false);
        }
    });

    $('.removeAll').on('click', function (e) {
        userIDArr = [];
        $(".checkbox:checked").each(function () {
            userIDArr.push($(this).attr('data-id'));
        });

        if (userIDArr.length <= 0) {
            toastr.error('Pilih Minimal 1 Data Untuk Dihapus');
        } else {
            // Tampilkan modal konfirmasi
            $('#konfirmasiModal').modal('show');
            setTimeout(function () {
                // document.getElementById("perbaharuiButton").removeAttribute("disabled");
                document.getElementById("btnConfirm").removeAttribute("disabled");
            }, 3000);
        }
    });

    $('#btnCancel').on('click', function () {
        // Sembunyikan modal konfirmasi jika pengguna membatalkan
        $('#konfirmasiModal').modal('hide');
        document.getElementById("btnConfirm").setAttribute("disabled", "disabled")
    });

    $('#btnConfirm').on('click', function () {
        var stuId = userIDArr.join(",");
        console.log(stuId);
        $.ajax({
            url: "/admin/data/hsemua",
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                ids: stuId
            },
            success: function (data) {
                if (data['status'] == true) {
                    $(".checkbox:checked").each(function () {
                        $(this).parents("tr").remove();
                    });
                    alert(data['message']);
                } else {
                    alert('Error occurred.');
                }
            },
            error: function (xhr, status, error) {
                location.reload();
            }
        });
    });
});

function batal(jpId) {
    document.getElementById("confirmButton" + jpId).setAttribute("disabled", "disabled")
}

function submitForm(jpId) {
    // Ganti window.location.href dengan URL halaman yang ingin Anda tuju
    // /admin/data/hapus{{ $d->id }}
    window.location.href = "/admin/data/hapus" + jpId;
}

function submitDelete(jpId) {
    // console.log(jpId);
    setTimeout(function () {
        // document.getElementById("perbaharuiButton").removeAttribute("disabled");
        document.getElementById("confirmButton" + jpId).removeAttribute("disabled");
    }, 3000);
}
