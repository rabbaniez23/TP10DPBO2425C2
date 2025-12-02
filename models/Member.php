<?php
class Member {
    private $conn;
    private $table_name = "member";

    public $id;
    public $nama_member;
    public $no_telp;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_member=?, no_telp=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $this->nama_member, $this->no_telp);
        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $this->nama_member = $row['nama_member'];
        $this->no_telp = $row['no_telp'];
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_member=?, no_telp=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $this->nama_member, $this->no_telp, $this->id);
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