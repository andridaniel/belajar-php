<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namaProduct = $_POST["namaproduct"];
        $kategoriProduct = $_POST["kategoriproduct"];
        $kodeProduct = $_POST["kodeproduct"];
        $deskripsi = $_POST["deskripsi"];
        $harga = $_POST["harga"];
      
                  
        include 'koneksi.php'; // Pastikan file koneksi.php ada dan berisi koneksi ke database yang benar.
                  
        if ($koneksi->connect_error) {
            die("Koneksi ke database gagal: " . $koneksi->connect_error);
        }
        

                  
        $sql = "INSERT INTO products (product_name, category_id, product_code, description, price) VALUES ('$namaProduct', '$kategoriProduct', '$kodeProduct', '$deskripsi', '$harga')";

        if ($koneksi->query($sql) === TRUE) {
            header("Location: crud-product.php");
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }

        $koneksi->close();
    }
    
?>