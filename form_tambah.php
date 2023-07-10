<?php
// Eksekusi simpan 
if (isset($_POST['simpan'])) {
    if (create($_POST) > 0) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo '<script>console.log("Data Sudah ada !!");</script>';
    }
}

?>


<!-- Button trigger modal -->




<!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="form-tambah" tabindex="-1" role="dialog" aria-labelledby="form-tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content crudModal">
            <div class="modal-header" style="border-bottom: 0.3px;">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Data </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="border-bottom: 0.3px solid rgb(82, 81, 81);">
                <!-- TES -->
                <form id="simpan" action="./index.php" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class=" col-md-3">
                                <img src="./public/default.png" alt="" class="img-fluid mt-3" width="150px">
                                <input type="file" class="img-fluid mt-2" id="foto" name="foto">
                            </div>
                            <div class="col-md">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama : </label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama !" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NIM : </label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM !" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat :</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Prodi :</label>
                                    <select class="form-control" id="prodi" name="prodi">
                                        <option value="" hidden></option>
                                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                                        <option value="TEKNIK SIPIL">TEKNIK SIPIL</option>
                                        <option value="TEKNIK ELEKTRO">TEKNIK ELEKTRO</option>
                                        <option value="MANAJEMEN">MANAJEMEN</option>
                                        <option value="ILMU HUKUM">ILMU HUKUM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
</form>