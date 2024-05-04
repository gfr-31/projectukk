var inputCounter = 0;

        function addInput() {
            // Membuat elemen input baru
            var newInput = document.createElement('div');
            newInput.innerHTML =
                `<div class="form-group">
                    <div class=" row">
                        <div class=" col-4"> 
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">POS</label>
                                <input type="text" class="form-control" id="recipient-name"id="input2" name="pos[]" placeholder="Nama Pos" required>
                            </div>
                        </div>
                        <div class=" col-8">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="recipient-name"id="input2" name="keterangan[]" placeholder="Keterangan" required>
                            </div>
                        </div>
                    </div>
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