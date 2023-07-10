<?php
global $data_mhs;

if (isset($_POST['edit'])) {
    if (update($_POST) > 0) {
        echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
        exit;
    } else {
        echo '<script>console.log("Gagal Update !!");</script>';
    }
}

?>


<?php foreach ($data_mhs as $mhs) : ?>
    <?php $target = preg_replace('/[^A-Za-z0-9\-]/', '', $mhs['nama']); ?>
    <div class="modal fade bd-example-modal-lg" id="<?= $target ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $mhs['id'] ?>Title" aria-hidden="true">
        <script>
            console.log("Tes", <?= $mhs['nim'] ?>, " : ", <?= $mhs['foto'] ?>);
        </script>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content crudModal">
                <div class="modal-header" style="border-bottom: 0.3px;">
                    <h5 class="modal-title text-uppercase d-flex align-items-center" id="form-editTitle">Data Mahasiswa</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border-bottom: 0.3px solid rgb(82, 81, 81);">
                    <!-- TES -->
                    <form id="edit" action="./index.php" method="post" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class=" col-md-3">
                                    <?php
                                    $filePath = './public/foto_mhs/' . $mhs["foto"];

                                    if (is_readable($filePath) && file_exists($filePath) == true) {
                                        echo '<img src="./public/foto_mhs/' . $mhs["foto"] . '" alt="Belum ada Foto !" class="img-fluid mt-3 rounded" width="200px">';
                                        echo '<script>console.log("DATA ADA !");</script>';
                                    } else {
                                        echo '<img src="./public/default.png" alt="" class="img-fluid mt-3" width="200px">';
                                        echo '<script>console.log("DATA TIDAK ADA !");</script>';
                                    }
                                    ?>
                                    <input type="file" class="img-fluid mt-2" id="foto" name="foto">
                                </div>
                                <div class="col-md">

                                    <div class="form-group">
                                        <label for="nama">Nama : </label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs["nama"] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM : </label>
                                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs["nim"] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat :</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $mhs["alamat"] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi">Prodi :</label>
                                        <select class="form-control" id="prodi" name="prodi">
                                            <option value="" hidden></option>
                                            <option value="TEKNIK INFORMATIKA" <?php if ($mhs["prodi"] === 'TEKNIK INFORMATIKA') echo ' selected'; ?>>TEKNIK INFORMATIKA</option>
                                            <option value="TEKNIK SIPIL" <?php if ($mhs["prodi"] === 'TEKNIK SIPIL') echo ' selected'; ?>>TEKNIK SIPIL</option>
                                            <option value="TEKNIK ELEKTRO" <?php if ($mhs["prodi"] === 'TEKNIK ELEKTRO') echo ' selected'; ?>>TEKNIK ELEKTRO</option>
                                            <option value="MANAJEMEN" <?php if ($mhs["prodi"] === 'MANAJEMEN') echo ' selected'; ?>>MANAJEMEN</option>
                                            <option value="ILMU HUKUM" <?php if ($mhs["prodi"] === 'ILMU HUKUM') echo ' selected'; ?>>ILMU HUKUM</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>