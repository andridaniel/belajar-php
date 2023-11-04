<?php
class Koneksi {
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->connection = new mysqli($host, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Koneksi ke database gagal: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($query) {
        return $this->connection->prepare($query);
    }

    public function close() {
        $this->connection->close();
    }
}

$database = new Koneksi("127.0.0.1", "root", "", "pos_shop");