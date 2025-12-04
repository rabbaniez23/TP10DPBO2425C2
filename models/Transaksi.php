<?php
class Transaksi {
    private $conn;
    private $table_name = "transaksi";

    public $id;
    public $id_member;
    public $id_jenis;
    public $id_pelatih;
    public $tanggal_daftar;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read dengan JOIN
    public function read() {
        // GANTI DESC JADI ASC AGAR URUT DARI 1 KE 10
        $query = "SELECT t.id, m.nama_member, j.nama_jenis, j.harga, p.nama_pelatih, t.tanggal_daftar 
                  FROM " . $this->table_name . " t
                  JOIN member m ON t.id_member = m.id
                  JOIN jenis_member j ON t.id_jenis = j.id
                  JOIN pelatih p ON t.id_pelatih = p.id
                  ORDER BY t.id ASC"; // <--- Perubahan di sini
        $result = $this->conn->query($query);
        return $result;
    }

    // Tambahan untuk Edit: Ambil 1 data
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $this->id_member = $row['id_member'];
        $this->id_jenis = $row['id_jenis'];
        $this->id_pelatih = $row['id_pelatih'];
        $this->tanggal_daftar = $row['tanggal_daftar'];
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_member=?, id_jenis=?, id_pelatih=?, tanggal_daftar=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiis", $this->id_member, $this->id_jenis, $this->id_pelatih, $this->tanggal_daftar);
        return $stmt->execute();
    }

    // Tambahan untuk Edit: Update data
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET id_member=?, id_jenis=?, id_pelatih=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiii", $this->id_member, $this->id_jenis, $this->id_pelatih, $this->id);
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