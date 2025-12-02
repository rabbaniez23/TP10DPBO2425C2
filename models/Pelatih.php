<?php
class Pelatih {
    private $conn;
    private $table_name = "pelatih";

    public $id;
    public $nama_pelatih;
    public $keahlian;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_pelatih=?, keahlian=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $this->nama_pelatih, $this->keahlian);
        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $this->nama_pelatih = $row['nama_pelatih'];
        $this->keahlian = $row['keahlian'];
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_pelatih=?, keahlian=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $this->nama_pelatih, $this->keahlian, $this->id);
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