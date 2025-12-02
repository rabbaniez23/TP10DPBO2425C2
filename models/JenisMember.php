<?php
class JenisMember {
    private $conn;
    private $table_name = "jenis_member";

    public $id;
    public $nama_jenis;
    public $harga;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_jenis=?, harga=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $this->nama_jenis, $this->harga);
        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $this->nama_jenis = $row['nama_jenis'];
        $this->harga = $row['harga'];
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_jenis=?, harga=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sii", $this->nama_jenis, $this->harga, $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
?>