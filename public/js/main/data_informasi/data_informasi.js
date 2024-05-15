$(document).ready(function () {
    var userIDArr; 

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
            setTimeout(function() {
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
        // console.log(stuId);
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

