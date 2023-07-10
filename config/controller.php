<?php
// Fungsi query untuk Menampilkan barang
function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};


// Fungsi Tambah Data
function create($post)
{
    global $conn;

    $nim = $post["nim"];
    $prodi = $post["prodi"];
    $nama = $post["nama"];
    $alamat = $post["alamat"];


    // mengambil informasi upload file
    $fileTmp = $_FILES['foto']['tmp_name'];

    // simpan foto
    $newFileName = "foto_" . $nama . '.png';
    $dir = './public/foto_mhs/';
    $targetFile = $dir . $newFileName;
    move_uploaded_file($fileTmp, $targetFile);

    // cek Data Duplikat
    $queryCheck = "SELECT COUNT(*) FROM mahasiswa WHERE nim = ? OR nama = ?";
    $statementCheck = mysqli_prepare($conn, $queryCheck);
    mysqli_stmt_bind_param($statementCheck, "ss", $nim, $nama);
    mysqli_stmt_execute($statementCheck);
    mysqli_stmt_bind_result($statementCheck, $count);
    mysqli_stmt_fetch($statementCheck);

    if ($count > 0) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (nim, prodi, nama, alamat, foto) VALUES (?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($conn, $query);

    // mengikat parameter dengan statement
    mysqli_stmt_bind_param($statement, "sssss", $nim, $prodi, $nama, $alamat, $newFileName);

    // Execute proses
    mysqli_stmt_execute($statement);

    // Check berhasil
    if (mysqli_stmt_affected_rows($statement) > 0) {
        return true;
    } else {
        return false;
    }
}






// Fungsi update
function update($post)
{
    global $conn;

    $nim = $post["nim"];
    $prodi = $post["prodi"];
    $nama = $post["nama"];
    $alamat = $post["alamat"];

    // mengambil informasi upload file
    $fileTmp = $_FILES['foto']['tmp_name'];
    // $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

    // simpan foto
    $newFileName = "foto_" . $nama . '.png';
    $dir = './public/foto_mhs/';
    $targetFile = $dir . $newFileName;
    move_uploaded_file($fileTmp, $targetFile);

    $query = "UPDATE mahasiswa SET prodi = ?, nama = ?, alamat = ?, foto = ? WHERE nim = ?";
    $statement = mysqli_prepare($conn, $query);

    // mengikat parameter dengan statement
    mysqli_stmt_bind_param($statement, "sssss", $prodi, $nama, $alamat, $newFileName, $nim);

    // Execute proses
    mysqli_stmt_execute($statement);

    // Check berhasil
    if (mysqli_stmt_affected_rows($statement) > 0) {
        return true;
    } else {
        return false;
    }
}

// Fungsi Hapus
function delete($post)
{
    global $conn;
    $nim = $post["nim"];
    $query = "DELETE FROM mahasiswa WHERE nim = ?";
    $statement = mysqli_prepare($conn, $query);

    // mengikat parameter dengan statement
    mysqli_stmt_bind_param($statement, "s", $nim);

    // Execute proses
    mysqli_stmt_execute($statement);



    $foto = $post["foto"];
    $filePath = './public/foto_mhs/' . $foto;
    // Delete file if it exists
    if ($filePath && file_exists($filePath)) {
        unlink($filePath);
    }

    // Check berhasil
    if (mysqli_stmt_affected_rows($statement) > 0) {
        return true;
    } else {
        return false;
    }
}
