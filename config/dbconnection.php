<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "crud221280076";
// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}


//echo "database connected"