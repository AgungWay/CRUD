<?php
global $data_mhs;

if (isset($_POST['hapus'])) {
    if (delete($_POST) > 0) {
        echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
        exit;
    } else {
        echo '<script>console.log("Gagal Hapus !!");</script>';
    }
}
?>
<?php foreach ($data_mhs as $mhs) : ?>
<?php $target = preg_replace('/[^A-Za-z0-9\-]/', '', $mhs['nama']);?>
<div class="modal fade" id="hapus<?= $target ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $mhs['id'] ?>Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="hapus" action="./index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <p name="<?= $mhs["nama"] ?>">Data <?= $mhs["nama"] ?> akan dihapus</p>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs["nim"] ?>" hidden>
                    <input type="text" class="form-control" id="nim" name="foto" value="<?= $mhs["foto"] ?>" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>