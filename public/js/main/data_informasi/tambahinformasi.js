document.getElementById('foto').addEventListener('change', function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function() {
        var imgElement = document.getElementById('preview');
        imgElement.src = reader.result;
    }

    reader.readAsDataURL(file);
});