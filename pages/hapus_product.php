<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus"])) {
    $id = $_POST["id"];

    // Lakukan query penghapusan data berdasarkan ID yang diterima.
    $sql = "DELETE FROM products WHERE id = $id";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect kembali ke halaman tabel produk setelah penghapusan.
        header("Location: crud-product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
