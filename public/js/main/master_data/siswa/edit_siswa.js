document.getElementById('foto').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function () {
        var imgElement = document.getElementById('preview');
        imgElement.src = reader.result;
    }

    reader.readAsDataURL(file);
});

// Set nilai input file setelah halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    var fileInput = document.getElementById('fileInput');
    fileInput.value = ''; // Reset nilai input file (untuk menghindari masalah keamanan)
});

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})

function validateForm() {
    var inputs = document.querySelectorAll('#logins-part input, #logins-part textarea, #logins-part select');
    var isValid = true;

    inputs.forEach(function (input) {
        if (!input.value.trim()) {
            isValid = false;
            return;
        }
    });

    if (!isValid) {
        toastr.error('Semua Data Harus Diisi!')
        // alert('Semua data harus diisi!');
    } else {
        onclick = stepper.next();
    }
    return isValid;
}
