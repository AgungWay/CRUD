<?php
include "./config/app.php";


include "./layout/header.php";

$data_mhs = [];

if (isset($_GET['cari'])) {
    $searchValue = $_GET['cari'];
    $query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$searchValue%' OR prodi LIKE '%$searchValue%' OR nama LIKE '%$searchValue%' OR alamat LIKE '%$searchValue%'";
    $data_mhs = select($query);
} else {
    $data_mhs = select("SELECT * FROM mahasiswa");
}

?>


<div class="container-fluid d-flex align-items-center justify-content-center mt-5 mx-8">
    <div class="row">
        <div class="col-md-15">
            <div class="modals">
                <div class="modal-tambah"><?php include "./form_tambah.php" ?></div>
                <div class="modal-edit"><?php include "./form_edit.php" ?></div>

                <div class="modal-hapus"><?php include "./form_hapus.php" ?></div>
            </div>
            <div class="row" style="position : absolute;">
                <div class="col">
                    <button type="button" class="btn btn-gold mb-3" data-bs-toggle="modal" data-bs-target="#form-tambah">
                        <img src="./public/images/tambah.svg" width="20px" alt="">
                        Tambah Data
                    </button>
                </div>
            </div>

            <table id="dataMhs" class="table table-striped  table-dark mt-3" style="width: auto;">
                <thead class="">
                    <tr>
                        <th scope="col" width="40px" class="text-center" style="background : #D3AC2B; color: black;">No</th>
                        <th scope="col" width="100px" class="text-center" style="background : #D3AC2B; color: black;">NIM</th>
                        <th scope="col" width="150px" class="text-center" style="background : #D3AC2B; color: black;">Prodi</th>
                        <th scope="col" width="300px" class="text-center" style="background : #D3AC2B; color: black;">Nama</th>
                        <th scope="col" width="200px" class="text-center" style="background : #D3AC2B; color: black;">Alamat</th>
                        <th scope="col" width="130px" class="text-center" style="background : #D3AC2B; color: black;">Aksi</th>
                    </tr>
                </thead>

                <!-- tampilkan Data mahasiswa -->
                <tbody class="table-bordered">
                    <?php $no = 1; ?>
                    <?php foreach ($data_mhs as $mhs) : ?>
                        <?php $target = preg_replace('/[^A-Za-z0-9\-]/', '', $mhs['nama']); ?>
                        <tr class="align-middle">
                            <th scope="row" class="text-center"><?= $no++ ?></th>
                            <td><?= $mhs["nim"] ?></td>
                            <td><?= $mhs["prodi"] ?></td>
                            <td><?= $mhs["nama"] ?></td>
                            <td><?= $mhs["alamat"] ?></td>
                            <td class="text-center align-middle">
                                <button class="btn btn-success badge" data-bs-toggle="modal" data-bs-target="#<?= $target ?>" name="edit" class="btn btn-primary">
                                    <img src="./public/images/edit.svg" width="10px" alt=""> Edit</button>
                                <button class="btn btn-danger badge" data-bs-toggle="modal" data-bs-target="#hapus<?= $target ?>"><img src="./public/images/hapus.svg" width="10px" alt=""> Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#dataMhs").DataTable();
    });
</script>
<script src="./public/js/jquery.dataTables.min.js"></script>
<script src="./public/js/dataTables.bootstrap5.min.js"></script>