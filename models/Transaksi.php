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

    // Read dengan JOIN agar nama member/pelatih muncul, bukan cuma ID
   public function read() {
        // Query JOIN untuk mengambil nama dari tabel lain
        $query = "SELECT t.id, m.nama_member, j.nama_jenis, j.harga, p.nama_pelatih, t.tanggal_daftar 
                  FROM " . $this->table_name . " t
                  JOIN member m ON t.id_member = m.id
                  JOIN jenis_member j ON t.id_jenis = j.id
                  JOIN pelatih p ON t.id_pelatih = p.id
                  ORDER BY t.id DESC";
        $result = $this->conn->query($query);
        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET id_member=?, id_jenis=?, id_pelatih=?, tanggal_daftar=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiis", $this->id_member, $this->id_jenis, $this->id_pelatih, $this->tanggal_daftar);
        return $stmt->execute();
    }
    
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
    
    // Tambahkan update & readOne jika diperlukan (sesuaikan pola Member)
}
?>