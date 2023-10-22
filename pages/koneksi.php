<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "pos_shop";

$koneksi = new mysqli($servername, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
    
}