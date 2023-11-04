<?php 
    include 'koneksi.php';

    class hapusProduct {
        private $db;
    
        public function __construct($database) {
            $this->db = $database;
        }
    
        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $this->db->prepare($sql);
    
            if ($stmt) {
                $stmt->bind_param("i", $id);
    
                if ($stmt->execute()) {
                    return true;
                } else {
                    echo "Error: " . $stmt->error;
                    return false;
                }
                $stmt->close();
            } else {
                echo "Error in SQL statement: " . $this->db->error;
                return false;
            }
        }
    }
    
    $database = new Koneksi("127.0.0.1", "root", "", "pos_shop");
    $productManager = new hapusProduct($database);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus"])) {
        $id = $_POST["id"];
    
        if ($productManager->deleteProduct($id)) {
            // Redirect kembali ke halaman tabel produk setelah penghapusan.
            header("Location: crud-product.php");
        }
    }
    
    $database->close();
    
?>