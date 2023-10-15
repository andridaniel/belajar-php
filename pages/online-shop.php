<?php 
$hostname = "localhost";
$database = "online_shop";
$username = "root";
$password = "";

$conn = mysqli_connect ($hostname, $username, $password, $database);

if (!$conn){
    die("koneksi gagal:" . mysqli_connect_error());
}
echo "Koneksi Berhasil";

mysqli_close($conn)
?>