var inputCounter = 0;

function addInput() {
    // Membuat elemen input baru
    var newInput = document.createElement('div');
    newInput.innerHTML =
        `<div class="form-group">
        <label for="inputNew" >Kelas</label>
        <input type="text" class="form-control" name="kelas[]" placeholder="Ex. 7-A" required>
        </div>
        <button type="button" class="btn btn-danger btn-sm mb-3" onclick="removeInput(this)">Hapus</button>`;

    // Menambahkan elemen input baru ke dalam div dengan id "dynamicInputs"
    document.getElementById('dynamicInputs').appendChild(newInput);

    // Menambahkan counter
    inputCounter++;
}

function removeInput(button) {
    // Menghapus elemen input dan tombol "Hapus" yang sesuai
    var parentDiv = button.parentNode;
    parentDiv.parentNode.removeChild(parentDiv);

    // Mengurangkan counter
    inputCounter--;
}
